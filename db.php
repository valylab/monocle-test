<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "monocle-test-db";

$conn = mysqli_connect($servername, $username, $password, $database);

if($conn->connect_error) { 
	die("Connection failed: " . $conn->connect_error);
}

?>