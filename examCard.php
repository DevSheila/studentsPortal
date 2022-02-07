<?php
    session_start();
    include("config.php");

    $currYear=date("Y");
    $regNo=$_SESSION['regNo'];
    $school="";
    $course="";
    $year="";
    $fname="";
    $oname="";
    $names="";
    $units="";
    $DOB='';
    $email='';
    $pass='';

    if($regNo == null){
      header("Location:studLogin.php");
    }

       // Check connection
    if (!$conn ||mysqli_connect_errno()) {
        echo("Connection failed: " . mysqli_connect_error());
    }else{
       
      // date
      // reg no
        $sql = "SELECT * FROM student_reg WHERE reg_no = '$regNo'";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);

            while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
              $school=$row['school'];
              $course=$row['course'];
              $fname=$row['fname'];
              $oname=$row['other_names'];
            

            }
            $names=$fname.' '.$oname;


            $sql2 = "SELECT * FROM semester_reg WHERE reg_no = '$regNo' ";
            $result2 = mysqli_query($conn,$sql2);
            $count2= mysqli_num_rows($result2);
    
            while( $row = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
               $semester=$row['semester_no'];
                 
                $year=$row['year'];
    
            }
           

                $sql3= "SELECT * FROM unit_reg WHERE reg_no ='$regNo' AND semester_no='$semester' AND year_of_study='$year'";
                $result3 = mysqli_query($conn,$sql3);
                $count3= mysqli_num_rows($result3);
                if (!$result3) {
                  printf("Error: %s\n", mysqli_error($conn));
                  echo 'No units registered for year:'.$year.'Semester:'.$semester.'Kindly regster units first';
                  exit();
              }else{
                while( $row = mysqli_fetch_array($result3,MYSQLI_ASSOC)){
                  $units=$row['unit_codes_and_names'];

      
                }
              }
        
                   

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sem Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="./css/print.css" media="print"/>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">STUDENT PORTAL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <p class="text-muted"><?php echo $names;?></p>
          <p class="text-muted"><?php echo $regNo;?></p>

        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="./profile.php" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Home</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./semRegister.php" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sem Registration</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./unitRegister.php" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Units Registration</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Exam Card</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Results Slip</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./logout.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </li>
               
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>STUDENT PORTAL</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
   
        <div class="row">
              <!-- left column -->
              <div class="col-md-3">
              </div>

            

              <div class="col-md-6">
            
                  <!-- /.card-header -->
                  <div class="col-12 col-md-12 col-sm-12  d-flex align-items-stretch flex-column">
              
                  <div class="card card-primary">
                  
                  <!-- /.card-header -->
                  <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                              <img src="./images/maseno logo.png" alt="" class="img-fluid" >
                            </div>
                            <div class="col">
                              <h3>MASENO UNIVERSITY</h1>
                              <h5>Private Bag</h3>
                              <h5>+254-57-351620/22;</h3>
                                
                              <span ><h5 class="float-left" ><strong>MSU/RASA/F.61</strong></h5> </span>
                            </div>
                            <div class="col-2">
                              <div class="d-flex justify-content-center m-5">
                                  <button  class="btn  btn-sm btn-primary" onclick ="window.print();" id="login-btn" >Print</button>
                              </div>
                            </div>
                        </div>

                        
                  

                        <div class="row">
                          <div class="col-12">
                              
                                <span>
                                  <p ><strong><i class="fas fa-user mr-1"></i>STUDENT NAME:</strong> <?php echo $names; ?></p>
                                </span>
                                <span>
                                  <p ><strong><i class="fas fa-user mr-1"></i>STUDENT NO:</strong> <?php echo $regNo; ?></p>
                                </span>
                                <span>
                                  <p ><strong><i class="fas fa-user mr-1"></i>SCHOOL:</strong> <?php echo $school; ?></p>
                                </span>
                                <span>
                                  <p ><strong><i class="fas fa-user mr-1"></i>COURSE:</strong> <?php echo $course; ?></p>
                                </span>
                                <span>
                                  <p ><strong><i class="fas fa-user mr-1"></i> STAGE:</strong> <?php echo 'Y'.$year.'S'.$semester; ?></p>
                                </span>

                                <table class="table">
                                <h6 class="justify-center"><strong><u>EXAMINATION CARD</u></strong></h1>
                                  <thead>
                                    <tr>
                                      <th scope="col">Unit </th>
                      
                                      <th scope="col">Invigilator sign</th>
                                      
                                    </tr>
                                  </thead>
                                  <?php 

                                  $trimmedString=trim($units);
                                  $unitsArray=explode(",",$trimmedString);
                                  $unitsNum =count($unitsArray);
                                  unset($unitsArray[$unitsNum-1]);

                                  ?>
                                  <tbody>
                                    <?php
                                    foreach($unitsArray as $uni){
                                      ?>
                                        <tr>
                                            <td><?php echo $uni ?></td>
                                            <td>_ _ _ _ _ _ _ _ _ </td>
                                        </tr>
                                      <?php
                                    }
                                    ?>
                               
                                    
                                 
                                  </tbody>
                                </table>

                              
                                      <h5><strong>  <u>IMPORTANT</u></strong></h5>
                                      <p>
                                      
                                      The invigilator <strong>  MUST</strong> sign the Card as he/she collects the scripts.<br>
                                      Any error on the names must be corrected at the office of the Dean of the School in which the
                                      Candidate is Registered.<br>
                                      Please Note: Exam cheating is a crime

                                      </p>

                                      <p>
                                      <strong>  This is to confirm that the information above is correct</strong><br>
                                        SIGN:
                                        ................................................... <br> <br> <br>
                                        For Registrar ASA: Date and Stamp.................... <br>

                                      </p>
                                    


                   
                          </div>

                        </div>
                   

                       


                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
                <!-- /.card -->

              <div class="col-md-3">
              </div>

          
          </div>
    
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
