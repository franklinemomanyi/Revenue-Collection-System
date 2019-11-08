<?php
  require('../../conn.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Staff</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
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
            <h1>Staff</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Action on Staff</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
          <table id="example" class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%" class="text-center">
                          ID
                      </th>
                      <th style="width: 20%" class="text-center">
                          Name
                      </th>
                      <th class="text-center">
                          NationalID
                      </th>
                      <th style="width: 15%" class="text-center">
                          Phone
                      </th>
                      <th class="text-center">
                          Email
                      </th>
                      <th style="width: 8%" class="text-center">
                          Job
                      </th>
                      <th style="width: 15%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%" class="text-center">
                      	  Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                
              	<?php 
                $querry="SELECT * FROM USER WHERE DOMAIN BETWEEN 0 AND 1";
                $result=mysqli_query($conn,$querry);
                //$row=mysqli_fetch_array($result);
                while($row=mysqli_fetch_array($result))
                {
                  $id=$row['1'];
                  $bid=$row['0'];
                  $querry1="SELECT NAME FROM USER WHERE USERID='$id'";
                  $result2=mysqli_query($conn,$querry1);
                  $row1=mysqli_fetch_array($result2);
                  $domain=$row['6'];
                  //$progress=($stage/4)*100;

                  if ($domain=='0') {
                    $disp="Administrator";
                  }elseif ($domain=='1') {
                    $disp="Rev.Agent";
                  }elseif ($domain=='2') {
                    $disp="Businessman";
                  }else{
                    $disp="Unknown";
                  }

                  $work=$row['7'];

                  if ($work=='0') {
                  	# code...
                  	$frank="Active";
                  }elseif ($work=='1') {
                  	# code...
                  	$frank="Suspended";
                  }
                  ?>

                  <tr>
                      <td class="text-center">
                          <?php echo $row[0]; ?>
                      </td>
                      <td class="text-center">
                      	  <?php echo $row[1]; ?>
                      </td>
                      <td class="text-center">
                          <?php echo $row[3]; ?>
                      </td>
                      <td class="text-center">
                          <?php echo $row[2]; ?>
                      </td>
                      <td class="text-center">
                          <?php echo $row[4]; ?>
                      </td>
                      <td class="text-center">
                          <?php echo $disp; ?>
                      </td>
                      <td class="text-center">
                          <?php echo $frank; ?>
                      </td>
                      <td class="project-actions text-center">
                      	  <a href="sus.php?bid=<?php echo $bid; ?>"  target="targetframe" class="btn btn-danger btn-sm">
                              <i class="fas fa-times-circle">
                              </i>
                              Sus.
                          </a>
                          <a href="res.php?bid=<?php echo $bid; ?>" target="targetframe" class="btn btn-primary btn-sm">
                              <i class="fas fa-thumbs-up">
                              </i>
                              Res.
                          </a>
                          
                      </td>
                  </tr>
                  <?php
                }
                ?>    
              </tbody>
          </table>
        </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

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

<iframe name="targetframe" style="visibility:hidden;position:absolute;height:0;" src="">
</iframe>


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
        buttons: [ ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>
</body>
</html>
