<?php 
	$data = array();
	$db = new SQLite3('../db/antrian.db');

	if (isset($_POST) and count($_POST) > 0) 
	{
		$jmlloket = $_POST['jmlloket'];
		
		$results = $db->query('DELETE FROM client_antrian;');

		for ($i=1; $i <= $jmlloket ; $i++) { 
			
			$results = $db->query('INSERT INTO client_antrian (client) VALUES ('.$i.')');
		
		}

		echo json_encode(array("status"=>TRUE));		

	} else {
		$results = $db->query('SELECT  count(*) as jumlah_loket FROM client_antrian');
		
		if ( $results->numColumns()) 
		{
			while ($row = $results->fetchArray()) 
			{
			    $data['jumlah_loket'] = $row['jumlah_loket'];
			}
		} else {
			$data['jumlah_loket'] = $row['jumlah_loket'];
		}

	    echo json_encode($data);
	}