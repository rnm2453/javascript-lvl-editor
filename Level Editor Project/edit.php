<?php 
		// How To Fetch Data
		// Get Connection
		require('config/db.php');
		session_start();
		
//---- Delete User From Data Base ----
		if(isset($_POST['delete'])){ // Check if Submit
			// Get Form Data
			$delete_name = mysqli_real_escape_string($conn, $_POST['delete_name']);	
			
			// Create Query
			$query = "DELETE FROM users WHERE users.name =?";	
			
			// Prepare Statment
			$stmt = mysqli_prepare($conn, $query);
			
			// Bind Parameter to Statement
			mysqli_stmt_bind_param($stmt, 's', $delete_name); 

			// Execute Statement
			mysqli_stmt_execute($stmt);
			
			//$result = mysqli_stmt_get_result($stmt);
			//var_dump($result);
		}
//----------------------------------------
		
//----- Get Data From Data Base -----
		// Create Query
		$query = 'SELECT * FROM users';
	
		// Get Results
		$result = mysqli_query($conn, $query);
	
		// Fetch Data
		$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
			// Free Result
			// mysqli_free_result($result);
//--------------------------------------
?>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="stylesheets/theme.css"/></link>
	</head>
	<body>
		
		<div class= "row bg-info text-white">
			<div class= "col-sm-12">
				<ul class="nav">
					<h3 class= "display-4" style= "margin-right:3rem">My Webstive</h3>
					<li class="nav-item" style= "padding-top:2rem;margin-right:3rem;">
						<a class="nav-link text-white" href="index.php">Home</a>
					</li>
					<li class="nav-item" style= "padding-top:2rem;margin-right:3rem;">
						<a class="nav-link text-white" href="community.php">Community</a>
					</li>
					<li class="nav-item" style= "padding-top:2rem;margin-right:3rem;">
						<a class="nav-link text-white" href="note.php">Login</a>
					</li>
							
					<li class="nav-item" style= "padding-top:2rem;">
					<?php if($_SESSION['status'] == 'Admin') 
						echo '<a class="nav-link disabled text-white" href="#">Edit</a>'
					?>	
					</li>
				</ul>
			</div>
		</div>
		
		<div class= "container bg-light" style= "padding-bottom:1rem;">
			<div class= "row" style= "margin-top:1rem;padding-top:1rem;"></div>
			<?php foreach($users as $user) : ?>
				<div class= "well bg-white border rounded text-center" style= "margin-bottom: 1rem;">
					<h3 class= "text-info"> <?php echo $user['name']?> </h3>
					<small> <?php echo "Password: ". $user['password']." Email: ".$user['email'];  ?> </small>
					<p> Maps </p>
					<form method= "POST" action= "<?php echo $_SERVER['PHP_SELF'];?>">
						<input type= "hidden" name= "delete_name" class= "contact-from" value= "<?php echo $user['name']?>"></input>
						<input type= "submit" name= "delete" value= "Delete User" class= "btn btn-danger"></input>
					</form>					
				</div>
			<?php endforeach; ?>
		</div>
	</body>
</html>
	