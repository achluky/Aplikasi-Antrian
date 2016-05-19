<?php
	
	$loket = $_POST['loket'];
	$counter = $_POST['counter'];

	$db = new SQLite3('../db/antrian.db');
	if ($counter) {
		// update status counter
		$results = $db->query('UPDATE data_antrian SET status=1 WHERE id='.$counter.'');
	}
	$results = $db->query('INSERT INTO data_antrian (counter,waktu,status) VALUES ('.$loket.',"'.date("Y-m-d H:i:s").'",0)');
	$next_counter = $db->lastInsertRowID();

    $data = array('next' => $next_counter);
    echo json_encode($data);
?>