<?php
session_start();
if ($_SESSION["valid"] == true) {
require("res/db.php");
$conn = dbconnect();
$sql = "SELECT * from user_details where id =". $_SESSION["id"];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <title><?php
    echo $_SESSION["name"];
    ?></title>
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
            <div class="btn-group">
              <button type="button" class="btn btn-outline-light"><?php echo $_SESSION["name"];?></button>
              <button type="button" class="btn btn-outline-light dropdown-toggle dropdown-toggle-split mr-2" data-toggle="dropdown">
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item " href="emp_view_profile.php">View Profile</a>
                <a class="dropdown-item " href="#" bg-secondary>Update Profile</a>
                <a class="dropdown-item " href="emp_change_password.php">Change Password</a>
              </div>
            </div>
            <a class="btn btn-outline-danger rounded mr-2" href="controllers/logoutcontrol.php">Logout</a>
            
          </ul>
        </div>
      </nav>
    <div class="container text-center text-white col-lg-6 col-md-8 col-sm-10 ">
      <div>
        <h3 >Update Profile</h3>
        <form method="POST" action="controllers/empupdatecontrol.php">
            <table class=" table text-center col-lg-10 col-md-10  mx-auto text-white">
              <tr >
                <td>Name</td>
                <td><input type="text" class="form-control" name="name" value='<?php echo $row["name"];?>'required></td>
              </tr>
              <tr >
                <td>Phone Number</td>
                <td><input type="text" class="form-control" name="phone_no" value='<?php echo $row["phone_no"];?>'required></td>
              </tr>
              <tr >
                <td>Address</td>
                <td><input type="text" class="form-control" name="address" value='<?php echo $row["address"];?>'required></td>
              </tr>
              <tr >
                <td>Pincode</td>
                <td><input type="text" class="form-control" name="pincode" value='<?php echo $row["pincode"]?>' required></td>
              </tr>
              <tr>
                <td colspan="2" class="text-center">
                  <a class="btn btn-outline-danger  mr-3 mt-3" href="emp_dashboard.php">Back to Home</a>
                  <input type="submit" class="btn btn-outline-success ml-3 mt-3" value="Save Changes">
                </td>
              </tr>
            </table>
          </form>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </body>
  </html>
  <?php }else{
  header("Location:index.php");
}
?>