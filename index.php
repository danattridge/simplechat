<?php

require_once 'inc/config.php';
require_once 'inc/class.helper.php';
require_once 'inc/class.simplechat.php';
$help = new Helper();
$sc = new SimpleChat($help);

?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript"src="js/angular.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">

<title>Simple Chat</title>



<script type="text/javascript">

$( document ).ready(function() {

	
});

</script>

</head>
<body bgcolor="chucknorris">
	
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
		
		<div class="row">
      
			<h3>Messages</h3>
			<div id="chat-window" class="col-lg-12">
				<?php print($sc->getConversation()); ?>
			</div>
		
		</div>
		
		<div>
			<form action="index.php" method="post">
			  <div class="form-group">
				<label for="message">Message:</label>
				<textarea class="form-control" rows="5" name="message"><?php print($_POST['message']); ?></textarea>
			  </div>
			  <button type="submit" class="btn btn-default" id="send_message">Submit</button>
			</form>
		</div>
		
		<div id="footer">
		
		</div><!-- /footer -->
		
	</div>

</body>
</html>