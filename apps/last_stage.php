<?php
	$loket = $_POST['loket'];
	$db = new SQLite3('../db/antrian.db');
	$results = $db->query('SELECT Max(id) as id FROM data_antrian WHERE counter='.$loket.'');
	$row = $results->fetchArray();
    $data = array('next' => $row['id']);
    echo json_encode($data);
?>