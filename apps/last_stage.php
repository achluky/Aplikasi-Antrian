<?php
$loket = $_POST['loket'];
if(false){
	$db = new SQLite3('../db/antrian.db');
	$date = date("Y-m-d");
	$results = $db->query('SELECT Max(id) as id FROM data_antrian WHERE counter='.$loket.'');
	$row = $results->fetch_array();
	if ($row['id'] == NULL) {
    	$data = array('next' => 0);
	} else {
    	$data = array('next' => $row['id']);
	}
    echo json_encode($data);
}else{
	include "mysql_connect.php";
	$date = date("Y-m-d");
	$results = $mysqli->query('SELECT Max(id) as id FROM data_antrian WHERE counter='.$loket.'');
	$row = $results->fetch_array();
	if ($row['id'] == NULL) {
    	$data = array('next' => 0);
	} else {
    	$data = array('next' => $row['id']);
	}
    echo json_encode($data);
	include 'mysql_close.php';
}
?>