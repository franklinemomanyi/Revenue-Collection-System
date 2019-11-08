<?php
  require('../../conn.php');
?>
<?php
  require('../../logic.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Business Actions</title>
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
            <h1>Business Actions</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Business Actions</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="example" class="table table-bordered table-hover">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          ID
                      </th>
                      <th style="width: 20%" class="text-center">
                          Name
                      </th>
                      <th style="width: 10%" class="text-center">
                          KRA
                      </th>
                      <th style="width: 20%" class="text-center">
                          Owner
                      </th>
                      <th class="text-center">
                          Type
                      </th>
                      <th style="width: 10%" class="text-center">
                          Progress
                      </th>
                      <th style="width: 8%" class="text-center">
                          Stage
                      </th>
                      <th style="width: 20%" class="text-center">
                          Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                $querry="SELECT * FROM BUSINESS";
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
                      <td class="text-center">
                          <?php echo $row['0']; ?>
                      </td>
                      <td class="text-center">
                          <a>
                              <?php echo $row['2']; ?>
                          </a>
                          <br/>
                          <small>
                              Created <?php echo $row['12']; ?>
                          </small>
                      </td>
                      <td class="text-center">
                        <a href="/Revenue/pages/forms/<?php echo $row['4']; ?>" target="_blank">
                          <?php echo $row['3']; ?>
                        </a>
                        <br/>
                          <small>
                              <a href="/Revenue/pages/forms/<?php echo $row['5']; ?>" target="_blank">Compliance</a>
                          </small>
                      </td>
                      <td class="text-center">
                          <?php echo $row1[0]; ?>
                      </td>
                      <td class="text-center">
                          <?php echo $row['6']; ?>
                      </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-volumenow="<?php echo $progress; ?>" aria-volumemin="0" aria-volumemax="100" style="width: <?php echo $progress; ?>%">
                              </div>
                          </div>
                          <small>
                              <?php echo $progress; ?>% Complete
                          </small>
                      </td>
                      <td class="project-state text-center">
                          <span class="badge badge-success"><?php echo $disp; ?></span>
                      </td>
                      <td class="project-actions text-center">
                          
                         
                          <a href="suspend.php?bid=<?php echo $bid; ?>"  target="targetframe" class="btn btn-danger btn-sm">
                              <i class="fas fa-times-circle">
                              </i>
                              Sus.
                          </a>

                          <a href="resume.php?bid=<?php echo $bid; ?>" target="targetframe" class="btn btn-primary btn-sm">
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


<iframe name="targetframe" style="visibility:hidden;position:absolute;height:0;" src=""></iframe>

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
