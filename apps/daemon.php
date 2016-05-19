<?php
	
	$loket = $_POST['loket'];
<<<<<<< HEAD
	$counter = $_POST['counter'];

	$db = new SQLite3('../db/antrian.db');
	if ($counter) {
		// update status counter
		$results = $db->query('UPDATE data_antrian SET status=1 WHERE id='.$counter.'');
	}
=======

	$db = new SQLite3('../db/antrian.db');
>>>>>>> 70f35c8a2fe26c4fea1c887f15f597731f08f4cb
	$results = $db->query('INSERT INTO data_antrian (counter,waktu,status) VALUES ('.$loket.',"'.date("Y-m-d H:i:s").'",0)');
	$next_counter = $db->lastInsertRowID();

    $data = array('next' => $next_counter);
    echo json_encode($data);
?>