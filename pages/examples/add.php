<?php
    require('../../conn.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Make Payment</title>
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
            <h1>Add Types</h1>
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
           <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Business Type</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Area</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">No. of Employees</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="card card-primary">
                     
                      <!-- /.user-block -->
                    <form role="form" action="addbusstype.php" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Business Type</label>
                          <input type="text" class="form-control" name="one" id="one" placeholder="Business Type">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Rates</label>
                          <input type="text" class="form-control" name="two" id="two" placeholder="Rates for Buss. Type">
                        </div>

                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1" required="">
                          <label class="form-check-label" for="exampleCheck1">I understand the<a href="#"> Terms & Conditions</a></label>
                        </div>
                      </div>
                <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" name="busstype" id="busstype" class="btn btn-primary">Add</button>
                      </div>
                    </form>
      
                    </div>
                    
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                   <div class="card card-primary">
                     
                      <!-- /.user-block -->
                    <form role="form" action="addbusstype.php" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Area</label>
                          <input type="text" class="form-control" name="one" id="one" placeholder="Area in Meter Square">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Rates</label>
                          <input type="text" class="form-control" name="two" id="two" placeholder="Rates">
                        </div>


                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1" required="">
                          <label class="form-check-label" for="exampleCheck1">I understand the<a href="#"> Terms & Conditions</a></label>
                        </div>
                      </div>
                <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" name="area" id="area" class="btn btn-primary">Add</button>
                      </div>
                    </form>
      
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                  <div class="card card-primary">
                     
                      <!-- /.user-block -->
                    <form role="form" action="addbusstype.php" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Employees</label>
                          <input type="text" class="form-control" name="one" id="one" placeholder="Number of Employees">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Rates</label>
                          <input type="text" class="form-control" name="two" id="two" placeholder="Rates">
                        </div>


                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1" required="">
                          <label class="form-check-label" for="exampleCheck1">I understand the<a href="#"> Terms & Conditions</a></label>
                        </div>
                      </div>
                <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" name="emp" id="emp" class="btn btn-primary">Add</button>
                      </div>
                    </form>
      
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
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
</body>
</html>
