<?php
	$loket = $_POST['loket'];
	$db = new SQLite3('../db/antrian.db');
	$date = date("Y-m-d");
	$results = $db->query('SELECT Max(id) as id FROM data_antrian WHERE counter='.$loket.' and waktu like "'. $date.'%"');
	$row = $results->fetchArray();
	if ($row['id'] == NULL) {
    	$data = array('next' => 0);
	} else {
    	$data = array('next' => $row['id']);
	}
    echo json_encode($data);
?>