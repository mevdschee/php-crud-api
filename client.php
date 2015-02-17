<?php

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
	return json_decode(curl_exec($ch),true);
}

function get_objects(&$tables,$table_name,$where_index=false,$match_value=false) {
	$objects = array();
	foreach ($tables[$table_name]['records'] as $record) {
		if ($where_index===false || $record[$where_index]==$match_value) {
			$object = array();
			foreach ($tables[$table_name]['columns'] as $index=>$column) {
				$object[$column] = $record[$index];
				foreach ($tables as $relation=>$reltable) {
					foreach ($reltable['relations'] as $key=>$target) {
						if ($target == "$table_name.$column") {
							$column_indices = array_flip($reltable['columns']);
							$object[$relation] = get_objects($tables,$relation,$column_indices[$key],$record[$index]);
						}
					}
				}
			}
			$objects[] = $object;
		}
	}
	return $objects;
}

function get_tree(&$tables) {
	$tree = array();
	foreach ($tables as $name=>$table) {
		if (!isset($table['relations'])) {
			$tree[$name] = get_objects($tables,$name);
		}
	}
	return $tree;
}

header('Content-Type: text/plain');
print_r(get_tree(call('GET','http://localhost/api.php/posts,categories,tags,comments?filter=id:1')));
