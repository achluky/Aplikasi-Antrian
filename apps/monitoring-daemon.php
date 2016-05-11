<?php 
	$db = new SQLite3('../db/antrian.db');
	$data = array();
	for ($i=1; $i <=3 ; $i++) { 
		$results = $db->query('SELECT Max(id) as id FROM data_antrian WHERE counter='.$i.'');
		$row = $results->fetchArray();
		if (isset($row['id']) and $row['id'] != NULL) {
	    	$data['next'][$i] = $row['id'];	
		} else {
	    	$data['next'][$i] = 0;
		}
	}
    echo json_encode($data);
?>