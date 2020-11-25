<?php
session_start();
if ($_SESSION["valid"] == true) {
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<div="header">
			<title>Homegage</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
						<div class="btn-group">
							<button type="button" class="btn btn-outline-light"><?php echo $_SESSION["name"];?></button>
							<button type="button" class="btn btn-outline-light dropdown-toggle dropdown-toggle-split mr-3" data-toggle="dropdown">
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="emp_view_profile.php">View Profile</a>
								<a class="dropdown-item" href="emp_update_profile.php">Update Profile</a>
								<a class="dropdown-item" href="emp_change_password.php">Change Password</a>
							</div>
						</div>
						<a  class="btn btn-outline-danger" href="controllers/logoutcontrol.php">Logout</a>
						
					</ul>
				</div>
			</nav>
			<br>
			<div class="container-fluid text-center text-info">
				<h1>Welcome <?php echo $_SESSION["name"];?>!</h1>
				<?php
						if(isset($_REQUEST["s"]) && $_REQUEST["s"] != ""){
							if(true == filter_var($_REQUEST["s"], FILTER_VALIDATE_BOOLEAN)){
								echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
												'.$_REQUEST["msg"].'
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
								</div>';
							} else{
								echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
												'.$_REQUEST["msg"].'
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
								</div>';
							}
						}
				?>
			</div>
		</div>
	</div>
	<div class="row card-deck text-white col-12">
		<div class="card bg-transparent ">
			<div class="card-body text-center">
				<p class="card-text">
					<h3>Keep track of your previous complaints!<br>Check your previous history...</h3>
					<a class="btn btn-outline-success" href="history.php">Complaint History</a>
				</p>
			</div>
		</div>
		<div class="card bg-transparent text-white">
			<div class="card-body text-center">
				<p class="card-text">
					<h3>Does someone has a trouble!<br>Click to Report<h3>
					<!-- <a class="btn btn-outline-light" href="book_new.php">Register for a trip</a> -->
					<button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#myModal2">Register a complaint</button>
					<!-- The Modal -->
					<div class="modal fade" id="myModal2">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content bg-dark">
								
								<!-- Modal Header -->
								<div class="modal-header bg-secondary ">
									<h4 class="modal-title text-light">Register a Complaint!</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								
								<!-- Modal body -->
								<div class="modal-body text-center">
									<form action="controllers/save_complaint.php" method="post">
										<!-- <label>Register Anonymous Complaints!</label> -->
										<input type="text" class="form-control p-2" name="victim" placeholder="Victim's Name" required autocomplete="off"><br>
										<input type="text" class="form-control p-2" placeholder="Complaint's title" required autocomplete="off" name="title"><br>
										<input type="text" class="form-control p-2" placeholder="Description" name="description">
										<br><h5 class="text-left">Date of starting</h5>
										<input class="form-control p-2" type="date" name="date" required autocomplete="off" max="<?php echo date("Y-m-d")?>">
										<br><h5 class="text-left">Relation with Victim</h5>
										<select class="form-control" required name="relation">
											<option value="self">Self</option>
											<option value="Son">Son</option>
											<option value="Daughter">Daughter</option>
											<option value="Spouse">Spouse</option>
											<option value="Father">Father</option>
											<option value="Mother">Mother</option>
											<option value="Friend">Friend</option>
											<option value="Other">Other</option>
										</select>
										<br><h5 class="text-left">Threat Level</h5>
										<select class="form-control" required name="threat">
											<option value="Low">Low</option>
											<option value="Medium">Medium</option>
											<option value="High">High</option>
											<option value="Severe">Severe</option>
											<option value="Extreme">Extreme</option>
										</select>
										<textarea class="form-control p-2" name="additional" placeholder="Enter Additional Information"  required autocomplete="off"></textarea>
										<input class=" my-4 mx-auto btn btn-outline-success col-6" type="submit" value="File it">
									</form>
								</div>
							</div>
						</div>
					</div>
				</p>
			</div>
		</div>
	</div>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
​
<?php }else{
	header("Location:index.php");
}
?>