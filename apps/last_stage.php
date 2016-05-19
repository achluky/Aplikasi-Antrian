<?php
	$loket = $_POST['loket'];
	$db = new SQLite3('../db/antrian.db');
	$results = $db->query('SELECT Max(id) as id FROM data_antrian WHERE counter='.$loket.'');
	$row = $results->fetchArray();
<<<<<<< HEAD
	if ($row['id'] == NULL) {
    	$data = array('next' => 0);
	} else {
    	$data = array('next' => $row['id']);
	}
=======
    $data = array('next' => $row['id']);
>>>>>>> 70f35c8a2fe26c4fea1c887f15f597731f08f4cb
    echo json_encode($data);
?>