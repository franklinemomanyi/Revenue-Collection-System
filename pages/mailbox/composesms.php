<?php
    require('../../conn.php');
    $query="SELECT * FROM USER";
    $result=mysqli_query($conn,$query);
  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed sidebar-collapse">  
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
            <h1>Compose SMS</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Compose SMS</h3>
              </div>
              <!-- /.card-header -->
              <form action="sendsms.php" method="post" enctype="multipart/form-data" class="card-body">
                

                <div class="form-group">
                  <label for="exampleInputEmail1">Recepient</label>

                   <select name="pnumber" id="pnumber" class="form-control" required="">
                      <option value="0" selected disabled>Recepient of the message</option>
                      <?php while ($row=mysqli_fetch_array($result)):;?>
                      <option value="<?php echo $row[2]; ?>"><?php echo $row[1]; ?></option>
                      <?php endwhile;?>
                   </select>

                </div>
                
                <div class="form-group">
                    <textarea rows="10" name="message" id="compose-textarea" class="form-control" >
                      
                      
                     
                    </textarea>
                </div>
               

                <div class="card-footer">
                <div class="float-right">
                  
                  <button type="submit" name="submit" id="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                </div>
                <a type="reset" href="compose.php" class="btn btn-default"><i class="fas fa-times"></i> Discard</a>
                </div>

              </form>
              <!-- /.card-body -->
              
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
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
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>
</body>
</html>
