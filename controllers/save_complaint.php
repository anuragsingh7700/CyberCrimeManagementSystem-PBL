<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  session_start();
  // $objective = $_POST["objective"];

  $victim = $_POST["victim"];
  $title = $_POST["title"];
  $description = $_POST["description"];
  $date = $_POST['date'];
  $relation = $_POST["relation"];
  $additional = $_POST["additional"];
  $threat_level = $_POST["threat"];
  $u_id = $_SESSION["id"];

  echo $u_id.$victim.$title.$relation.$description.$threat_level.$date.$additional;
  require("../res/db.php");
// Creates connection
  $conn = dbconnect();
    $sql = "INSERT INTO 
    complaint(user_id,victim, title, relation_to_victim, description,
      threat_level,  date_of_incident,  additional_info, status)
      VALUES 
      ('$u_id', '$victim', '$title', '$relation', '$description',
      '$threat_level', '$date' ,'$additional','Submitted')";
    $result = mysqli_query($conn,$sql);
    if($result){
      mysqli_close($conn);
      header("Location:../emp_dashboard.php?s=true&msg=Bingo! Complaint registeration is Successful.");
    }else{
      echo mysqli_error($conn);
      // header("Location:../emp_dashboard.php?s=false&msg= Complaint registeration Failed");
    }
}else{
  // header("Location:../emp_dashboard.php?s=false&msg=Encountered Some Technical Error!");
}
?>