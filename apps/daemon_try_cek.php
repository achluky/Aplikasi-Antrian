<?php 
	$id = $_POST['counter']; //id
	$loket = $_POST['loket']; // counter
	if(false){
		$db = new SQLite3('../db/antrian.db');
		$results = $db->query('UPDATE data_antrian SET waktu="'.date("Y-m-d H:i:s").'",status=0 WHERE id='.$id.' and counter='.$loket.'');
	}else{
		include "mysql_connect.php";		
		$hasil = $mysqli->query('select * from data_antrian where id='.$id.' and counter='.$loket.'');		
		$data = $hasil->fetch_array();
		echo json_encode(array('huft' => $data['status']));
		include 'mysql_close.php';
	}
?>