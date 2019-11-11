<?php
	
	// Create Connection
	$conn = mysqli_connect('localhost', 'root', 'Game1234monkey', 'users');
	
	if (mysqli_connect_errno()) {
		// Connection Failed
		echo 'Connection to MySQLI Failed '. mysqli_connect_errno();
	}


?>