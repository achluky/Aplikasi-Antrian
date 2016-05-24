<?php
	$mysqli = @new mysqli('localhost', 'root', '', 'antrian');
	if ($mysqli->connect_errno) {
	    die('Connect Error: ' . $mysqli->connect_errno);
	}