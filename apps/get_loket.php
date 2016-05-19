<?php 
	$data = array();
	$db = new SQLite3('../db/antrian.db');
	$results = $db->query('SELECT DISTINCT(counter) as counter FROM data_antrian');
	if ( $results->numColumns()) {
		while ($row = $results->fetchArray()) {
		    $data[] = $row['counter'];
		}
	}
    echo json_encode($data);