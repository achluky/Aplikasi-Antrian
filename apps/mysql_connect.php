<?php
	$link = mysql_connect('localhost', 'root', '');
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}