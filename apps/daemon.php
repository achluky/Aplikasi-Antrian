<?php
	$loket = $_POST['loket'];
	if (false) {
		$db = new SQLite3('../db/antrian.db');
		$results = $db->query('INSERT INTO data_antrian (counter,waktu,status) VALUES ('.$loket.',"'.date("Y-m-d H:i:s").'",0)');
		$next_counter = $db->lastInsertRowID();
	    $data = array('next' => $next_counter);
	    echo json_encode($data);
	}else{
		include "mysql_connect.php";
		$results = $mysqli->query('INSERT INTO data_antrian (counter,waktu,status) VALUES ('.$loket.',"'.date("Y-m-d H:i:s").'",0)');
		$next_counter = $mysqli->insert_id;
	    $data = array('next' => $next_counter);
	    echo json_encode($data);
	    include 'mysql_close.php';
	}
?>