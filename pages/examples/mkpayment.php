<?php
    $idnum=$_GET['idnum'];
    $tax=$_GET['tax'];
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
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

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
            <h1>Make Payment</h1>
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">M-Pesa</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Paypal</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                     
                      <!-- /.user-block -->
                      <p class="project-actions text-left">
                        <b>1.Go to your Safaricom App/M-PESA Menu</b><br>
                        <b>2.Click on Safaricom</b><br>
                        <b>3.Go to your M-Pesa</b><br>
                        <b>4.Go to Lipa na M-PESA</b><br>
                        <b>5.Go to Pay Bill</b><br>
                        <b>6.Enter the Business Number:<br>984825</b><br>
                        <b>7.Enter the Account Number:<br><?php echo $idnum; ?></b><br>
                        <b>8.Enter this exact Amount:<br><?php echo "Ksh.".$tax; ?></b><br>
                        <b>9.Enter your M-Pesa Pin and press OK</b><br><br>

                        <td class="project-actions text-center">
                          
                         
                          <a href="confirmpayment.php?account=<?php echo $idnum; ?> && amount=<?php echo $tax; ?>" class="btn btn-success btn-sm">
                              <i class="fas fa-check-circle">
                              </i>
                              Confirm Payment.
                          </a>
                      </td>
                      </p>
      
                    </div>
                    
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                   <div class="col-md-12">
                     
                      <!-- /.user-block -->
                      <p>
                        <script
                          src="https://www.paypal.com/sdk/js?client-id=Aa47CEnkcmBTodOOeYn4CWO84YePdwOE98MsoQgEhvrtg5NFAkdlN9R2TNbuYWcMSxJE57_OEB9i5VP2"> 
                          // Required. Replace SB_CLIENT_ID with your sandbox client ID.
                        </script>
                        <div id="paypal-button-container"></div>

                        <script>
                        paypal.Buttons({
                          createOrder: function(data, actions) {
                            return actions.order.create({
                              purchase_units: [{
                                amount: {
                                  value: '0.01'
                                }
                              }]
                            });
                          },
                          onApprove: function(data, actions) {
                            return actions.order.capture().then(function(details) {
                              alert('Transaction completed by ' + details.payer.name.given_name);
                              // Call your server to save the transaction
                              return fetch('/paypal-transaction-complete', {
                                method: 'post',
                                headers: {
                                  'content-type': 'application/json'
                                },
                                body: JSON.stringify({
                                  orderID: data.orderID
                                })
                              });
                            });
                          }
                        }).render('#paypal-button-container');
                      </script>
                      </p>
      
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                   <div class="post">
                     
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>
      
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
