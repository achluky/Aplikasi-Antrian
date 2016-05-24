<?php
    // set done
    $id = $_POST['id'];
	$db = new SQLite3('../db/antrian.db');
	$result = $db->query('UPDATE data_antrian SET status=2 WHERE status=1'); // wait
	if (!$result) {
		echo json_encode(array('status'=>0));
	}else{
		echo json_encode(array('status'=>1));
	}
