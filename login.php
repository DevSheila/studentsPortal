<?php

include("config.php");
session_start();



// Check connection
if (!$conn ||mysqli_connect_errno()) {
  echo("Connection failed: " . mysqli_connect_error());
}else{
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $regNo = mysqli_real_escape_string($conn,$_POST['regNo']);
    $pass = mysqli_real_escape_string($conn,$_POST['pass']); 

    $_SESSION['regNo'] =$regNo;

    
    $sql = "SELECT id FROM student_reg WHERE reg_no = '$regNo' and pass = '$pass'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    // $active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
  
    if($count == 1) {
      
      header("Location: profile.php");
      echo "<h1><center> Login successful </center></h1>";

    }else {
      echo "<h1><center>Your Login Name or Password is invalid</center></h1>";
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

 }
}

?>