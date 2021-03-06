<?php

require_once 'inc/config.php';
require 'inc/class.helper.php';
require 'inc/class.register.php';
$help = new Helper();
$register = new Register($help);

$validationError = $register->validateUserData();

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
		<form class="well form-horizontal" action=" " method="post"  id="contact_form">
		<fieldset>

			<!-- Form Name -->
			<legend><center><h2><b>Registration Form</b></h2></center></legend><br>

			<!-- Text input-->
			
			<div class="form-group"> 
			  <label class="col-md-4 control-label">Title</label>
				<div class="col-md-4 selectContainer">
					<div class="input-group">
						<select name="title" class="form-control selectpicker">
						  <option value="">Select</option>
						  <option>Mr</option>
						  <option>Mrs</option>
						  <option >Ms</option>
						  <option >Miss</option>
						  <option >Dr</option>
						  <option >Rev</option>
						  <option >Prof</option>
						</select>
					</div>
					<?php print(isset($validationError['title']) ? '<p>'.$validationError['title'].'</p>' : ''); ?>
				</div>
			</div>

			<div class="form-group">
			  <label class="col-md-4 control-label">First Name</label>  
			  <div class="col-md-4 inputGroupContainer">
			  <div class="input-group">
			  <input  name="first_name" placeholder="First Name" class="form-control"  type="text">
				</div>
				<?php print(isset($validationError['first_name']) ? '<p>'.$validationError['first_name'].'</p>' : ''); ?>
			  </div>
			</div>

			<!-- Text input-->

			<div class="form-group">
			  <label class="col-md-4 control-label" >Surname</label> 
				<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
			  <input name="surname" placeholder="Surname" class="form-control"  type="text">
				</div>
				<?php print(isset($validationError['surname']) ? '<p>'.$validationError['surname'].'</p>' : ''); ?>
			  </div>
			</div>

			<!-- Text input-->

			<div class="form-group">
			  <label class="col-md-4 control-label" >Nickname</label> 
				<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
			  <input name="nickname" placeholder="Nickname" class="form-control"  type="text">
				</div>
				<?php print(isset($validationError['nickname']) ? '<p>'.$validationError['nickname'].'</p>' : ''); ?>
			  </div>
			</div>
			
			<div class="form-group">
				<label for="gender" class="col-md-4 control-label" >Gender</label> 
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<div class="radio">
							<label><input type="radio" name="gender" value="male">Male</label>
						</div>
						<div class="radio">
							<label><input type="radio" name="gender" value="female">Female</label>
						</div>
					</div>
					<?php print(isset($validationError['gender']) ? '<p>'.$validationError['gender'].'</p>' : ''); ?>
				</div>
			</div>
			
			<!-- Text input-->
				   <div class="form-group">
			  <label class="col-md-4 control-label">E-Mail</label>  
				<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
					<input name="email" placeholder="E-Mail Address" class="form-control"  type="text" />
				</div>
				<?php print(isset($validationError['email']) ? '<p>'.$validationError['email'].'</p>' : ''); ?>
			  </div>
			</div>

			<!-- Text input-->

			<div class="form-group">
			  <label class="col-md-4 control-label" >Password</label> 
				<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
					<input name="password" placeholder="Password" class="form-control"  type="password" />
				</div>
				<?php print(isset($validationError['password']) ? '<p>'.$validationError['password'].'</p>' : ''); ?>
			  </div>
			</div>

			<!-- Text input-->

			<div class="form-group">
			  <label class="col-md-4 control-label" >Confirm Password</label> 
				<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
					<input name="password_confirm" placeholder="Confirm Password" class="form-control"  type="password" />
				</div>
				<?php print(isset($validationError['password_confirm']) ? '<p>'.$validationError['password_confirm'].'</p>' : ''); ?>
			  </div>
			</div>

			<!-- Text input-->
				   
			<div class="form-group">
			  <label class="col-md-4 control-label">Contact No.</label>  
				<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
					<input name="contact_no" placeholder="Contact No." class="form-control" type="text">
				</div>
				<?php print(isset($validationError['contact_no']) ? '<p>'.$validationError['contact_no'].'</p>' : ''); ?>
			  </div>
			</div>
			
			<!-- Text input-->
				   
			<div class="form-group">
			  <label for="dob" class="col-md-4 control-label">Date of birth</label>  
				<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			  <input name="dob" placeholder="Date of Birth" class="form-control" type="text">
				</div>
				<?php print(isset($validationError['dob']) ? '<p>'.$validationError['dob'].'</p>' : ''); ?>
			  </div>
			</div>

			<!-- Select Basic -->

			<!-- Success message -->
			<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label"></label>
			  <div class="col-md-4"><br>
				<button type="submit" name="submit" value="submit" class="btn btn-warning" >SUBMIT <span class="glyphicon glyphicon-send"></span></button>
			  </div>
			</div>

		</fieldset>
	</form>
	</div>
		
	<div id="footer"></div><!-- /footer -->
		
	</div>
	
</div>

</body>
</html>