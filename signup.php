<?php

include("config.php");


// Check connection
if (!$conn ||mysqli_connect_errno()) {
  echo("Connection failed: " . mysqli_connect_error());
}else{
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $oname = mysqli_real_escape_string($conn,$_POST['oname']);
    $school = mysqli_real_escape_string($conn,$_POST['school']);
    $course = mysqli_real_escape_string($conn,$_POST['course']);
    $myemail= mysqli_real_escape_string($conn,$_POST['email']);
    $regNo= mysqli_real_escape_string($conn,$_POST['regNo']);
    $pass = mysqli_real_escape_string($conn,$_POST['pass']); 
    $DOB = mysqli_real_escape_string($conn,$_POST['DOB']);

    
    $sql ="INSERT INTO student_reg(fname, other_names,school, course, email, DOB, reg_no, pass) VALUES ('$fname','$oname','$school','$course','$myemail','$DOB','$regNo','$pass')";
    $_SESSION['regNo'] =$regNo;
  
    if ($conn->query($sql) === TRUE) {
      header("Location: index.html");

      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
  }
  
}

?>