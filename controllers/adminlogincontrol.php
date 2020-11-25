<?php

$email = $_POST["email"];
$password = $_POST["password"];

require "../res/db.php";
$conn = dbconnect();
$sql = "SELECT id, password FROM login where email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  	$row = mysqli_fetch_assoc($result);
	if ($row["password"] == $password)
	{
		// echo "Checkpoint 1";
		$id = $row["id"]; 
		// echo $id;
		$sql = "SELECT * FROM admin_details where id = $id ";
		$result = mysqli_query($conn, $sql);
		// print_r($row2);
		if(mysqli_num_rows($result)>0){
			$row2 = mysqli_fetch_assoc($result);
		session_start();
		$_SESSION["name"] = $row2["name"];
		$_SESSION["id"] = $row2["id"];
		$_SESSION["valid"] = true;
		$_SESSION["user"] ="admin";
		// echo "Checkpoint 2";
		header("Location:../admin_dashboard.php");}
		else{
			// header("Location:../index.php?valid=false");
		}
	}
	else{
		header("Location:../index.php?valid=false");
	}

}
mysqli_close($conn);
?>