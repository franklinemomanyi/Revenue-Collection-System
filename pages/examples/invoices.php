<?php
    $bid=$_GET['bid'];
    $name=$_GET['name'];
    $account=$_GET['account'];
    require('../../conn.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Invoice</title>
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
            <h1>Invoice</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content" id="printableArea">
      <?php
        $querry="SELECT * FROM BUSINESS WHERE BUSSID='$bid'";
        $result=mysqli_query($conn,$querry);
        while($row=mysqli_fetch_array($result))
        {
        $id=$row['1'];
        $bid=$row['0'];
        $idnum=$row['13'];
        $tax=$row['14'];
        $xav=str_split($idnum,8);
        //$bussno=$row['']

        $querry1="SELECT * FROM USER WHERE IDNUM='$xav[0]'";
        $result2=mysqli_query($conn,$querry1);
        $row1=mysqli_fetch_array($result2);

        //$querry3="SELECT BUSSID FROM BUSINESS WHERE ACCOUNT='$idnum'";
        //$result4=mysqli_query($conn,$querry3);
        //$row3=mysqli_fetch_array($result4);

        $querry2="SELECT NAME,ACCOUNT,BUSSID FROM BUSINESS WHERE ACCOUNT='$idnum'";
        $result3=mysqli_query($conn,$querry2);
        $row2=mysqli_fetch_array($result3);

        $domain=$row['5'];

      ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h3>
                    INVOICE.
                    <small class="float-right">Print date: <?php date_default_timezone_set('Africa/Nairobi'); echo date("d/m/Y H:i"); ?></small>
                  </h3>
                </div>
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Uasin Gishu County.
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-3 invoice-col">
                  From,
                  <address>
                    <strong>Uasin Gishu County.</strong><br>
                    1100 Oginga Odinga Street<br>
                    Eldoret, CA 94107<br>
                    Phone: (254) 17-656880<br>
                    Email: info@uasingishucounty.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 invoice-col">
                  To,
                  <address>
                    <strong><?php echo $row2['0']; ?></strong><br>
                    
                    Phone:<br><strong> <?php echo '0'.$row1['2']; ?></strong><br>
                    Email:<br><strong> <?php echo $row1['4']; ?></strong>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 invoice-col">
                  Invoice:<b><br> #<?php echo date("dmY").$row1['3'].$row1['0'] ?><br></b>
                  Date:<b><br> <?php echo date("d/m/Y") ?><br></b>
                  Account:<b><br> <?php echo $row2['1']; ?></b>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 invoice-col">
                  <?php 

                    include('phpqrcode/qrlib.php'); 
                    $text=$row2['0'];
                    $folder="images/";
                    $file_name="qr.png";
                    $file_name=$folder.$file_name;
                    $ecc='L';
                    $pixel_size=5;
                    $frame_size=1;
                    QRcode::png($text,$file_name,$ecc,$pixel_size,$frame_size);
                    echo"<img src='images/qr.png'>";
   
                  ?>
                </div>

              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                     
                    <tr>
                      <th>Business ID</th>
                      <th>Business Name</th>
                      <th>KRA Pin</th>
                      <th>BussType</th>
                      <th>Account</th>
                      <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td><?php echo $row['0']; ?></td>
                      <td><?php echo $row['2']; ?></td>
                      <td><?php echo $row['3']; ?></td>
                      <td><?php echo $row['6']; ?></td>
                      <td><?php echo $row['13']; ?></td>
                      <td>Ksh.<?php echo $row['14']; ?></td>
                    </tr>
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="../../dist/img/credit/mpesa.jpeg" alt="Visa">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    This is an Electronically generated Receipt, any alteration will lead to serious Legal Actions.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Sub Total:</th>
                        <td>Ksh.<?php echo $row['14']; ?></td>
                      </tr>
                      <tr>
                        <th>Penalty</th>
                        <td>Ksh.0.00</td>
                      </tr>
            
                      <tr>
                        <th>Total:</th>
                        <td>Ksh.<?php echo $row['14']; ?></td>
                      </tr>
                      
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              

              <div class="row no-print">
                <div class="col-12">
                  <button onclick="printDiv('printableArea')" type="button" class="btn btn-primary float-left"><i class="fas fa-print"></i> Print
                  </button>

                  <a href="/Revenue/pages/examples/mkpayment.php?idnum=<?php echo $idnum; ?> && tax=<?php echo $tax; ?>" type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </a>


                 
                </div>
                  <?php
                  }
                  ?>
              </div>


            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
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
<script type="text/javascript">
  function printDiv(printableArea){
    var printContents = document.getElementById(printableArea).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
</script>

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
