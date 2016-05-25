<?php 
	session_start();
	if(false){
		$db = new SQLite3('../db/antrian.db');
		$data = array();
		$date = date("Y-m-d");
		// Jumlah Loket
		$results = $db->query('SELECT  count(*) as jumlah_loket FROM client_antrian');	
		$loket = $results->fetch_array();
		$data['jumlah_loket'] = $loket['jumlah_loket']; // set jumlah loket

		$client = $db->query('SELECT client From client_antrian'); // execution
		while ($cl = $client->fetch_array()) {
			//echo 'SELECT max(id) as id FROM data_antrian WHERE counter ='. $cl['client'] .' and status=2 and waktu like "'. $date.'%"';

			$rst = $db->query('SELECT max(id) as id FROM data_antrian WHERE counter ='. $cl['client'] .' and status=2'); // execution
			$row = $rst->fetch_array();
			if ($row['id']==NULL) {
				$id=0;
			} else {
				$id=$row['id'];
			}
			$data["init_counter"][$cl['client']] = $id; // inisial setiap loket
		}

		//2 done
		//1 wait
		//0 execution
		$result_wait = $db->query('SELECT count(*) as count FROM data_antrian WHERE status=1'); // wait 1
		$wait = $result_wait->fetch_array();
		$count = $wait['count'];

		if ($count){
			//echo $count;
		}else{
			$result = $db->query('SELECT id, counter FROM data_antrian WHERE status=0 ORDER BY waktu ASC LIMIT 1'); // execution
			$rows = $result->fetch_array();
			if($rows['id']!=NULL)
			{
				$data['next'] = $rows['id'];	
				$data['counter'] = $rows['counter'];
				// set wait
				$_SESSION["next_server"][$rows['counter']] = $rows['id'];
				$_SESSION["counter_server"][$rows['counter']] = $rows['counter'];
				$db->query('UPDATE data_antrian SET status= 1 WHERE id='. $rows['id'] .''); // update to wait 1
			}

		}
		echo json_encode($data);
	}else{
		include "mysql_connect.php";
		$data = array();
		$date = date("Y-m-d");
		// Jumlah Loket
		$results = $mysqli->query('SELECT  count(*) as jumlah_loket FROM client_antrian');	
		$loket = $results->fetch_array();
		$data['jumlah_loket'] = $loket['jumlah_loket']; // set jumlah loket
		$client = $mysqli->query('SELECT client From client_antrian'); // execution
		while ($cl = $client->fetch_array()) {
			$rst = $mysqli->query('SELECT max(id) as id FROM data_antrian WHERE counter ='. $cl['client'] .' and status=2'); // execution
			$row = $rst->fetch_array();
			if ($row['id']==NULL) {
				$id=0;
			} else {
				$id=$row['id'];
			}
			$data["init_counter"][$cl['client']] = $id; // inisial setiap loket
		}

		//STATUS
		//======
		//2 done
		//1 wait
		//0 execution
		$result_wait = $mysqli->query('SELECT count(*) as count FROM data_antrian WHERE status=1'); // wait 1
		$wait = $result_wait->fetch_array();
		$count = $wait['count'];
		if ($count){
			//echo $count;
		}else{
			$result = $mysqli->query('SELECT id, counter FROM data_antrian WHERE status=0 ORDER BY waktu ASC LIMIT 1'); // execution
			$rows = $result->fetch_array();
			if($rows['id']!=NULL)
			{
				$data['next'] = $rows['id'];	
				$data['counter'] = $rows['counter'];
				// set wait
				$_SESSION["next_server"][$rows['counter']] = $rows['id'];
				$_SESSION["counter_server"][$rows['counter']] = $rows['counter'];
				$mysqli->query('UPDATE data_antrian SET status= 1 WHERE id='. $rows['id'] .''); // update to wait 1
			}
		}
		echo json_encode($data);
		include 'mysql_close.php';
	}
?>