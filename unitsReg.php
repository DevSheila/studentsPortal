<?php
    session_start();
    include("config.php");

    $regNo=$_SESSION['regNo'];
    $course="";
    $year="";
    $sem="";
    $school="";
    $unitname="";
    $units='';

    if($regNo == null){
      header("Location:login.php");
    }

       // Check connection
    if (!$conn ||mysqli_connect_errno()) {
        echo("Connection failed: " . mysqli_connect_error());
    }else{
       
        $sql = "SELECT * FROM semester_reg WHERE reg_no = '$regNo'";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);

            while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                // $course=$row['course'];
                $year=$row['year'];
                $sem=$row['semester_no'];
                // $school=$row['school'];
            }


            $sql2 = "SELECT * FROM student_reg WHERE reg_no = '$regNo'";
            $result2 = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($result2);
    
                while( $row = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
                    $course=$row['course'];
                    $school=$row['school'];
                }

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $counts=$_SESSION['count'];
                echo $counts;


                //loop according to number of valid units
    
                for($i = 0; $i < $counts; $i++){
                    $unitnum=(string)$i;
                    $curr='unit'.$unitnum.'';
                    //check if currenyt unit is checked
                    if(isset($_POST[$curr])){
                        //if cuurent unit is checked,submit it
                        $currYear=date("Y-m-d"); 
    
                        $unitname=mysqli_real_escape_string($conn,$_POST[$curr]);
                        $units=$units.$unitname.',';
                        
                    }else{
                        echo 'set error'; 
                    }
    
               }
               $sql= "INSERT INTO unit_reg( reg_no, course, year_of_study, semester_no, school, unique_no, unit_codes_and_names,year_reg) VALUES ('$regNo','$course',$year,$sem,'$school','','$units','$currYear')";
                if ($conn->query($sql) === TRUE) {
                            echo $unitname;
                } else{
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
            }

    }
?>