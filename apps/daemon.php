<?php
	
	$loket = $_POST['loket'];

	$db = new SQLite3('../db/antrian.db');
	$results = $db->query('INSERT INTO data_antrian (counter,waktu,status) VALUES ('.$loket.',"'.date("Y-m-d H:i:s").'",0)');
	$next_counter = $db->lastInsertRowID();

    $data = array('next' => $next_counter);
    echo json_encode($data);
?>