<?php

include("config.php");


// Check connection
if (!$conn ||mysqli_connect_errno()) {
  echo("Connection failed: " . mysqli_connect_error());
}else{
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $regNo= mysqli_real_escape_string($conn,$_POST['regNo']);
    $school = mysqli_real_escape_string($conn,$_POST['school']);
    $course = mysqli_real_escape_string($conn,$_POST['course']);
    $year = mysqli_real_escape_string($conn,$_POST['year']);
    $sem = mysqli_real_escape_string($conn,$_POST['sem']);
    $currYear=date('Y');

    
    $sql ="INSERT INTO semester_reg(reg_no, year, reg_date,semester_no, unique_no) VALUES ('$regNo','$year',$currYear,'$sem','')";
    if ($conn->query($sql) === TRUE) {
      header("Location: unitsRegister.php");

      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
 }
}

?>