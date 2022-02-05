<?php
    session_start();
    include("config.php");

    $regNo=$_SESSION['regNo'];
    $course="";
    $year="";
    $sem="";

    if($regNo == null){
      header("Location:index.html");
    }

       // Check connection
    if (!$conn ||mysqli_connect_errno()) {
        echo("Connection failed: " . mysqli_connect_error());
    }else{
       
        $sql = "SELECT * FROM semester_reg WHERE reg_no = '$regNo'";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);

            while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $year=$row['year'];
                $sem=$row['semester_no'];
            }
            $sql2 = "SELECT * FROM student_reg WHERE reg_no = '$regNo'";
            $result2 = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($result2);
    
                while( $row = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
                    $course=$row['course'];
                   
                }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">STUDENT PORTAL</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
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
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Units Registration</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="unitsReg" method="POST" action="unitsReg.php">
                <div class="card-body">
                <?php
                    $CCT2_1=[
                        'CCT 201 Object Oriented programming II',
                        'CCT 203 Data Structures and Algorithms', 
                        'CCT 205 Engineering Mathematics III', 
                        'CCT 207 Digital Electronics I',
                        'CCT 209 Comp. Org. & Assm. Lang. Prog.',
                        'CCT 211 Databases',
                        'CCT 213 Electronics III',
                        'CCT 204 Principles of Operating Systems' 
                    ] ;

                    $CCT3_2=[
                        'CCT 301 Computer Architecture I',
                        'CCT 303 Digital Signal Processing', 
                        'CCT 305 Intro. Compiler Const. & Design',
                        'CCT 307 Computer Networks',
                        'CCT 309 Digital Systems Design', 
                        'CCT 311 Digital Systems Design Lab',
                        'CCT 315 Communication Systems',
                        'CCT 317 Group Project I',
                        'CCT 319 Computer Networks Lab I (Cisco I)'
                    ];
                    $CCT4_1=[
                        'CCT 401 Computer Systems Engineering I',
                       'CCT 403 Computer Design Lab', 
                        'CCT 405 Computer Technology project I',
                        'CCT 411/ccs420 Neural Networks',
                        'CCT 413/ccs417 Principles of Functional Programming', 
                        'CCT 415 Embedded Computing Systems II', 
                        'CCT 417 Simulation and Modeling', 
                        'CCT 423 Optical fibres: Theory and Applications',
                        'CCT 419/ccs421 Intelligent Agents', 
                        'CCT 425/ccs409 Computer Networks Lab III (Cisco III)',
                        'CCT 416/ccs415 Data Mining'
                    ];

                    $CCS2_1=[
                        'CCS 201 Object Oriented Programming II (Java)',
                        'CCS 203 Data Structures and Algorithms',
                        'CCS 205 Probability and Statistics',
                        'CCS 207 Digital Electronics II',
                        'CCS 209 Principles of Operating Systems',
                        'CCS 211 Digital and Analogue Communication Systems',
                        'CCS 213 Systems Analysis and Design'
                    ];

                    $CCS3_1=[
                        'CCS 301 Principles of programming languages', 
                        'CCS 303 Design and Analysis of algorithms',
                        'CCS305 Intro. to Compiler Construction and Design',
                        'CCS 307 Computer Networks',
                        'CCS 309 Information Systems Security and Design',
                        'CCS 313 Unix Operating Systems',
                        'CCS 315 Intelligent Systems', 
                        'CCS 317 Computer Networks Lab I (CISCO)', 
                        'CCS 319 Database Administration',
                        'CCS 323 Group Project'
                    ];

                    $CCS4_1=[
                        'CCS 401 Software Project Management',
                        'CCS 403 Computer Science Project I',
                        'CCS 405 Management Information Systems',
                        'CCS 407 Distributed Systems',
                        'CCS 409/cct425 Computer Networks Lab III (CISCO III)', 
                        'CCS 417/cct413 Principles of Functional Programming', 
                        'CCS 419 Advanced Computer Architectures',
                        'CCS 421/cct419 Intelligent Agents', 
                        'CCS 420/cct411 Neural Networks'

                    ];
                
                $availableCourses[]='';
                

                if($course=='Bsc Computer Science') {
                    if(($year==2) && ($sem== 1)){
                        $availableCourses=$CCS2_1;
                    }

                    if(($year==3) && ($sem== 1)){
                        $availableCourses=$CCS3_1;
                    }
                    if(($year==4) && ($sem== 1)){
                        $availableCourses=$CCS4_1;
                    }
                }

                if($course=='Bsc Computer Technology') {
                    if(($year==2) && ($sem== 1)){
                        $availableCourses=$CCT2_1;
                    }

                    if(($year==3) && ($sem== 1)){
                        $availableCourses=$CCT3_1;
                    }
                    if(($year==4) && ($sem== 1)){
                        $availableCourses=$CCT4_1;
                    }
                }



                    $count=0;
                    foreach($availableCourses as $name) {?>
                        <?php $count ++; ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?php echo $name ?>" name="unit<?php echo $count?>" id="<?php echo $name ?>" >
                                <label class="form-check-label" for="<?php echo $name ?>"><?php echo $name ?></label>
                            </div>

                        <?php
                    }
                    $_SESSION['count'] =$count;


                


                ?>
                    <input class="form-check-input" type="number" value="<?php echo $count ?>" name="count" id="<?php echo $count ?>" hidden>
               

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          
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
