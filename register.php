<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Homegage</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-md navbar-dark">
			<a class="navbar-brand ml-1 font-weight-bold " href="#">Travel Management System</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item p-2">
						<a class="nav-link text-white" href="index.php">Home</a>
					</li>
					<li class="nav-item p-2">
						<a class="nav-link text-white " href="#">About Us</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="container text-center text-white col-lg-6 col-md-8 col-sm-10 ">
			<div class="border border-white rounded">
				<h3 >Registration Form</h3>
				<?php
				if(isset($_REQUEST["msg"]) && $_REQUEST["msg"] != ""){
					$msg = $_REQUEST["msg"];
					echo "<h6 class='text-danger'>".$msg."</h5>";}
				?>
				<hr style="background-color:white">
				<form method="POST" class="text-center py-3" action="controllers/registercontrol.php" onsubmit = "return validate()">
					<table class="text-center col-lg-10 col-md-10  mx-auto">
						<tr >
							<td>Full Name</td>
							<td><input type="text" class="form-control" name="fullname" placeholder="Enter your name" required autocomplete="off"></td>
						</tr>
						<tr>
							<td>Email Id</td>
							<td><input type="Email" class="form-control" name="Email_Id" placeholder="Enter your email id" required autocomplete="off"></td>
						</tr>
						
						<tr>
							<td>Address</td>
							<td><textarea class="form-control" name="address" required autocomplete="off"></textarea></td>
						</tr>
						<tr>
							<td>Pincode</td>
							<td><input type="number" class="form-control" name="pincode" placeholder="Pincode" required autocomplete="off" max="999999" min="000001"></td>
						</tr>
						<tr>
							<td>Contact</td>
							<td><input type="number" class="form-control" name="mobile" placeholder="Enter Mobile Number" required autocomplete="off" max="9999999999" min="1000000000"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="off" minlength="8"></td>
						</tr>
						<tr>
							<td>Confirm Password</td>
							<td><input type="password" class="form-control" id="cnfpassword" name="cnfpassword" placeholder="Retype Password" required autocomplete="off"></td>
						</tr>
						<tr>
							<td colspan="2" class="text-center"><input type="submit" class="btn btn-outline-success  mt-3" value="Register" data-toggle="modal" data-target="#myModal1"></td>
						</tr>
						<tr>
							<td colspan="2">Already Registered&nbsp;&nbsp;&nbsp;<a href="index.php" class="btn btn-outline-primary mt-2">login</a></td>
						</tr>
					</table>
				</form>
				<script type="text/javascript">
				function validate() {
				var emailID = document.myForm.Email_Id.value;
				atpos = emailID.indexOf("@");
				dotpos = emailID.lastIndexOf(".");
				
				if (atpos < 1 || ( dotpos - atpos < 2 )) {
				alert("Please enter correct email ID")
				document.myForm.EMail.focus() ;
				return false;
				}
				var pswd = document.getElementById('password');
				var cnfpswd = document.getElementById('cnfpassword');
				if(pswd.value != cnfpswd.value){
				pswd.setAttribute("placeholder", "Password Mismatch");
				cnfpswd.setAttribute("placeholder", "Password Mismatch");
				return false;
				}
				return( true );
				</script>
			</div>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		</body>
	</html>