<?php
    require('../../conn.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Payments</title>
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
            <h1>Payments</h1>
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
              <div class="table-responsive">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Time</th>
                  <th>TransactionID</th>
                  <th>Account</th>
                  <th>Amount</th>
                  <th>Phone</th>
                  <th>FirstName</th>
                  <th>MiddleName</th>
                  <th>LastName</th>
                  <th>Receipt</th>
                </tr>
                </thead>
                <tbody>

                  <?php 


                   if (($_SESSION['domain'] == '0') OR ($_SESSION['domain'] == '1')) {
                    $querry="SELECT * FROM TBLPAYMENTS";
                  }elseif (($_SESSION['domain'] == '2')) {
                    $like=$_SESSION['idnum'];
                    $querry="SELECT * FROM TBLPAYMENTS WHERE ACCOUNT LIKE '%$like%' ";
                  }else{
                    echo "Invalid";
                  }


                  //$querry="SELECT * FROM tblpayments";
                  $result=mysqli_query($conn,$querry);
                  while($row=mysqli_fetch_array($result))
                  {
                  $id=$row['1'];

                  $querry2="SELECT BUSSID FROM BUSINESS WHERE USERID='$id'";
                  $result3=mysqli_query($conn,$querry2);
                  $row2=mysqli_fetch_array($result3);

                  
                  $bid=$row['3'];

                  $querry1="SELECT NAME FROM USER WHERE USERID='$id'";
                  $result2=mysqli_query($conn,$querry1);
                  $row1=mysqli_fetch_array($result2);
                  $domain=$row['5'];
                  //$progress=($stage/4)*100;

                  ?>

                <tr>
                  <td><?php echo $row[0]; ?></td>
                  <td><?php echo $row[1]; ?>
                  </td>
                  <td><?php echo $row[2]; ?></td>
                  <td><?php echo $row[3]; ?></td>
                  <td><?php echo $row[4]; ?></td>
                  <td><?php echo $row[5]; ?></td>
                  <td><?php echo $row[6]; ?></td>
                  <td><?php echo $row[7]; ?></td>
                  <td><?php echo $row[8]; ?></td>
                  <td class="project-actions text-center">
                          
                         
                          <a href="inv.php?bid=<?php echo $bid; ?>&tid=<?php echo $row[2]; ?>" class="btn btn-success btn-sm">
                              <i class="fas fa-check-circle">
                              </i>
                              Rcpt.
                          </a>

                          
                      </td>
                </tr>
                <?php
                }
                ?>
               
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Time</th>
                  <th>TransactionID</th>
                  <th>Account</th>
                  <th>Amount</th>
                  <th>Phone</th>
                  <th>FirstName</th>
                  <th>MiddleName</th>
                  <th>LastName</th>
                  <th>Receipt</th>
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



<!-- DataTables -->
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
<!-- DataTables -->
</body>
</html>
