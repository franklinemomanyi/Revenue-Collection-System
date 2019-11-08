<?php
    require('../../conn.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DataTables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
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
            <h1>Businesses in Uasin Gishu County</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive ">
              <table id="example2" class="table  table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Business Type</th>
                  <th>Owner</th>
                  <th>KRA Pin</th>
                  <th>Status</th>
                  <th>Progress</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  if (($_SESSION['domain'] == '0') OR ($_SESSION['domain'] == '1')) {
                    $querry="SELECT * FROM BUSINESS";
                  }elseif (($_SESSION['domain'] == '2')) {
                    $like=$_SESSION['idnum'];
                    $querry="SELECT * FROM BUSINESS WHERE ACCOUNT LIKE '%$like%' ";
                  }else{
                    echo "Invalid";
                  }
                  
                  $result=mysqli_query($conn,$querry);
                  //$row=mysqli_fetch_array($result);
                  while($row=mysqli_fetch_array($result))
                  {
                    $id=$row['1'];
                    $bid=$row['0'];
                    $querry1="SELECT NAME FROM USER WHERE USERID='$id'";
                    $result2=mysqli_query($conn,$querry1);
                    $row1=mysqli_fetch_array($result2);
                    $stage=$row['7'];
                    $progress=($stage/4)*100;

                    if ($stage=='1') {
                      $disp="Application";
                    }elseif ($stage=='2') {
                      $disp="Verification";
                    }elseif ($stage=='3') {
                      $disp="Validation";
                    }elseif ($stage=='4') {
                      $disp="Payment";
                    }elseif ($stage=='0') {
                      # code...
                      $disp="Suspended";
                    }else{
                      $disp="Unknown";
                    }


                    ?>
                <tr>
                  <td><?php echo $row['0']; ?></td>
                  <td><?php echo $row['2']; ?>
                  </td>
                  <td><?php echo $row['6']; ?></td>
                  <td><?php echo $row1['0']; ?></td>
                  <td><?php echo $row['3']; ?></td>
                  <td><?php echo $disp; ?></td>
                  <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-volumenow="<?php echo $progress; ?>" aria-volumemin="0" aria-volumemax="100" style="width: <?php echo $progress; ?>%">
                              </div>
                          </div>
                          <small>
                              <?php echo $progress; ?>% Complete
                          </small>
                  </td>

                </tr>
                <?php
                }
                ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Business Type</th>
                  <th>Owner</th>
                  <th>KRA Pin</th>
                  <th>Stage</th>
                  <th>Progress</th>
                </tr>
                </tfoot>
              </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->


<!-- Datatables -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
                    dom:'Bfrtip',
                    buttons:[
                         'print'
                    ]
    });
  });
</script>
<!-- Datatables -->
</body>
</html>
