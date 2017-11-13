<?php

require_once 'inc/class.simplechat.php';
$sc = new SimpleChat();

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
			<form action="index.php" method="post">
			  <div class="form-group">
				<label for="message">Message:</label>
				<textarea name="message" style="width:400px; height:100px"><?php print($_POST['message']); ?></textarea>
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