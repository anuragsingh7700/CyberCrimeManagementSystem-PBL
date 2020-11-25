<?php
session_start();
if ($_SESSION["valid"] == true) {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>booking history</title>
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
								<a class="dropdown-item" href="emp_update_profile">Update Profile</a>
								<a class="dropdown-item" href="emp_view_profile.php">Change Password</a>
							</div>
						</div>
						<a  class="btn btn-outline-danger" href="controllers/logoutcontrol.php">Logout</a>
						
					</ul>
				</div>
			</nav>
		<div class="container text-center text-white ">
			<h3>Complaint History</h3>
			<?php require("res/db.php");
			$id = $_SESSION["id"];
  $conn = dbconnect();
  $sql = "SELECT DISTINCT complaint_id,victim,title,DATE_FORMAT(date_of_incident,'%d/%m/%y') as date,status from complaint where user_id = '$id'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)>0){
  ?>
			<table class="table table-transparent text-white vertical-center col-lg-8 mx-auto">
				<tr><td>DATE of incident</td>
					<td>Complaint Title</td>
					<td>Victim</td>
					<td>status</td>
					<td>Details</td>
				</tr>
				<?php
					while($row = $result->fetch_assoc()){
				?>
				<tr>
					<td><?php echo $row["date"]?></td>
					<td><?php echo $row["title"]?></td>
					<td><?php echo $row["victim"]?></td>
					<td><?php echo $row["status"]?></td>
					<td><form action="complaint_details.php">
						<input type="text" name="id" value="<?php echo $row['complaint_id']?>" style="display: none;">
						<input type="submit" class="btn btn-outline-primary" value="View details"></form></td>
				</tr>
			<?php }
		}else{
			echo "<h3 class='text-primary'>No records to display</h3><br><h6>If a registered complaint isn't listed then it might be removed by administrator</h6>
			<a href='emp_dashboard.php' class='btn btn-outline-danger'>Back to Dashboard</a>";
		}
			?>
			</table>
		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	</body>
</html>

<?php }else{
	header("Location:index.php");
}
?>