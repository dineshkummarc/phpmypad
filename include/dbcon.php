<?php
	$host = 'localhost';
	$user = 'blood';
	$dbName = 'blood';
	$pass = 'ektghavpdlwl3';
	$mysqli = mysqli_connect($host, $user, $pass, $dbName) or die('ERORR : DB ERORR!');
	mysqli_set_charset($mysqli, 'utf8');
?>