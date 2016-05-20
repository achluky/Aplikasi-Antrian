<?php
	$db = new SQLite3('../db/antrian.db');
	$rstClient = $db->query('SELECT count(*) as count FROM client_antrian');
	$rowClient = $rstClient->fetchArray();
	if($rowClient['count']>0){
		$jmlClient = $rowClient['count'];
	}else{
		$jmlClient = 0;
	}
    echo json_encode( array('client'=> $jmlClient) );