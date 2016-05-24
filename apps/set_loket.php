<?php 
	session_start();
	$_SESSION['loket_client'] = $_POST['loket'];
	include "last_stage.php";