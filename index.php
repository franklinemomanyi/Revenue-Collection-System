<?php
include('conn.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Revenue Collection System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../../dist/img/icon.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-footer-fixed layout-navbar-fixed sidebar-collapse">

<div class="wrapper">

  <!-- Navbar -->
  <?php 
 require('nav.php');
 ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php 
 require('aside.php');
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <?php if ($_SESSION['domain'] == '1' OR $_SESSION['domain'] == '2') { ?>
      <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Businesses</h3>
                
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                <table id="frank" class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Account</th>
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
                    <td><?php echo $row['13']; ?></td>
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
                </table>
              </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
           
            <!-- /.card -->

           
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>

      <?php }?>

      <?php if ($_SESSION['domain'] == '0') { ?>
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php 
                  $querry3='SELECT COUNT(STATUS) FROM BUSINESS WHERE STATUS=1';
                  $result3=mysqli_query($conn,$querry3);
                  $row2=mysqli_fetch_array($result3);
                  echo $row2[0];  
                  ?>
                    
                  </h3>

                <p>Approved Businesses</p>
              </div>
              <div class="icon">
                <i class="ion ion-briefcase"></i>
              </div>
              <a href="/Revenue/pages/examples/projects.php" class="small-box-footer">Approve <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php 
                  $querry3='SELECT SUM(AMOUNT) as total FROM TBLPAYMENTS';
                  $result3=mysqli_query($conn,$querry3);
                  $row2=mysqli_fetch_array($result3);
                  echo number_format($row2[0],2);  
                  ?>
                </h3>

                <p>Amount Collected(Ksh.)</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              <a href="/Revenue/pages/examples/payments.php" class="small-box-footer">Payments <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                <?php 
                $querry3='SELECT COUNT(STATUS) FROM BUSINESS WHERE STATUS=1';
                $querry4='SELECT COUNT(STATUS) FROM BUSINESS';
                $result3=mysqli_query($conn,$querry3);
                $result4=mysqli_query($conn,$querry4);
                $row2=mysqli_fetch_array($result3);
                $row3=mysqli_fetch_array($result4);
                $compliance=($row2[0]/$row3[0])*100;
                $compliance=number_format((float)$compliance,2,'.','');
                echo $compliance;  
                ?>


                <sup style="font-size: 20px">%</sup></h3>

                <p>Businesses Revenue Compliance </p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/Revenue/pages/tables/data.php" class="small-box-footer">Businesses <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                <?php
                $noncomp=100-$compliance;
                $noncomp=number_format((float)$noncomp,2,'.','');
                echo $noncomp;
                ?>

                <sup style="font-size: 20px">%</sup></h3>

                <p>Business Revenue Non Compliance</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a href="/Revenue/pages/tables/data.php" class="small-box-footer">Businesses <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
          <!-- Left col -->
          <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <!-- LINE CHART -->
                <h3 class="card-title">Businesses Applied</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="lineChart" style="height:250px; min-height:250px"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DONUT CHART -->

             <div class="card card-success">
              <div class="card-header">
                <!-- BAR CHART -->
                <h3 class="card-title">Approved Businesses</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="barChart" style="height:230px; min-height:230px"></canvas>
              </div>
              <!-- /.card-body -->
            </div>


            
            <!-- /.card -->

            <!-- PIE CHART -->
          
            <!-- /.card -->

          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
            <!-- LINE CHART -->
            <div class="card card-info">
              <div class="card-header">
                <!-- AREA CHART -->
                <h3 class="card-title">Amount Collected</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="height:250px; min-height:250px"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Compliance</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="pieChart" style="height:230px; min-height:230px"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- STACKED BAR CHART -->
            
            <!-- /.card -->

          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
              
                   

        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    <?php } ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  require('footer.php');
  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php 

$jan='SELECT COALESCE(SUM(AMOUNT),0) FROM TBLPAYMENTS WHERE MONTH(date_time)=1 AND YEAR(date_time)=2019';
$res1 =mysqli_query($conn,$jan);
$row1 =mysqli_fetch_array($res1);

$feb='SELECT COALESCE(SUM(AMOUNT),0) FROM TBLPAYMENTS WHERE MONTH(date_time)=2 AND YEAR(date_time)=2019';
$res2 =mysqli_query($conn,$feb);
$row2 =mysqli_fetch_array($res2);

$mar='SELECT COALESCE(SUM(AMOUNT),0) FROM TBLPAYMENTS WHERE MONTH(date_time)=3 AND YEAR(date_time)=2019';
$res3 =mysqli_query($conn,$mar);
$row3 =mysqli_fetch_array($res3);

$apr='SELECT COALESCE(SUM(AMOUNT),0) FROM TBLPAYMENTS WHERE MONTH(date_time)=5 AND YEAR(date_time)=2019';
$res4 =mysqli_query($conn,$apr);
$row4 =mysqli_fetch_array($res4);

$may='SELECT COALESCE(SUM(AMOUNT),0) FROM TBLPAYMENTS WHERE MONTH(date_time)=5 AND YEAR(date_time)=2019';
$res5 =mysqli_query($conn,$may);
$row5 =mysqli_fetch_array($res5);

$june='SELECT COALESCE(SUM(AMOUNT),0) FROM TBLPAYMENTS WHERE MONTH(date_time)=6 AND YEAR(date_time)=2019';
$res6 =mysqli_query($conn,$june);
$row6 =mysqli_fetch_array($res6);

$july='SELECT COALESCE(SUM(AMOUNT),0) FROM TBLPAYMENTS WHERE MONTH(date_time)=7 AND YEAR(date_time)=2019';
$res7 =mysqli_query($conn,$july);
$row7 =mysqli_fetch_array($res7);

$aug='SELECT COALESCE(SUM(AMOUNT),0) FROM TBLPAYMENTS WHERE MONTH(date_time)=8 AND YEAR(date_time)=2019';
$res8 =mysqli_query($conn,$aug);
$row8 =mysqli_fetch_array($res8);

$sep='SELECT COALESCE(SUM(AMOUNT),0) FROM TBLPAYMENTS WHERE MONTH(date_time)=09 AND YEAR(date_time)=2019';
$res9 =mysqli_query($conn,$sep);
$row9 =mysqli_fetch_array($res9);

$oct='SELECT COALESCE(SUM(AMOUNT),0) FROM TBLPAYMENTS WHERE MONTH(date_time)=10 AND YEAR(date_time)=2019';
$res10 =mysqli_query($conn,$oct);
$row10 =mysqli_fetch_array($res10);

$nov='SELECT COALESCE(SUM(AMOUNT),0) FROM TBLPAYMENTS WHERE MONTH(date_time)=10 AND YEAR(date_time)=2019';
$res11 =mysqli_query($conn,$nov);
$row11 =mysqli_fetch_array($res11);

$dec='SELECT COALESCE(SUM(AMOUNT),0) FROM TBLPAYMENTS WHERE MONTH(date_time)=10 AND YEAR(date_time)=2019';
$res12 =mysqli_query($conn,$dec);
$row12 =mysqli_fetch_array($res12);


// SELECT COUNT(STATUS) FROM BUSINESS WHERE STATUS=1

$bjan='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=1 AND YEAR(TIMESTAMP)=2019';
$bres1 =mysqli_query($conn,$bjan);
$brow1 =mysqli_fetch_array($bres1);

$bfeb='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=2 AND YEAR(TIMESTAMP)=2019';
$bres2 =mysqli_query($conn,$bfeb);
$brow2 =mysqli_fetch_array($bres2);

$bmar='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=3 AND YEAR(TIMESTAMP)=2019';
$bres3 =mysqli_query($conn,$bmar);
$brow3 =mysqli_fetch_array($bres3);

$bapr='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=4 AND YEAR(TIMESTAMP)=2019';
$bres4 =mysqli_query($conn,$bapr);
$brow4 =mysqli_fetch_array($bres4);

$bmay='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=5 AND YEAR(TIMESTAMP)=2019';
$bres5 =mysqli_query($conn,$bmay);
$brow5 =mysqli_fetch_array($bres5);

$bjune='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=6 AND YEAR(TIMESTAMP)=2019';
$bres6 =mysqli_query($conn,$bjune);
$brow6 =mysqli_fetch_array($bres6);

$bjuly='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=7 AND YEAR(TIMESTAMP)=2019';
$bres7 =mysqli_query($conn,$bjuly);
$brow7 =mysqli_fetch_array($bres7);

$baug='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=8 AND YEAR(TIMESTAMP)=2019';
$bres8 =mysqli_query($conn,$baug);
$brow8 =mysqli_fetch_array($bres8);

$bsep='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=9 AND YEAR(TIMESTAMP)=2019';
$bres9 =mysqli_query($conn,$bsep);
$brow9 =mysqli_fetch_array($bres9);

$boct='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=10 AND YEAR(TIMESTAMP)=2019';
$bres10 =mysqli_query($conn,$boct);
$brow10 =mysqli_fetch_array($bres10);

$bnov='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=11 AND YEAR(TIMESTAMP)=2019';
$bres11 =mysqli_query($conn,$bnov);
$brow11 =mysqli_fetch_array($bres11);

$bdec='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=12 AND YEAR(TIMESTAMP)=2019';
$bres12 =mysqli_query($conn,$bdec);
$brow12 =mysqli_fetch_array($bres12);





$bajan='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=1 AND STATUS=1';
$bares1 =mysqli_query($conn,$bajan);
$barow1 =mysqli_fetch_array($bares1);

$bafeb='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=2 AND STATUS=1';
$bares2 =mysqli_query($conn,$bafeb);
$barow2 =mysqli_fetch_array($bares2);

$bamar='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=3 AND STATUS=1';
$bares3 =mysqli_query($conn,$bamar);
$barow3 =mysqli_fetch_array($bares3);

$baapr='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=4 AND STATUS=1';
$bares4 =mysqli_query($conn,$baapr);
$barow4 =mysqli_fetch_array($bares4);

$bamay='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=5 AND STATUS=1';
$bares5 =mysqli_query($conn,$bamay);
$barow5 =mysqli_fetch_array($bares5);

$bajune='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=6 AND STATUS=1';
$bares6 =mysqli_query($conn,$bajune);
$barow6 =mysqli_fetch_array($bares6);

$bajuly='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=7 AND STATUS=1';
$bares7 =mysqli_query($conn,$bajuly);
$barow7 =mysqli_fetch_array($bares7);

$baaug='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=8 AND STATUS=1';
$bares8 =mysqli_query($conn,$baaug);
$barow8 =mysqli_fetch_array($bares8);

$basep='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=9 AND STATUS=1';
$bares9 =mysqli_query($conn,$basep);
$barow9 =mysqli_fetch_array($bares9);

$baoct='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=10 AND STATUS=1';
$bares10 =mysqli_query($conn,$baoct);
$barow10 =mysqli_fetch_array($bares10);

$banov='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=11 AND STATUS=1';
$bares11 =mysqli_query($conn,$banov);
$barow11 =mysqli_fetch_array($bares11);

$badec='SELECT COUNT(STATUS) FROM BUSINESS WHERE MONTH(TIMESTAMP)=12 AND STATUS=1';
$bares12 =mysqli_query($conn,$badec);
$barow12 =mysqli_fetch_array($bares12);

?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>




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
    var table = $('#frank').DataTable( {
        lengthChange: false,
        paging: true,
        ordering: true,
        searching: false,
        info: false,
        autoWidth: false,
        scrollX: false,
        dom:'Bfrtip',
        buttons: [ ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>
<!-- Datatables -->





<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['Jan','Feb','Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept','Oct','Nov','Dec'],
      datasets: [
        {
          label               : 'Amount Collected',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $row1[0];?>, <?php echo $row2[0];?>, <?php echo $row3[0];?>, <?php echo $row4[0];?>, <?php echo $row5[0];?>, <?php echo $row6[0];?>, <?php echo $row7[0];?>, <?php echo $row8[0];?>,<?php echo $row9[0];?>, <?php echo $row10[0];?>, <?php echo $row11[0];?>, <?php echo $row12[0];?>]
        },
        {
          label               : 'Business Revenue Non Compliance',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : []
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas, { 
      type: 'line',
      data: areaChartData, 
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
    var lineChartData = {
      labels  : ['Jan','Feb','Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept','Oct','Nov','Dec'],
      datasets: [
        {
          label               : 'Businesses Applied',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $brow1[0];?>, <?php echo $brow2[0];?>, <?php echo $brow3[0];?>, <?php echo $brow4[0];?>, <?php echo $brow5[0];?>, <?php echo $brow6[0];?>, <?php echo $brow7[0];?>, <?php echo $brow8[0];?>, <?php echo $brow9[0];?>, <?php echo $brow10[0];?>, <?php echo $brow11[0];?>, <?php echo $brow12[0];?>]
        },
        {
          label               : 'Business Revenue Non Compliance',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : []
        },
      ]
    }
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, { 
      type: 'line',
      data: lineChartData, 
      options: lineChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
   

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: [
          'Non Compliance', 
          'Compliance',
         
      ],
      datasets: [
        {
          data: [<?php echo $noncomp;?>,<?php echo $compliance;?>],
          backgroundColor : ['#f56954', '#00a65a'],
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = {
      labels  : ['Jan','Feb','Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept','Oct','Nov','Dec'],
      datasets: [
        {
          label               : 'Approved Businesses',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $barow1[0];?>, <?php echo $barow2[0];?>, <?php echo $barow3[0];?>, <?php echo $barow4[0];?>, <?php echo $barow5[0];?>, <?php echo $barow6[0];?>, <?php echo $barow7[0];?>, <?php echo $barow8[0];?>, <?php echo $barow9[0];?>, <?php echo $barow10[0];?>, <?php echo $barow11[0];?>, <?php echo $barow12[0];?>]
        },
        
      ]
    }

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = {
      labels  : ['Jan','Feb','Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept','Oct','Nov','Dec'],
      datasets: [
        {
          label               : 'Approved Businesses',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [30, 48, 40, 19, 86, 27, 60, 56, 70, 84, 30, 20]
        },
        {
          label               : 'Business Revenue Non Compliance',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40,10, 80, 30, 60, 5]
        },
      ]
    }

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>

<?php require 'web_accesibility.php';?>
</body>
</html>
