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
    		$cek_request_counter = $mysqli->query("SELECT count(*) as count FROM data_antrian WHERE status=4");
    		$cek_request_counter_row = $cek_request_counter->fetch_array();
    		if ($cek_request_counter_row['count']) {
		    	$rstC = $mysqli->query('SELECT id FROM data_antrian WHERE status=4 LIMIT 1');
				$rowC = $rstC->fetch_array();
				$id = $rowC['id'];
    			$results = $mysqli->query('UPDATE data_antrian SET status=0 WHERE status=4 LIMIT 1');
			    echo json_encode( array('next'=> $id) );
    		}else{
				//insert
				$results = $mysqli->query('INSERT INTO data_antrian (waktu,status) VALUES ("'.date("Y-m-d H:i:s").'",3)');
				$id = $mysqli->insert_id;
			    echo json_encode( array('next'=> $id) );
			}
    	}else{
	    	$rstClient = $mysqli->query('SELECT count(*) as count FROM data_antrian WHERE status != 4');
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