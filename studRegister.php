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
                <h3 class="card-title">Student Sign Up</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="signUp" method="POST" action="signup.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required>
                  </div>
                  <div class="form-group">
                    <label for="oname">Other Names</label>
                    <input type="text" class="form-control" name="oname" id="oname" placeholder="Other Names" required>
                  </div>
             
                  <select class="form-control mt-2" id="school" name="school"  required onchange="showSuggestion(this.value)" >
                                      <option value="" disabled selected >Select A School</option>
                                      <option value="School Of Computing And Informatics"  >School Of Computing And Informatics</option>
                                      <option value="School Of Medicine">School Of Medicine</option>
                                      <option value="School Of Arts And Design">School Of Arts And Design</option>
          
                  </select>

                  <select class="form-control mt-2" id="course" name="course"  required >
                      <option value="" disabled selected>Select A Course</option>
                                      <!-- <option value="BSc. Computer Science">BSc. Computer Science</option>
                                    <option value="BSc. Computer Technology">BSc. Computer Technology</option>
                                    <option value="BSc. Internet Technology">BSc. Internet Technology</option>
                                      <option value="BSc. Computer Informatics">BSc. Computer Informatics</option>
                                      <option value="BSc. Software Engineering">BSc. Software Engineering</option>
                                      <option value="BSc. Machine Computing">BSc. Machine Computing</option> -->
                      </select>
                 
                  <div class="form-group">
                    <label for="DOB">Date Of Birth</label>
                    <input type="date" class="form-control" placeholder="DOB" name="DOB"  required>
                  </div>
                  <div class="form-group">
                    <label for="regNo">Registration Number</label>
                    <input type="text" class="form-control" name="regNo" id="regNo" placeholder="Registration Number" required>
                  </div>
                 
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email"id="email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control"name="pass" id="pass" placeholder="Password">
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

<script>

function showSuggestion(str){
    console.log(str);

    if(str.length ==0){
        document.getElementById('course').innerHTML = '';
    }else{
        //AJAX REQ

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
              document.getElementById('course').innerHTML = this.responseText;

              // document.getElementById('course').innerHTML = `<option value="School Of Computing And Informatics"  >${this.responseText}</option>`;
              console.log(this.responseText);

            }
        }



        xmlhttp.open("GET","course.php?q="+str,true);
        xmlhttp.send();


    }

}

</script>

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
