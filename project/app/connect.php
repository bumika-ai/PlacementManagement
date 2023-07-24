<?php

$host = 'localhost:3307';
$user = 'root';
$pass = '';
$db_name = 'project';

$conn = new MySQLi($host,$user,$pass,$db_name);

if($conn->connect_error){
	die('database connection error:' .$conn->connect_error);
}

?>