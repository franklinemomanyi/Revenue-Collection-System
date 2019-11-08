<?php
    require('../../conn.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Types</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="../../dist/img/icon.png" type="image/x-icon">


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
                  <li class="nav-item"><a class="nav-link active" href="#busstype" data-toggle="tab">Buss.Type</a></li>
                  <li class="nav-item"><a class="nav-link" href="#area" data-toggle="tab">Area</a></li>
                  <li class="nav-item"><a class="nav-link" href="#emp" data-toggle="tab">No.of.Emp</a></li>

                  <li class="nav-item"><a class="nav-link" href="#vbusstype" data-toggle="tab">View.Type</a></li>
                  <li class="nav-item"><a class="nav-link" href="#varea" data-toggle="tab">Areas</a></li>
                  <li class="nav-item"><a class="nav-link" href="#vemp" data-toggle="tab">View.Emp</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="busstype">
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
                  <div class="tab-pane" id="area">
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

                  <div class="tab-pane" id="emp">
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
                  <div class="tab-pane" id="vbusstype">
                    <div class="table-responsive">
                            <table id="example" class="table table-bordered table-hover">
                              <thead>
                              <tr>
                                <th>Type ID</th>
                                <th>Type Name</th>
                                <th>Rates(Ksh)</th>
                               
                              </tr>
                              </thead>
                              <tbody>

                                <?php 
                                $querry="SELECT * FROM BUSSTYPE";
                                $result=mysqli_query($conn,$querry);
                                while($row=mysqli_fetch_array($result))
                                {
                                

                                ?>


                              <tr>
                                <td><?php echo $row[0]; ?></td>
                                <td><?php echo $row[1]; ?>
                                </td>
                                <td><?php echo number_format($row[2],2); ?></td>
                                
                              </tr>

                              <?php
                              }
                              ?>
                             
                              </tbody>
                              <tfoot>
                              <tr>
                                <th>Type ID</th>
                                <th>Type Name</th>
                                <th>Rates</th>
                               
                              </tr>
                              </tfoot>
                            </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="varea">
                     <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-hover">
                              <thead>
                              <tr>
                                <th>Area ID</th>
                                <th>Area Name</th>
                                <th>Rates(Ksh)</th>
                               
                              </tr>
                              </thead>
                              <tbody>

                                <?php 
                                $querry="SELECT * FROM AREA";
                                $result=mysqli_query($conn,$querry);
                                while($row=mysqli_fetch_array($result))
                                {
                                

                                ?>


                              <tr>
                                <td><?php echo $row[0]; ?></td>
                                <td><?php echo $row[1]; ?>
                                </td>
                                <td><?php echo number_format($row[2],2); ?></td>
                                
                              </tr>

                              <?php
                              }
                              ?>
                             
                              </tbody>
                              <tfoot>
                              <tr>
                                <th>Area ID</th>
                                <th>Area Name</th>
                                <th>Rates</th>
                               
                              </tr>
                              </tfoot>
                            </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="vemp">
                     <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                              <thead>
                              <tr>
                                <th>Emp ID</th>
                                <th>Emp Name</th>
                                <th>Rates(Ksh)</th>
                               
                              </tr>
                              </thead>
                              <tbody>

                                <?php 
                                $querry="SELECT * FROM NOEMP";
                                $result=mysqli_query($conn,$querry);
                                while($row=mysqli_fetch_array($result))
                                {
                                

                                ?>


                              <tr>
                                <td><?php echo $row[0]; ?></td>
                                <td><?php echo $row[1]; ?>
                                </td>
                                <td><?php echo number_format($row[2],2); ?></td>
                                
                              </tr>

                              <?php
                              }
                              ?>
                             
                              </tbody>
                              <tfoot>
                              <tr>
                                <th>Emp ID</th>
                                <th>Emp Name</th>
                                <th>Rates</th>
                               
                              </tr>
                              </tfoot>
                            </table>
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




<!-- DataTables -->
<script type="text/css" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"></script>
<script type="text/css" src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
<script type="text/css" src="https://cdn.datatables.net/buttons/1.6.0/css/buttons.bootstrap4.min.css"></script>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js" ></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.bootstrap4.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>

  

<!-- page script -->
<script>
  $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        paging: true,
        ordering: true,
        searching: false,
        info: true,
        autoWidth: false,
        scrollX: false,
        dom:'Bfrtip',
        buttons: [ 'print' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>
<script>
  $(document).ready(function() {
    var table = $('#example1').DataTable( {
        lengthChange: false,
        paging: true,
        ordering: true,
        searching: false,
        info: true,
        autoWidth: false,
        scrollX: false,
        dom:'Bfrtip',
        buttons: [ 'print' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example1_wrapper .col-md-6:eq(0)' );
} );
</script>
<script>
  $(document).ready(function() {
    var table = $('#example2').DataTable( {
        lengthChange: false,
        paging: true,
        ordering: true,
        searching: false,
        info: true,
        autoWidth: false,
        scrollX: false,
        dom:'Bfrtip',
        buttons: [ 'print' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example3_wrapper .col-md-6:eq(0)' );
} );
</script>

</body>
</html>
