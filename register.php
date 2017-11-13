<?php

require_once 'inc/class.register.php';
$register = new Register();

?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript"src="js/angular.min.js"></script>
<script type="text/javascript" src="js/bootstrap3/bootstrap.min.js"></script>
<link rel="stylesheet" href="jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" href="css/bootstrap3/bootstrap.min.css">

<title>Simple Chat</title>

<script type="text/javascript">

$( document ).ready(function() {

	
	
});

</script>

</head>
<body>
	
	<div class="container">
	
		<div id="header">
		
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
						</button>
						<a class="navbar-brand" href="#">WebSiteName</a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Page 1</a></li>
						<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 2
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
						  <li><a href="#">Page 2-1</a></li>
						  <li><a href="#">Page 2-2</a></li>
						  <li><a href="#">Page 2-3</a></li>
						</ul>
						</li>
						<li><a href="#">Page 3</a></li>
						<li><a href="#">Page 4</a></li>
						<li><a href="#">Page 5</a></li>
					</ul>
					</div>
				</div>
			</nav>
			
		</div><!-- /header -->
		
		<div>
			<h2>Register</h2>
			<form action="index.php" method="post">
			  <div class="form-group">
				<label for="first_name">First name:</label>
				<input type="text" name="first_name" class="form-control" id="first_name">
			  </div>
			  <div class="form-group">
				<label for="surname">Surname:</label>
				<input type="text" name="surname" class="form-control" id="surname">
			  </div>
			  <div class="form-group">
				<label for="email">Email address:</label>
				<input type="text" name="email" class="form-control" id="email">
			  </div>
			  <div class="form-group">
				<label for="pwd">Choose a password:</label>
				<input type="password" name="password" class="form-control" id="password">
			  </div>
			   <div class="form-group">
				<label for="pwd">Confirm your password:</label>
				<input type="password" name="password_conf" class="form-control" id="password_conf">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
		
		<div id="footer">
		
		</div><!-- /footer -->
		
	</div>
	
</div>

</body>
</html>