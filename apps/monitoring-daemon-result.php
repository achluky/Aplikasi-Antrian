<?php
    // set done
    $id = $_POST['id'];
	$db = new SQLite3('../db/antrian.db');
	$db->query('UPDATE data_antrian SET status= 2 WHERE id='.$id.''); // wait