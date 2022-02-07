<?php
    session_start();
    include("config.php");

    $regNo=$_SESSION['regNo'];
    $school="";
    $course="";
    $year="";
    $names="";

    if($regNo == null){
      header("Location:studLogin.php");
    }

       // Check connection
    if (!$conn ||mysqli_connect_errno()) {
        echo("Connection failed: " . mysqli_connect_error());
    }else{
       
        $sql = "SELECT * FROM student_reg WHERE reg_no = '$regNo'";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);

            while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $school=$row['school'];
                $course=$row['course'];
                $fname=$row['fname'];
                $oname=$row['other_names'];
            }
            $names=$fname." ".$oname;

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
                        <a href="#" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sem Registration</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./unitRegister.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Units Registration</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./examCard.php" class="nav-link">
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
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">SEMESTER REGISTRATION  </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="semRegister" method="POST" action="sem.php">
                <div class="card-body">
                <div class="form-group">
                    <label for="regNo">Registration Number</label>
                    <input type="text" class="form-control" name="regNo" id="regNo" value="<?php echo $regNo?>" placeholder="<?php echo $regNo?>"readonly required>
                  </div>


                  <div class="form-group">
                    <label for="school">School</label>
                    <input type="text" class="form-control" value="<?php echo  $school?>" name="school" id="school" placeholder="<?php echo  $school?>" readonly required>
                  </div>
                  <div class="form-group">
                    <label for="course">Course</label>
                    <input type="text" class="form-control" name="course" id="course" value="<?php echo  $course?>" placeholder="<?php echo  $course?>" readonly required>
                  </div>
             
                  <div class="form-group">
                    <select class="form-control mt-2" id="year" name="year"  required  >
                                        <option value="" disabled selected >Year</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                    </select>
                  </div>

                  
                  <div class="form-group">
                    <select class="form-control mt-2" id="sem" name="sem"  required  >
                                        <option value="" disabled selected >Semester</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    
                    </select>
                  </div>
    
                <!-- /.card-body -->

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
