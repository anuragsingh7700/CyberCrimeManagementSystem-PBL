<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	// $empid = $_POST["Emp-Id"];
	$name = $_POST["fullname"];
	$passw = $_POST["password"];
	$emailid = $_POST["Email_Id"];
	$addrs =$_POST["address"];
	$pincode =(int) $_POST["pincode"];
	$mobile =(int) $_POST["mobile"];
// echo "$empid,$passw,$emailid,$addrs,$pincode,$mobile";
require("../res/db.php");
// Creates connection
$conn = dbconnect();
	$sql1 = "INSERT INTO login (email, password) VALUES('$emailid', '$passw')";
	$result1 = mysqli_query($conn, $sql1);
	// print_r($result1);
	if($result1){
		// echo "I'm there";
	$sql = "SELECT id from login where email= '$emailid' ";
	$result2 = mysqli_query($conn, $sql);
	
	$row = mysqli_fetch_assoc($result2);
	print_r($row);
	$id = $row["id"];
	$sql3 = "INSERT INTO user_details (id, name, address, pincode, phone_no) VALUES($id, '$name', '$addrs',$pincode,$mobile)";
	$result3 = mysqli_query($conn,$sql3);
}
else{
	// header("Location:index.php?msg='Already registered'");
}
if ($result1 && $result3){
	session_start();
	$_SESSION["name"] = $name;
	$_SESSION["id"] = $id;
	$_SESSION["valid"] = true;
	// echo "session saved";
	header("Location:../emp_dashboard.php");
}
else{
	header("Location:../register.php?msg=Registeration failed Successfully! Try again");
}
mysqli_close($conn);
}
?>