<?php
    require('../../conn.php');
    $query1="SELECT * FROM REGION";
    $result1=mysqli_query($conn,$query1);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Staff Registration Form</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
 <?php
    require('../../nav.php');
   ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
    require('../../aside.php');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Staff Registration Form Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="staffregister.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Full Name" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" name="mail" id="mail" placeholder="Enter Email adress" required="">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Phone Number</label>
                    <input type="number" class="form-control" name="number" id="number" placeholder="Phone Number" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">ID Number</label>
                    <input type="number" class="form-control" name="idnum" id="idnum" placeholder="National ID Number" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" name="passwordc" id="passwordc" placeholder="Password" required="">
                  </div>
                  
                  <div class="form-group">
                  <label for="exampleInputEmail1">User Type</label>

                   <select name="type" id="type" class="form-control" required="">
                      <option value="0" selected disabled>Which Type of User?</option>
                      <option value="0" >Admin</option>
                      <option value="1" >Agent</option>
                   </select>

                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Region</label>
                    <select name="region" id="region" class="form-control" required="">
                      <option value="0" selected disabled>Which Tax Region?</option>
                      <?php while ($row1=mysqli_fetch_array($result1)):;?>
                      <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1].': '.$row1[2]; ?></option>
                      <?php endwhile;?>
                   </select>
                  </div>

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required="">
                    <label class="form-check-label" for="exampleCheck1">I understand the<a href="#"> Terms & Conditions</a></label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            

            <!-- Input addon -->
           
            <!-- /.card -->
            <!-- Horizontal Form -->
           

          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    require('../../footer.php');
  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- <script type="text/javascript">
  FUNCTION NAME IN OPTION HTML
  onchange="fun_showtextbox()"

  FUNCTION DEFINITION IN JS
  function fun_showtextbox()
  {
    var select_type=$('#type').val();
    if (select_type=='1') 
    {
      $('#area').show();
    }
    else
    {
      $('#area').hide();
    }
  }
</script> -->



<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
