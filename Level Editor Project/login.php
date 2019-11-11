<?php
	$bool = false;
		// How To Fetch DAta
	/*
		// Create Query
		$query = 'SELECT * FROM users';
	
		// Get Results
		$result = mysqli_query($conn, $query);
	
		// Fetch Data
		$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
		var_dump($users);
		
		// Free Result
		mysqli_free_result($result);
		
		// Close Connection
		mysqli_close($conn);
	*/

	require('config/db.php');
	
	$msg2 = '';
	$msg2Class = '';
	
	if(isset($_POST['submitLog'])){ // Check if Submit
		$msg2 = '';
		$msg2Class = '';
		$nameLog = mysqli_real_escape_string($conn, $_POST['nameLog']);
		$passwordLog = mysqli_real_escape_string($conn, $_POST['passwordLog']);
		
		if (!empty($nameLog) && !empty($passwordLog)) { // Check Required Fields
			// Passed
			$query = "SELECT * From users WHERE name=? OR password=?;";
			$stmt = mysqli_stmt_init($conn);
			
			if (!mysqli_stmt_prepare($stmt, $query)) {
				// Failed
				$msg2 = 'SQL ERROR';
				$msg2Class = 'alert-danger'; 
			} else {
				mysqli_stmt_bind_param($stmt, "ss" ,$nameLog, $passwordLog); // Run Data
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				
				if($row = mysqli_fetch_assoc($result)) { // Get Associative Array of Data
					//$pwdCheck = password_verify($passwordLog, $row['password']); NEED FURTHER WORK!
					if ($passwordLog != $row['password']) {
						$msg2 = 'Password Does Not Exsist';
						$msg2Class = 'alert-danger';
					} else {
						$_SESSION['name'] = $row['name'];
						$_SESSION['email'] = $row['email'];
						$msg2 = 'Welcome Back '.$_SESSION['name'];
						$msg2Class= 'alert-success';
						$bool = true;
						if ($_SESSION['name'] == 'Roey Lifshitz') { // Check if User is Admin
							$_SESSION['status'] = 'Admin';
						} else {
							$_SESSION['status'] = 'not Admin';
						}
					}
				} else {
				$msg2 = 'no user';
				$msg2Class = 'alert-danger';
				$bool = false;
				}
			}
		} else {
		$msg2 = 'Please Fill All The Fields Ahead';
		$msg2Class = 'alert-danger';
		$bool = false;
		}
	}
		
	
		
	


?>