<?php
	$db = new SQLite3('../db/antrian.db');
	$rstClient = $db->query('DELETE FROM data_antrian');
	$rstClient = $db->query('Update sqlite_sequence  set seq="0" where name="data_antrian"');
    echo json_encode( array('status'=> "Data Berhasil di Reset") );