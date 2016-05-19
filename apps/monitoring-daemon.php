<?php 
	
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
	}else{

		$result = $db->query('SELECT id, counter FROM data_antrian WHERE status=0 ORDER BY waktu ASC LIMIT 1'); // execution
		$rows = $result->fetchArray();
		if($rows['id']!=NULL)
		{
			$data['next'] = $rows['id'];	
			$data['counter'] = $rows['counter'];
			// set wait
			$_SESSION["next_server"][$rows['counter']] = $rows['id'];
			$_SESSION["counter_server"][$rows['counter']] = $rows['counter'];
			$db->query('UPDATE data_antrian SET status= 1 WHERE id='. $rows['id'] .''); // wait
			echo json_encode($data);
		}
	}

?>