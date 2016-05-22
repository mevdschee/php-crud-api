<?php
$apiUrl = 'http://localhost:8001/blog.php';
$debug = true;

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

function menu($tags) {
    $html = '<ul>';
    foreach ($tags as $tag) {
        $html.= '<li><a href="?action=list&subject='.$tag['name'].'">'.$tag['name'].'</a></li>';
    }
    $html.= '</ul></div>';
    return $html;
}

function home($definition) {
    $html = 'Nothing';
    return $html;
}

function head() {
    $html = '<html><head></head><body>';
    return $html;
}

function foot($debug) {
    if ($debug) $html = '<hr/><pre>'.$debug.'</pre></body></html>';
    else $html = '';
    return $html;
}

function listRecords($apiUrl,$subject,$field,$id,$references,$related,$primary) {
    $filter = '';
    $html = '';
    if ($field) {
        $filter = '?filter[]='.$field.',eq,'.$id; 
        $html .= '<p>filtered where "'.$field.'" = "'.$id.'".';
        $href = '?action=list&subject='.$subject;
        $html .= ' <a href="'.$href.'">remove</a></p>';
    }
    $data = apiCall('GET',$apiUrl.'/'.$subject.$filter  );
    $html.= '<table>';
    $html.= '<tr>';
    foreach ($data[$subject]['columns'] as $i=>$column) {
        $html.= '<th>'.$column.'</th>';
    }
    $html.= '<th>related</th>';
    $html.= '<th>actions</th>';
    $html.= '</tr>';
    foreach ($data[$subject]['records'] as $record) {
        $html.= '<tr>';
        foreach ($record as $i=>$field) {
            if ($references[$i]) {
                $href = '?action=view&subject='.$references[$i].'&id='.$field;
                $html.= '<td><a href="'.$href.'">'.$field.'</a></td>';
            } else {
                $html.= '<td>'.$field.'</td>';
            }
        }
        $html.= '<td>';
        foreach ($related as $i=>$relations) {
            $id = $record[$i];
            if ($relations) foreach ($relations as $j=>$relation) {
                if ($j) $html.= ' ';
                $href = '?action=list&subject='.$relation[0].'&field='.$relation[1].'&id='.$id;
                $html.= '<a href="'.$href.'">'.$relation[0].'</a>';
            }
        }
        $html.= '</td>';
        $html.= '<td>';
        $html.= '<a href="?action=view&subject='.$subject.'&id='.$record[$primary].'">view</a>';
        $html.= '</td>';
        $html.= '</tr>';
    }
    $html.= '</table>';
    return $html;
}

function viewRecord($apiUrl,$subject,$id,$references,$related,$primary) {
    $data = apiCall('GET',$apiUrl.'/'.$subject.'/'.$id);
    $html = '<table>';
    $i=0;
    foreach ($data as $column=>$field) {
        $html.= '<tr><th>'.$column.'</th>';
        if ($references[$i]) {
            $href = '?action=view&subject='.$references[$i].'&id='.$field;
            $html.= '<td><a href="'.$href.'">'.$field.'</a></td>';
        } else {
            $html.= '<td>'.$field.'</td>';
        }
        $html.= '</tr>';
        $i++;
    }
    $html.= '<tr><th>related</th><td>';
    $keys = array_keys($data);
    foreach ($related as $i=>$relations) {
        $id = $data[$keys[$i]];
        if ($relations) foreach ($relations as $j=>$relation) {
            if ($j) $html.= ' ';
            $href = '?action=list&subject='.$relation[0].'&field='.$relation[1].'&id='.$id;
            $html.= '<a href="'.$href.'">'.$relation[0].'</a>';
        }
    }
    $html.= '</td></tr>';
    $html.= '<tr><th>actions</th><td>';
    $html.= '<a href="?action=view&subject='.$subject.'&id='.$data[$keys[$primary]].'">view</a>';
    $html.= '</td></tr>';
    $html.= '</table>';
    return $html;
}

function properties($subject,$action,$definition) {
    if (!$subject || !$definition) return false;
    if ($action=='view') {
        $path = '/'.$subject.'/{id}';
        if (!isset($definition['paths'][$path]['get']['responses']['200']['schema']['properties'])) {
            return false;
        }
        $properties = $definition['paths'][$path]['get']['responses']['200']['schema']['properties'];
    } else {
        $path = '/'.$subject;
        if (!isset($definition['paths'][$path]['get']['responses']['200']['schema']['items']['properties'])) {
            return false;
        }
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

function related($subject,$properties) {
    if (!$subject || !$properties) return false;
    $related = array();
    foreach ($properties as $field=>$property) {
        $related[] = isset($property['x-related'])?$property['x-related']:false;
    }
    return $related;
}

function primary($subject,$properties) {
    if (!$subject || !$properties) return false;
    $i = 0;
    foreach ($properties as $field=>$property) {
        if (isset($property['x-primary'])) return $i;
        $i++;
    }
    return false;
}

$action = isset($_GET['action'])?$_GET['action']:'';
$subject = isset($_GET['subject'])?$_GET['subject']:'';
$field = isset($_GET['field'])?$_GET['field']:'';
$id = isset($_GET['id'])?$_GET['id']:'';
$definition = apiCall('GET',$apiUrl);
$properties = properties($subject,$action,$definition);
$references = references($subject,$properties);
$related = related($subject,$properties);
$primary = primary($subject,$properties);
$debug = $debug?json_encode($definition,JSON_PRETTY_PRINT):false;

echo head();
echo '<div class="menu">';
echo menu($definition['tags']);
echo '</div>';
echo '<div class="content">';
switch ($action){
    case '': echo home(); break;
    case 'list': echo listRecords($apiUrl,$subject,$field,$id,$references,$related,$primary); break;
    case 'view': echo viewRecord($apiUrl,$subject,$id,$references,$related,$primary); break;
}
echo '</div>';
echo foot($debug);