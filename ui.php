<?php

class PHP_CRUD_UI {

    protected $settings;
    
    function call($method, $url, $data = false) {
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

    function url($base,$subject,$action,$id='',$field='') {
        return $base.trim("$subject/$action/$id/$field",'/');
    }

    function menu($parameters) {
        extract($parameters);
        
        $html= '<ul class="nav nav-pills nav-stacked">';
        foreach ($definition['tags'] as $tag) {
            $active = $tag['name']==$subject?' class="active"':'';
            $html.= '<li'.$active.'><a href="'.$this->url($base,$tag['name'],'list').'">'.$tag['name'].'</a></li>';
        }
        $html.= '</ul>';
        return $html;
    }

    function home($parameters) {
        extract($parameters);
        
        $html = 'Nothing';
        return $html;
    }

    function head() {
        $html = '<!DOCTYPE html><html lang="en">';
        $html.= '<head><title>PHP-CRUD-UI</title>';
        $html.= '<meta name="viewport" content="width=device-width, initial-scale=1">';
        $html.= '<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">';
        $html.= '<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" rel="stylesheet">';
        $html.= '</head><body><div class="container">';
        $html.= '<div class="row">';
        $html.= '<div class="col-md-4"><h3>PHP-CRUD-UI</h3></div>';
        $html.= '</div>';
        return $html;
    }

    function foot() {
        $html = '</div></body></html>';
        return $html;
    }

    function displayColumn($columns) {
        // TODO: make configurable
        $names = array('name','title','description','username');
        foreach ($names as $name) {
            if (isset($columns[$name])) return $columns[$name];
        }
        return false;
    }


    function referenceText($subject,$data,$field,$id,$definition) {
        $properties = $this->properties($subject,$definition);
        $references = $this->references($subject,$properties);
        $referenced = $this->referenced($subject,$properties);
        $primaryKey = $this->primaryKey($subject,$properties);
        
        $indices = array_flip($data[$subject]['columns']);
        $displayColumn = $this->displayColumn($indices);
        
        $records = $data[$subject]['records'];
        foreach ($records as $record) {
            if ($record[$indices[$field]]==$id) {
                if ($displayColumn===false) {
                    $text = '';
                    $first = true;
                    foreach ($record as $i=>$value) {
                        if (!$references[$i] && $i!=$primaryKey) {
                            if (!$first) $text.= ' - ';
                            $text.= $value;
                            $first = false;
                        }
                    } 
                    return $text;
                } else {
                    return $record[$displayColumn];
                }
            }
        }
        return false;
    }

    function listRecords($parameters) {
        extract($parameters);
        
        $properties = $this->properties($subject,$definition);
        $references = $this->references($subject,$properties);
        $referenced = $this->referenced($subject,$properties);
        $primaryKey = $this->primaryKey($subject,$properties);
        
        $related = !empty(array_filter($referenced));
        
        $args = array();
        if ($field) {
            $args['filter']=$field.',eq,'.$id; 
        }
        $include = implode(',',array_filter(array_map(function($v){ return $v[0]; },$references)));
        if ($include) {
            $args['include']=$include; 
        }
        $data = $this->call('GET',$url.'/'.$subject.'?'.http_build_query($args));
        
        $html = '<h4>'.$subject.': list</h4>';
        if ($field) {
            $html .= '<div class="alert alert-info" role="alert">Filtered where "'.$field.'" = "'.$id.'".';
            $href = $this->url($base,$subject,'list');
            $html .= '<div style="float:right;"><a href="'.$href.'">Show all</a></div></div>';
        }    
        $html.= '<table class="table">';
        $html.= '<thead><tr>';
        foreach ($data[$subject]['columns'] as $i=>$column) {
            $html.= '<th>'.$column.'</th>';
        }
        if ($related) {
            $html.= '<th>related</th>';
        }
        $html.= '<th>actions</th>';
        $html.= '</tr></thead><tbody>';
        foreach ($data[$subject]['records'] as $record) {
            $html.= '<tr>';
            foreach ($record as $i=>$value) {
                if ($references[$i]) {
                    $html.= '<td>';
                    $href = $this->url($base,$references[$i][0],'list',$value,$references[$i][1]);
                    $html.= '<a href="'.$href.'">';
                    $html.= $this->referenceText($references[$i][0],$data,$references[$i][1],$value,$definition);
                    $html.= '</a>';
                    $html.= '</td>';
                } else {
                    $html.= '<td>'.$value.'</td>';
                }
            }
            if ($related) {
                $html.= '<td>';
                foreach ($referenced as $i=>$relations) {
                    $id = $record[$i];
                    if ($relations) foreach ($relations as $j=>$relation) {
                        if ($j) $html.= ', ';
                        $href = $this->url($base,$relation[0],'list',$id,$relation[1]); 
                        $html.= '<a href="'.$href.'">'.$relation[0].'</a>';
                    }
                }
                $html.= '</td>';
            }
            $html.= '<td>';
            $href = $this->url($base,$subject,'edit',$record[$primaryKey]);
            $html.= '<a href="'.$href.'">edit</a>';
            $html.= '</td>';
            $html.= '</tr>';
        }
        $html.= '</tbody></table>';
        return $html;
    }

    function selectSubject($url,$subject,$name,$value,$definition) {
        $properties = $this->properties($subject,$definition);
        $references = $this->references($subject,$properties);
        $primaryKey = $this->primaryKey($subject,$properties);
        
        $data = $this->call('GET',$url.'/'.$subject);
        
        $indices = array_flip($data[$subject]['columns']);
        $displayColumn = $this->displayColumn($indices);
        
        $html = '<select class="form-control">';
        foreach ($data[$subject]['records'] as $record) {
            if ($displayColumn===false) {
                $text = '';
                $first = true;
                foreach ($record as $i=>$field) {
                    if (!$references[$i] && $i!=$primaryKey) {
                        if (!$first) $text.= ' - ';
                        $text.= $field;
                        $first = false;
                    }
                } 
                $html.= '<option value="'.$record[$primaryKey].'">'.$text.'</option>';
            } else {
                $html.= '<option value="'.$record[$primaryKey].'">'.$record[$displayColumn].'</option>';
            }
        }
        $html.= '</select>';
        return $html;
    }

    function editRecord($parameters) {
        extract($parameters);
        
        $properties = $this->properties($subject,$definition);
        $references = $this->references($subject,$properties);
        $referenced = $this->referenced($subject,$properties);
        $primaryKey = $this->primaryKey($subject,$properties);
        
        $data = $this->call('GET',$url.'/'.$subject.'/'.$id);
        $html = '<h4>'.$subject.': edit</h4>';
        $html.= '<form>';
        $i=0;
        foreach ($data as $column=>$field) {
            $html.= '<div class="form-group">';
            $html.= '<label for="'.$column.'">'.$column.'</label>';
            if ($references[$i]) {
                $html.= $this->selectSubject($url,$references[$i][0],$column,$field,$definition);
            } else {
                $readonly = $i==$primaryKey?' readonly':'';
                $html.= '<input class="form-control" id="'.$column.'" value="'.$field.'"'.$readonly.'/>';
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
    
    public function __construct($config) {
        extract($config);
        
        // initialize
        $url = isset($url)?$url:null;
        
        $base = isset($base)?$base:null;
        $definition = isset($definition)?$definition:null;
        $method = isset($method)?$method:null;
        $request = isset($request)?$request:null;
        $get = isset($get)?$get:null;
        $post = isset($post)?$post:null;
        
        // defaults
        if (!$definition) {
            $definition = isset($_SESSION['definition'])?$_SESSION['definition']:null;
            if (!$definition) {
                $definition = $this->call('GET',$url);
                $_SESSION['definition'] = $definition;
            }
        }
        if (!$method) {
            $method = $_SERVER['REQUEST_METHOD'];
        }
        if (!$request) {
            $request = isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'';
            if (!$request) {
                $request = isset($_SERVER['ORIG_PATH_INFO'])?$_SERVER['ORIG_PATH_INFO']:'';
            }
        }
        if (!$get) {
            $get = $_GET;
        }
        if (!$post) {
            $post = 'php://input';
        }
                
        $request = trim($request,'/');

        if (!$base) {
            $count = $request?(-1*strlen($request)):strlen($_SERVER['REQUEST_URI']);
            $base = rtrim(substr($_SERVER['REQUEST_URI'],0,$count),'/').'/';
        }
        
        $this->settings = compact('url', 'base', 'definition', 'method', 'request', 'get', 'post');
    }
    
    protected function parseRequestParameter(&$request,$characters) {
        if (!$request) return false;
        $pos = strpos($request,'/');
        $value = $pos?substr($request,0,$pos):$request;
        $request = $pos?substr($request,$pos+1):'';
        if (!$characters) return $value;
        return preg_replace("/[^$characters]/",'',$value);
    }
    
    protected function getParameters($settings) {
        extract($settings);

        $subject   = $this->parseRequestParameter($request, 'a-zA-Z0-9\-_');
        $action    = $this->parseRequestParameter($request, 'a-zA-Z0-9\-_');
        $id        = $this->parseRequestParameter($request, 'a-zA-Z0-9\-_');
        $field     = $this->parseRequestParameter($request, 'a-zA-Z0-9\-_');

        return compact('url','base','subject','action','id','field','definition');
    }
    
    function executeCommand() {
        $parameters = $this->getParameters($this->settings);
        
        $html = $this->head();
        $html.= '<div class="row">';
        $html.= '<div class="col-md-4">';
        $html.= $this->menu($parameters);
        $html.= '</div>';
        
        $html.= '<div class="col-md-8">';
        switch($parameters['action']){
            case '':     $html.= $this->home($parameters); break;
            case 'list': $html.= $this->listRecords($parameters); break;
            case 'edit': $html.= $this->editRecord($parameters); break;
        }
        $html.= '</div>';
        
        $html.= '</div>';
        $html.= $this->foot();
        return $html;
    }
}

//session_start();
//$ui = new PHP_CRUD_UI(array(
//    'url' => 'http://localhost/api.php',
//));
//echo $ui->executeCommand();