<?php 
	session_start();
	$db = new SQLite3('../db/antrian.db');
	$result = $db->query('SELECT client From client_antrian'); // execution
	while ($rows = $result->fetchArray()) {
		$rst = $db->query('SELECT max(id) as id FROM data_antrian WHERE counter ='. $rows['client'] .' and status=2;'); // execution
		$row = $rst->fetchArray();
		if ($row['id']==NULL) {
			$id=0;
		} else {
			$id=$row['id'];
		}
		$_SESSION["next_server"][$rows['client']] = $id;
		$_SESSION["counter_server"][$rows['client']] = $rows['client'];
	}
?>