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
		$rstClient = $mysqli->query("SELECT * FROM data_antrian WHERE counter='' AND status=3 LIMIT 1");
		$rowClient = $rstClient->fetch_array();
		if(count($rowClient)>0){
			$id = $rowClient['id'];
			$results = $mysqli->query('UPDATE data_antrian SET counter='.$loket.', status=0 WHERE id='.$id.'');
			$next_counter = $id;
			//update
		}else{
			//insert
			$results = $mysqli->query('INSERT INTO data_antrian (waktu,counter,status) VALUES ("'.date("Y-m-d H:i:s").'",'.$loket.',4)');
			$next_counter = $mysqli->insert_id;
			$data['idle'] = "TRUE";
		}
		//$results = $mysqli->query('INSERT INTO data_antrian (counter,waktu,status) VALUES ('.$loket.',"'.date("Y-m-d H:i:s").'",0)');
	    $data['next'] = $next_counter;
	    echo json_encode($data);
	    include 'mysql_close.php';
	}
?>