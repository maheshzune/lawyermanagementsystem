<?php
//Connect to database

function connect($setup = FALSE){
	$servername = "127.0.0.1:3307";
	$username = "hello";
	$password = "";
	$database = "lawyermanagement";

	// Create connection
	if($setup)
		$con = new mysqli($servername, $username, $password);
	else
		$con = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	return $con;
	//echo "Connected successfully";
}
