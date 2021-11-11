<?php
	
	// Create Connection
	$conn = mysqli_connect('localhost', 'root', '******', 'users');
	
	if (mysqli_connect_errno()) {
		// Connection Failed
		echo 'Connection to MySQLI Failed '. mysqli_connect_errno();
	}


?>
