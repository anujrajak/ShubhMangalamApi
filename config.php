<?php

function connection() {
	$servername = "localhost";
	$username = "root";
	$password = "root";
	
	$conn = mysqli_connect($servername,$username,$password,"shubh");

	return $conn;
}

?>