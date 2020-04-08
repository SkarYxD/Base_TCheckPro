<?php
	$conn = mysqli_connect("localhost", "root", "", "testchk");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>