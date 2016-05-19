<?php 
	$id = $_POST['counter']; //id
	$loket = $_POST['loket']; // counter
	$db = new SQLite3('../db/antrian.db');
	$results = $db->query('UPDATE data_antrian SET waktu="'.date("Y-m-d H:i:s").'",status=0 WHERE id='.$id.' and counter='.$loket.'');
?>