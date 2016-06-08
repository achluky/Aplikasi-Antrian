<?php
	if(false){
		$db = new SQLite3('../db/antrian.db');
		$rstClient = $db->query('SELECT count(*) as count FROM client_antrian');
		$rowClient = $rstClient->fetch_array();
		if($rowClient['count']>0){
			$jmlClient = $rowClient['count'];
		}else{
			$jmlClient = 0;
		}
	    echo json_encode( array('client'=> $jmlClient) );
    }else{
    	include "mysql_connect.php";
    	if(isset($_POST['next_current']) and ($_POST['next_current'] != NULL)){
    		$id = intval($_POST['next_current'])+1;
    		$rstClient = $mysqli->query("SELECT count(*) as count FROM data_antrian WHERE id=".$id."");
    		$rowClient = $rstClient->fetch_array();
    		if($rowClient['count']){
    			$results = $mysqli->query('UPDATE data_antrian SET status=0 WHERE id='.$id.'');
				//update
			}else{
				//insert
				$results = $mysqli->query('INSERT INTO data_antrian (waktu,status) VALUES ("'.date("Y-m-d H:i:s").'",3)');
			}
		    echo json_encode( array('next'=> $id) );
    	}else{
	    	$rstClient = $mysqli->query('SELECT count(*) as count FROM data_antrian WHERE status!=3');
			$rowClient = $rstClient->fetch_array();
			if($rowClient['count']>0){
				$jmlClient = $rowClient['count'];
			}else{
				$jmlClient = 0;
			}
		    echo json_encode( array('next'=> $jmlClient) );
		}
    	include 'mysql_close.php';
    }