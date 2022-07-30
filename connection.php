<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "herbapharm";

//create connection 

$con = mysqli_connect($serverName, $userName, $password, $dbName);

if(mysqli_connect_errno()){
	echo "Connection to the DB failed!";
	exit();
}
// echo "Connected successfully to the DB!";


?>