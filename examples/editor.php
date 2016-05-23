<?php
$apiUrl = 'http://localhost:8001/blog.php';
$debug = false;

function apiCall($method, $url, $data = false) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_URL, $url);
    if ($data) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Content-Length: ' . strlen($data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response,true);
}

function menu($tags,$subject) {
    $html= '<ul class="nav nav-pills">';
    foreach ($tags as $tag) {
        $active = $tag['name']==$subject?' class="active"':'';
        $html.= '<li'.$active.'><a href="?action=list&subject='.$tag['name'].'">'.$tag['name'].'</a></li>';
    }
    $html.= '</ul>';
    return $html;
}

function home($definition) {
    $html = 'Nothing';
    return $html;
}

function head() {
    $html = '<!DOCTYPE html><html lang="en">';
    $html.= '<head><title>PHP-CRUD-API editor</title>';
    $html.= '<meta name="viewport" content="width=device-width, initial-scale=1">';
    $html.= '<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">';
    $html.= '<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" rel="stylesheet">';
    $html.= '<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>';
    $html.= '</head><body>';
    return $html;
}

function listRecords($apiUrl,$subject,$field,$id,$definition) {
    $properties = properties($subject,$definition);
    $references = references($subject,$properties);
    $referenced = referenced($subject,$properties);
    $primaryKey = primaryKey($subject,$properties);
    
    $filter = '';
    $html = '';
    if ($field) {
        $filter = '?filter[]='.$field.',eq,'.$id; 
        $html .= '<p>filtered where "'.$field.'" = "'.$id.'".';
        $href = '?action=list&subject='.$subject;
        $html .= ' <a href="'.$href.'">remove</a></p>';
    }
    $data = apiCall('GET',$apiUrl.'/'.$subject.$filter  );
    $html.= '<table class="table">';
    $html.= '<tr>';
    foreach ($data[$subject]['columns'] as $i=>$column) {
        if (!$references[$i]) {
            $html.= '<th>'.$column.'</th>';
        }
    }
    $html.= '<th>belongs to</th>';
    $html.= '<th>has many</th>';
    $html.= '<th>actions</th>';
    $html.= '</tr>';
    foreach ($data[$subject]['records'] as $record) {
        $html.= '<tr>';
        foreach ($record as $i=>$field) {
            if (!$references[$i]) {
                $html.= '<td>'.$field.'</td>';
            }
        }
        $html.= '<td>';
        $first = true;
        foreach ($references as $i=>$relation) {
            $id = $record[$i];
            if ($relation) {
                if (!$first) $html.= ', ';
                $href = '?action=list&subject='.$relation[0].'&field='.$relation[1].'&id='.$id;
                $html.= '<a href="'.$href.'">'.$relation[0].'</a>';
                $first = false;
            }
        }
        $html.= '</td>';
        $html.= '<td>';
        foreach ($referenced as $i=>$relations) {
            $id = $record[$i];
            if ($relations) foreach ($relations as $j=>$relation) {
                if ($j) $html.= ', ';
                $href = '?action=list&subject='.$relation[0].'&field='.$relation[1].'&id='.$id;
                $html.= '<a href="'.$href.'">'.$relation[0].'</a>';
            }
        }
        $html.= '</td>';
        $html.= '<td>';
        $html.= '<a href="?action=edit&subject='.$subject.'&id='.$record[$primaryKey].'">edit</a>';
        $html.= '</td>';
        $html.= '</tr>';
    }
    $html.= '</table>';
    return $html;
}

function selectSubject($apiUrl,$subject,$name,$value,$definition) {
    $properties = properties($subject,$definition);
    $references = references($subject,$properties);
    $primaryKey = primaryKey($subject,$properties);
    
    $data = apiCall('GET',$apiUrl.'/'.$subject);
    $html = '<select class="form-control">';
    foreach ($data[$subject]['records'] as $record) {
        $text = '';
        $first = true;
        foreach ($record as $i=>$field) {
            if (!$references[$i]) {
                if (!$first) $text.= ' - ';
                $text.= $field;
                $first = false;
            }
        } 
        $html.= '<option value="'.$record[$primaryKey].'">'.$text.'</option>';
    }
    $html.= '</select>';
    return $html;
}

function editRecord($apiUrl,$subject,$id,$definition) {
    $properties = properties($subject,$definition);
    $references = references($subject,$properties);
    $referenced = referenced($subject,$properties);
    $primaryKey = primaryKey($subject,$properties);
    
    $data = apiCall('GET',$apiUrl.'/'.$subject.'/'.$id);
    $html = '<form>';
    $i=0;
    foreach ($data as $column=>$field) {
        $html.= '<div class="form-group">';
        $html.= '<label for="'.$column.'">'.$column.'</label>';
        if ($references[$i]) {
            $html.= selectSubject($apiUrl,$references[$i][0],$column,$field,$definition);
        } else {
            $html.= '<input class="form-control" id="'.$column.'" value="'.$field.'"/>';
        }
        $html.= '</div>';
        $i++;
    }
    $html.= '</form>';
    return $html;
}

function properties($subject,$definition) {
    if (!$subject || !$definition) return false;
    $path = '/'.$subject;
    if (!isset($definition['paths'][$path])) {
        $path = '/'.$subject.'/{id}';
    }
    $properties = false;
    if (isset($definition['paths'][$path]['get']['responses']['200']['schema']['properties'])) {
        $properties = $definition['paths'][$path]['get']['responses']['200']['schema']['properties'];
    } elseif (isset($definition['paths'][$path]['get']['responses']['200']['schema']['items']['properties'])) {
        $properties = $definition['paths'][$path]['get']['responses']['200']['schema']['items']['properties'];
    }
    return $properties;
}

function references($subject,$properties) {
    if (!$subject || !$properties) return false;
    $references = array();
    foreach ($properties as $field=>$property) {
        $references[] = isset($property['x-references'])?$property['x-references']:false;
    }
    return $references;
}

function referenced($subject,$properties) {
    if (!$subject || !$properties) return false;
    $referenced = array();
    foreach ($properties as $field=>$property) {
        $referenced[] = isset($property['x-referenced'])?$property['x-referenced']:false;
    }
    return $referenced;
}

function primaryKey($subject,$properties) {
    if (!$subject || !$properties) return false;
    $i = 0;
    foreach ($properties as $field=>$property) {
        if (isset($property['x-primary-key'])) return $i;
        $i++;
    }
    return false;
}

$action = isset($_GET['action'])?$_GET['action']:'';
$subject = isset($_GET['subject'])?$_GET['subject']:'';
$field = isset($_GET['field'])?$_GET['field']:'';
$id = isset($_GET['id'])?$_GET['id']:'';
$definition = apiCall('GET',$apiUrl);
$debug = $debug?json_encode($definition,JSON_PRETTY_PRINT):false;

echo head();
echo '<div class="container-fluid">';
echo '<div class="row">';
echo menu($definition['tags'],$subject);
echo '</div>';
echo '<div class="row">';
switch ($action){
    case '': echo home(); break;
    case 'list': echo listRecords($apiUrl,$subject,$field,$id,$definition); break;
    case 'edit': echo editRecord($apiUrl,$subject,$id,$definition); break;
}
echo '</div>';
if ($debug) echo '<hr/><pre>'.$debug.'</pre></body></html>';
echo '</div>';