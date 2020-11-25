<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	session_start();
	$id = $_SESSION["id"];
	$name = $_POST["name"];
	$phone_no = $_POST["phone_no"];
	$pincode = $_POST["pincode"];
	$address = $_POST["address"];
	require '../res/db.php';
	$conn = dbconnect();

 
	$sql = "UPDATE user_details SET name='$name', address='$address',pincode='$pincode',phone_no='$phone_no' WHERE id = $id";
	$result = mysqli_query($conn, $sql);
	// print_r($result);
	// exit();
	if($result){
		$_SESSION["name"] = $name;
		header("Location:../emp_dashboard.php?s=true&msg=Profile Updated Successfully");
	}
	else{
		header("Location:../emp_dashboard.php?s=false&msg=Profile Updation failed");
	}
}else{
	header("Location:../emp_dashboard.php?s=false&msg=Technical Error");
}
?>