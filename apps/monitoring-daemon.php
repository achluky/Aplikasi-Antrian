<?php 
<<<<<<< HEAD
	$db = new SQLite3('../db/antrian.db');
	$data = array();
	for ($i=1; $i <=3 ; $i++) { 
		$results = $db->query('SELECT Max(id) as id FROM data_antrian WHERE counter='.$i.'');
		$row = $results->fetchArray();
		if (isset($row['id']) and $row['id'] != NULL) {
	    	$data['next'][$i] = $row['id'];	
		} else {
	    	$data['next'][$i] = 0;
		}
	}
    echo json_encode($data);
=======
	session_start();

	$db = new SQLite3('../db/antrian.db');
	$data = array();
	
	//2 done
	//1 wait
	//0 execution
	
	$result_wait = $db->query('SELECT count(*) as c FROM data_antrian WHERE status=1'); // wait
	$wait = $result_wait->fetchArray();
	$c = $wait['c'];
	if ($c) 
	{
		//	idel
	}else{

		$result = $db->query('SELECT Max(id) as id, counter FROM data_antrian WHERE status=0 LIMIT 1'); // execution
		$rows = $result->fetchArray();
		if($rows['id']!=NULL)
		{
			$data['next'] = $rows['id'];	
			$data['counter'] = $rows['counter'];
			// set wait
			$_SESSION["next"] = $rows['id'];
			$_SESSION["counter"] = $rows['counter'];
			$db->query('UPDATE data_antrian SET status= 1 WHERE id='. $rows['id'] .''); // wait
			echo json_encode($data);
		}
	}
>>>>>>> 70f35c8a2fe26c4fea1c887f15f597731f08f4cb
?>