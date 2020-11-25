<?php

$email= $_POST["email"];
$password = $_POST["password"];

require "../res/db.php";
$conn = dbconnect();
$sql = "SELECT id, password FROM login where email = '$email' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  	$row = mysqli_fetch_assoc($result);
  	print_r($row);
	if ($row["password"] == $password)
	{
		echo "Checkpoint 1";
		$id = $row["id"];
		echo $id;
		$sql = "SELECT name,id FROM user_details where id = $id ";
		$row2 = mysqli_fetch_assoc(mysqli_query($conn, $sql));
		// print_r($row2);
		session_start();
		$_SESSION["name"] = $row2["name"];
		$_SESSION["id"] = $row2["id"];
		$_SESSION["valid"] = true;
		// echo "Checkpoint 2";
		header("Location:../emp_dashboard.php");
	}
	else{
		header("Location:../index.php?valid=false");
	}

}else{
		header("Location:../register.php?msg=Register first!");
	}
mysqli_close($conn);
?>
