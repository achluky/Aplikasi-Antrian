<?php 
	$id = $_POST['counter']; //id
	$loket = $_POST['loket']; // counter
	if(false){
		$db = new SQLite3('../db/antrian.db');
		$results = $db->query('UPDATE data_antrian SET waktu="'.date("Y-m-d H:i:s").'",status=0 WHERE id='.$id.' and counter='.$loket.'');
	}else{
		include "mysql_connect.php";
		$results = $mysqli->query('UPDATE data_antrian SET waktu="'.date("Y-m-d H:i:s").'",status=0 WHERE id='.$id.' and counter='.$loket.'');
		include 'mysql_close.php';
	}
?>