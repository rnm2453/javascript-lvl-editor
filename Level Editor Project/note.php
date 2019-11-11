
<?php
  
	// Message Data
	$msg = '';
	$msgClass = '';
	
	if(isset($_POST['submit'])){ // Check if Submit
		// Get Form Data
		$name = $_POST['name'];
		$password = $_POST['password'];
		$retype = $_POST['retype'];
		$email = $_POST['email'];
		//$email = mysqli_real_escape_string($conn, $_POST['email']);
		
		// Check Required Fields
		if(!empty($name) && !empty($password) && !empty($retype) && !empty($email)) {
			// Passed
			
			// Check Passwords Equals
			if ($password != $retype) {
				// Failed
				$msg = 'Passwords Are Not Matching';
				$msgClass = 'alert';
			} else {
				// Passed
			}
			
			
			// Check Email
			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Please Enter Valid Email';
				$msgClass = 'alert';
			} else {
				// Passed
			}
			
		} else {
			// Failed
			$msg = 'Please Fill In All Fields';
			$msgClass = 'alert';
		}
	}

	
	if(filter_has_var(INPUT_POST, 'submitLog')){ // Check if Submit
	
		$nameLog = $_POST['nameLog'];
		$passwordLog = $_POST['passwordLog'];
		
		if ($msg == '' && !empty($nameLog) && !empty($passwordLog)) {
		// Passed
			if ($nameLog == $name && $passwordLog == $password) {
				$msg = 'Sucsess';
			} else {
				$msg = 'Failed Login Info';
			}
		}
	}
 ?>
 
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<div class= "container">
			<div class= "row">
				<?php if ($msg != ''): ?>
					<div class= "alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
				<?php endif; ?>
				<form method= "POST" id= "sign" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
					<input type= "text" name= "name" placeholder= "Enter Name">
					<br>
					<input type= "text" name= "password" placeholder= "Enter Password">
					<br>
					<input type= "text" name= "retype" placeholder= "Retype Password">
					<br>
					<input type= "text" name= "email" placeholder= "Enter Email">
					<br>
					<input type= "submit" name= "submit" value= "Submit">
				</form>
			</div>
			<form method= "POST" id= "log" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type= "text" name= "nameLog" placeholder= "Enter Name">
				<br>
				<input type= "text" name= "passwordLog" placeholder= "Enter Password">
				<br>
				<input type= "submit" name= "submitLog" value= "Submit">
			</form>
		
		 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>
