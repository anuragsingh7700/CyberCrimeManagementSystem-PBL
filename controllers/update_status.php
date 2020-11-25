<?php session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
	// session_start();
	$is_valid = $_SESSION["valid"];
	$user = $_SESSION["user"];
	if($is_valid and $user == 'admin'){
		require "../res/db.php";
		$c_id = $_REQUEST["id"];
		$status = $_REQUEST["status_update"];
		$conn = dbconnect();
		echo "hey";
				$sql = "UPDATE complaint SET status = '$status' where complaint_id = '$c_id'";
				$result = mysqli_query($conn, $sql);
		// echo mysqli_error($conn);
		if($result){
header("Location:../complaint_details.php?id=$c_id&s=true&msg=Status Update Sucessful!");
}
}
else{
header("Location:../complaint_details.php?s=false&msg=Not Authorized to Update anything!");
}
}
?>