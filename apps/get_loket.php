<?php 
	$data = array();
	if(false){
		$db = new SQLite3('../db/antrian.db');
		$results = $db->query('SELECT DISTINCT(counter) as counter FROM data_antrian');
		if ( $results->numColumns()) {
			while ($row = $results->fetch_array()) {
			    $data[] = $row['counter'];
			}
		}
	    echo json_encode($data);
    }else{
    	include "mysql_connect.php";
		$results = $mysqli->query('SELECT DISTINCT(counter) as counter FROM data_antrian');
		if ( $results->numColumns()) {
			while ($row = $results->fetch_array()) {
			    $data[] = $row['counter'];
			}
		}
	    echo json_encode($data);
	    include 'mysql_close.php';
    }