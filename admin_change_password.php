<?php
session_start();
if ($_SESSION["valid"] == true) {
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
                <a class="dropdown-item bg-secondary" href="#">Change Password</a>
                <a class="dropdown-item " href="admin_update_profile.php">Update Profile</a>
                <a class="dropdown-item " href="admin_view_profile.php">View Profile</a>
              </div>
            </div>
            <a class="btn btn-outline-danger rounded mr-2" href="controllers/logoutcontrol.php">Logout</a>
            
          </ul>
        </div>
      </nav>
    <div class="container text-center text-white col-lg-6 col-md-8 col-sm-10 ">
      <div>
        <h3 >Change Password</h3>
        <form method="POST" action="controllers/adminchangepasswordcontrol.php">
            <table class=" table table-borderless text-center col-lg-10 col-md-10  mx-auto text-white">
               <tr >
                <td>Old Password</td>
                <td><input type="password" class="form-control" name="old_pass"></td>
              </tr>
              <tr >
                <td>New Password</td>
                <td><input type="password" class="form-control" name="new_pass"></td>
              </tr>
              <tr >
                <td>Confirm Password</td>
                <td><input type="password" class="form-control" name="cnf_pass"></td>
              </tr>
              <tr>
                <td colspan="2" class="text-center">
                  <a class="btn btn-outline-danger  mr-3 mt-3" href="admin_dashboard.php">Back to Home</a>
                  <input type="submit" class="btn btn-outline-success ml-3 mt-3" value="Update Password">
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