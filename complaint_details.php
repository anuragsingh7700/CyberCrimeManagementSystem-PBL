<?php
session_start();
if ($_SESSION["valid"] == true) {
	$c_id = $_REQUEST["id"];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>booking details</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
							<a class="dropdown-item" href="emp_update_password.php">Update Profile</a>
							<a class="dropdown-item" href="emp_change_password.php">Change Password</a>
						</div>
					</div>
					<a  class="btn btn-outline-danger" href="controllers/logoutcontrol.php">Logout</a>
					
				</ul>
			</div>
		</nav>
		<div class="container text-center text-white">
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
			<h3>Complaint history</h3>
			<?php require("res/db.php");
			$conn = dbconnect();
			$sql = "SELECT DISTINCT victim,title,description,relation_to_victim,threat_level,date_of_incident,additional_info,status from complaint where complaint_id = '$c_id'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			?>
			<table class="table table-dark table-hover text-white vertical-center col-lg-6 mx-auto">
				<tr>
					<td>Victim</td>
					<td><?php echo $row["victim"]?></td>
				</tr>
				<tr>
					<td>Complaint Title</td>
					<td><?php echo $row["title"]?></td>
				</tr>
				<tr>
					<td>Decription</td>
					<td><?php echo $row["description"]?></td>
				</tr>
				<tr>
					<td>Relation</td>
					<td><?php echo $row["relation_to_victim"]?></td>
				</tr>
				<tr>
					<td>Threat Level</td>
					<td><?php echo $row["threat_level"]?></td>
				</tr>
				<tr>
					<td>Date of Incident</td>
					<td><?php echo $row["date_of_incident"]?></td>
				</tr>
				<tr>
					<td>Additional Details</td>
					<td><?php echo $row["additional_info"]?></td>
				</tr>
				<tr>
					<td>Status</td>
					<td><?php echo $row["status"]?></td>
				</tr>
			</table>
			
			<?php
				if(isset($_SESSION["user"]) and $_SESSION["user"] == "admin"){
			?>
			<div class="container-fluid row">
				<div class="col"><a href="admin_dashboard.php" class="btn btn-outline-warning ">Back to Dashboard</a></div>
				<div class="col"><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#myModal1">Update Status</button></div>
				<div class="col"><form action="controllers/delete_complaint.php" method="post" accept-charset="utf-8">
					<input type="text" name="id" value="<?php echo $c_id?>" style="display: none;">
					<input type="submit" name="Spam" class="btn btn-outline-danger" value="Spam/Delete">
				</form></div>
				<div class="col"><a href="mailto:velocitycoder@gmail.com?subject=Reporting a severe issue&body=Victim%3A<?php echo $row["victim"]?>%0ATitle%3A<?php echo $row["title"]?>%0ADescription%3A<?php echo $row["description"]?>%0ADate%20of%20Incident%3A<?php echo $row["date_of_incident"]?>%0AAdditional%20Info%3A<?php echo $row["additional_info"]?>%0A%0ARegards%0ACyber%20Crime%20Management%20System%0A<?php echo $_SESSION['name']?>" class="btn btn-outline-primary">Forward the Case</a></div>
				<?php }else{ ?>
				<a href="emp_dashboard.php" class="btn btn-outline-danger ">Back to Dashboard</a> <?php } ?>
			</div>
			<div class="modal fade" id="myModal1">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content bg-dark">
						
						<!-- Modal Header -->
						<div class="modal-header bg-secondary">
							<h4 class="modal-title">Update Status</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						
						<!-- Modal body -->
						<div class="modal-body p-4 text-center">
							<form action="controllers/update_status.php" method="post">
								<input type="text" name="user" value="admin" style="display: none;">
								<input type="text" name="id" value="<?php echo $c_id?>"style="display: none;">
								<select name="status_update" class="form-control mt-2">
									<option value="In Progress">In Progress</option>
									<option value="Forwaded">Forwaded</option>
									<option value="Irrelevant">Irrelevant</option>
									<option value="Waiting">Waiting</option>
									<option value="Incomplete">Incomplete</option>
								</select>
								<input class="mt-4 col-8 btn btn-outline-success" type="submit" value="Update">
							</form>
						</div>
					</div>
				</div>
			</div>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		</body>
	</html>
	<?php }else{
		header("Location:index.php");
	}
	?>