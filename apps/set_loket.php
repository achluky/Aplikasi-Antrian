<?php 

	session_start();
	$_SESSION['loket'] = $_POST['loket'];
	$_SESSION['time']     = time();

	include "last_stage.php";