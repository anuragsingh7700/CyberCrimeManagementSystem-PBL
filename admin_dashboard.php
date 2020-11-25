<?php
session_start();
if ($_SESSION["valid"] == true) {
	require("res/db.php");
	$conn = dbconnect();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<link rel="stylesheet" href="css/style.css">
		<meta charset="utf-8">
		<title>Admin</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="text-white">
		<nav class="navbar navbar-expand-md navbar-dark">
			<a class="navbar-brand ml-1 font-weight-bold " href="#">Cyber Crime Management System</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item p-2">
						<div class="btn-group">
							<button type="button" class="btn btn-outline-light"><?php echo $_SESSION["name"];?></button>
							<button type="button" class="btn btn-outline-light dropdown-toggle dropdown-toggle-split mr-2" data-toggle="dropdown">
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="admin_change_password.php">Change Password</a>
								<a class="dropdown-item" href="admin_update_profile.php">Update Profile</a>
								<a class="dropdown-item" href="admin_view_profile.php">View Profile</a>
							</div>
						</div>
						<a class="btn btn-outline-danger rounded mr-2" href="controllers/logoutcontrol.php">Logout</a>
						
					</ul>
				</div>
			</nav>
			<div class="text-center container col-lg-10">
				<div id="info_tab" class="text-center mt-5" >
					<h1>Welcome Admin <?php echo $_SESSION["name"];?>!</h1>
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
					
  $sql = "SELECT DISTINCT complaint_id,victim,title,DATE_FORMAT(date_of_incident,'%d/%m/%y') as date,threat_level from complaint ";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)>0){
  ?></div>
			<table class="table table-transparent text-white vertical-center col-lg-12 mx-auto">
				<tr>
					<td>Threat Level</td>
					<td>DATE of incident</td>
					<td>Complaint Title</td>
					<td>Victim</td>
					<td>Details</td>
				</tr>
				<?php
					while($row = $result->fetch_assoc()){
				?>
				<tr>
					<td><?php echo $row["threat_level"]?></td>
					<td><?php echo $row["date"]?></td>
					<td><?php echo $row["title"]?></td>
					<td><?php echo $row["victim"]?></td>
					<td><form action="complaint_details.php" method="post">
						<input type="text" name="id" value="<?php echo $row['complaint_id']?>" style="display: none;">
						<!-- <input type="text" name="user" value="admin" style="display: none;"> -->
						<input type="submit" class="btn btn-outline-primary" value="View details"></form></td>
				</tr>
			<?php }
		}else{
			echo "<h3 class='text-primary'>No records to display</h3><br>";
		}
			?>
			</table>
			<script src="js/adminjs.js" charset="utf-8"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		</body>
	</html>
	<?php }else{
		header("Location:index.php");
	}
	?>