<?php 
if(false){
	$data = array();
	$db = new SQLite3('../db/antrian.db');
	if (isset($_POST) and count($_POST) > 0){
		if (isset($_POST['db']) and $_POST['db']=="queue") {
			$results = $db->query('SELECT * FROM data_antrian ORDER BY id ASC LIMIT 1');
			while ($row = $results->fetch_array()) {
			    $data['id'] = $row['id'];
			    $data['counter'] = $row['counter'];
			    $data['waktu'] = $row['waktu'];
			    $data['status'] = $row['status'];
			}
			echo json_encode($data);	
		}else{
			$jmlloket = $_POST['jmlloket'];
			$results = $db->query('DELETE FROM client_antrian;');
			for ($i=1; $i <= $jmlloket ; $i++) { 
				$results = $db->query('INSERT INTO client_antrian (client) VALUES ('.$i.')');
			}
			echo json_encode(array("status"=>TRUE));		
		}
	} else {
		$results = $db->query('SELECT  count(*) as jumlah_loket FROM client_antrian');
		if ( $results->numColumns()) {
			while ($row = $results->fetch_array()) {
			    $data['jumlah_loket'] = $row['jumlah_loket'];
			}
		} else {
			$data['jumlah_loket'] = $row['jumlah_loket'];
		}
	    echo json_encode($data);
	}
}else{
	include "mysql_connect.php";
	$data = array();
	if (isset($_POST) and count($_POST) > 0){
		if (isset($_POST['db']) and $_POST['db']=="queue") {
			$results = $mysqli->query('SELECT * FROM data_antrian ORDER BY id ASC LIMIT 1');
			while ($row = $results->fetch_array()) {
			    $data['id'] = $row['id'];
			    $data['counter'] = $row['counter'];
			    $data['waktu'] = $row['waktu'];
			    $data['status'] = $row['status'];
			}
			echo json_encode($data);	
		}else{
			$jmlloket = $_POST['jmlloket'];
			$results = $mysqli->query('DELETE FROM client_antrian;');
			for ($i=1; $i <= $jmlloket ; $i++) { 
				$results = $mysqli->query('INSERT INTO client_antrian (client) VALUES ('.$i.')');
			}
			echo json_encode(array("status"=>TRUE));		
		}
	} else {
		$results = $mysqli->query('SELECT  count(*) as jumlah_loket FROM client_antrian');
		while ($row = $results->fetch_array()) {
		    $data['jumlah_loket'] = $row['jumlah_loket'];
		}
    	echo json_encode($data);
	}
	include 'mysql_close.php';
}