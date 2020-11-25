<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Homepage</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-md navbar-dark">
			<a class="navbar-brand ml-1 font-weight-bold " href="#">Cyber Crime Management System</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item p-2">
						<a class="nav-link text-white text-muted" href="#">Home</a>
					</li>
					<li class="nav-item p-2">
						<a class="nav-link text-white " href="developers.html">Developers</a>
					</li>
					<li class="nav-item p-2">
						<a class="nav-link text-white btn btn-outline-secondary" data-toggle="modal" data-target="#myModal1">Admin</a>
					</li>
				</ul>
			</div>
		</nav>
		<br>
		<div class="container text-center text-white align-middle ">
			<div class="container-fluid text-center text-white col-sm-10 col-lg-8">
				<h1>Welcome to the Cyber Crime <br>reporting platform.<br> We are here to help you!</h1>
			</div>
			<div class="container text-center p-3 mt-5 col-lg-5 col-sm-10 rounded ">
				<h2>Begin to raise your voice!</h2>
				<?php
				if(isset($_REQUEST["valid"]) && $_REQUEST["valid"] == "false"){ ?>
				<h6 class='text-white bg-danger'>Wrong Login credentials! Try again</h6>
				<?php }
				?>
				<div class="row justify-content-center p-5 ">
					<div class="column">
						<!-- Button to Open the Modal -->
						<!-- <button type="button" class="btn btn-primary m-4" data-toggle="modal" data-target="#myModal1">
						Administrator
						</button> -->
						<!-- The Modal -->
						<div class="modal fade" id="myModal1">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content bg-dark">
									
									<!-- Modal Header -->
									<div class="modal-header bg-secondary">
										<h4 class="modal-title">Admin Login</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									
									<!-- Modal body -->
									<div class="modal-body p-4">
										<form action="controllers/adminlogincontrol.php" method="post">
											<input class="form-control p-2 " type="text" name="email" placeholder="Email" required autocomplete="off">
											<input class="form-control mt-2 p-2 " type="password" name="password" placeholder="Password" required>
											<input class="mt-4 col-8 btn btn-outline-success" type="submit" value="Login">
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="column">
						<!-- Button to Open the Modal -->
						<button type="button" class="btn btn-outline-light m-2 p-3 pl-5 pr-5" data-toggle="modal" data-target="#myModal2">
						<h3>Begin</h3>
						</button>
						<!-- The Modal -->
						<div class="modal fade" id="myModal2">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content bg-dark">
									
									<!-- Modal Header -->
									<div class="modal-header bg-secondary ">
										<h4 class="modal-title text-light">User Login</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									
									<!-- Modal body -->
									<div class="modal-body">
										<form action="controllers/logincontrol.php" method="post">
											<input class="form-control p-2" type="text" name="email" placeholder="Email" required autocomplete="off">
											<input class="form-control mt-3 p-2" type="password" name="password" placeholder="Password" required>
											<input class=" mt-4 btn btn-outline-success col-6" type="submit" value="Login">
										</form>
									</div>
									
									<!-- Modal footer -->
									<div class="modal-footer">
										<h5>New to the portal...</h5>
										<a class="btn btn-outline-warning" href="register.php">Register</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	</body>
</html>	