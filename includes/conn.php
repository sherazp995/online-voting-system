<?php
	$conn = new mysqli('localhost', 'root', '', 'onlinevotingsystem');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>