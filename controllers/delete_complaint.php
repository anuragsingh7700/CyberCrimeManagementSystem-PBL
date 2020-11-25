<?php session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
	session_start();
	$is_valid = $_SESSION["valid"];
	$user = $_SESSION["user"];
	if($is_valid and $user == 'admin'){
		require "../res/db.php";
		$c_id = $_REQUEST["id"];
		$conn = dbconnect();
		$sql = "DELETE from complaint where complaint_id = '$c_id'";
		$result = mysqli_query($conn, $sql);
		if($result){
			header("Location:../admin_dashboard.php?s=true&msg=Deletion Sucessful!");
		}
	}
	else{
		header("Location:../complaint_details.php?s=false&msg=Not Authorized to Delete anything!");
	}
}
 ?>
