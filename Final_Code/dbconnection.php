<?php

	$sname = "localhost";
	$user = "root";
	$password = "";
	$db_name = "soilerosion";

	$conn = mysqli_connect($sname, $user, $password, $db_name);

	if(!$conn) {
		die("Connection Failed: " . mysqli_connect_error()); 
	}

?>