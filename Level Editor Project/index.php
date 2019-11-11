<?php session_start();
	//	require('config/db.php');
	//$_SESSION['status'] = '';?>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></link>
		<link rel="stylesheet" href="stylesheets/theme.css"/></link>
	</head>
	
	<body onload= "setup()" class= "text-center">				
		<div class= "row bg-info text-white">			
			<div class= "col-sm-12">
				<ul class="nav" style="height: 5rem;">
					<h3 class= "display-4" style= "margin-right:3rem; margin-left:1rem;">My Webstive</h3>
					<li class="nav-item" style= "padding-top:2rem;margin-right:3rem;">
						<a class="nav-link disabled text-white" href="#">Home</a>
					</li>
					<li class="nav-item" style= "padding-top:2rem;margin-right:3rem;">
						<a class="nav-link text-white" href="community.php">Community</a>
					</li>
					<li class="nav-item" style= "padding-top:2rem;margin-right:3rem;">
						<a class="nav-link text-white" href="note.php">Login</a>
					</li>
							
					<li class="nav-item" style= "padding-top:2rem;">
					<?php if($_SESSION['status'] == 'Admin') 
						echo '<a class="nav-link text-white" href="edit.php">Edit</a>'
					?>	
					</li>
				</ul>
			</div>
		</div>
		
		<div class= "container-flucid bg-light" style="margin-top:1rem;">
			<div class= "row">
				<div class= "col-sm-2"></div>
				<div class= "col-sm-8 p-3 mb-2 bg-success text-white" style= "margin-top: -0.8rem;">
					<div class= "row">
						<div class= "col-sm-3">
							<input id="request_rows" type= "range" min= "8" max= "20" step= "4" value= "8" onchange= "requestRows();"/>
						</div>
						<div class= "col-sm-6">
							<h3 class= "display-5 text-center">Level Editor</h3>
						</div>
						<div class= "col-sm-3">			
						</div>
					</div>
				</div>
				<div class= "col-sm-2"></div>
			</div>
			<div class= "row">
				<div class= "col-sm-1"></div>
				<div class= "col-sm-2 p-3 mb-2 bg-success text-white">
					<div class= "row" style="padding-top:2rem;">
						<div class= "col-sm-6 text-center logo" draggable= "true" style= "height:5rem;" id= "start">start</div>
						<div class= "col-sm-6 text-center logo" draggable= "true" style= "height:5rem;" id= "check">check</div>
					</div>
					<div class= "row">
						<div class= "col-sm-6 text-center logo" draggable= "true" style= "height:5rem;" id= "end">end</div>
						<div class= "col-sm-6 text-center logo" draggable= "true" style= "height:5rem;" id= "flat">Flat</div>
					</div>
					<div class= "row">
						<div class= "col-sm-6 text-center logo" draggable= "true" style= "height:5rem;" id= "ice">Ice</div>
						<div class= "col-sm-6 text-center logo" draggable= "true" style= "height:5rem;" id= "mud">Mud</div>
					</div>
					<div class= "row">
						<div class= "col-sm-6 text-center logo" draggable= "true" style= "height:5rem;" id= "lava">Lava</div>
						<div class= "col-sm-6 text-center logo" draggable= "true" style= "height:5rem;" id= "bouncy">Bounce Pad</div>
					</div>
				</div>
				<div class= "col-sm-6" id= "grid_wrapper"></div>
				<div class= "col-sm-2 p-3 mb-2 bg-success text-white">
				
				</div>
				<div class= "col-sm-1"></div>
			</div>
			
			<div class= "row" style= "margin-top: 1rem;">
					<div class= "col-sm-3"></div>
				<div class= "col-sm-6 text-center bg-success" style="height:6rem; padding-top:2rem;">
					<button onclick="alert()">Create Map</button>
				</div>
					<div class= "col-sm-3"></div>
			</div>
		</div>	
		<script src= "script/divs.js"></script>
		<script src= "script/htmlsetup.js"></script>		
		<script src="script/libraries/updatedMatter.js"></script>
			<script src= "script/mattersetup.js"></script>
			<script src="script/bodies/Flat.js"></script>
			<script src="script/bodies/Character.js"></script>
			<script src="script/bodies/Ice.js"></script>
			<script src="script/bodies/Mud.js"></script>
			<script src="script/bodies/Lava.js"></script>
			<script src="script/bodies/BouncePad.js"></script>
			<script src= "script/script.js"></script>
	</body>
</html>