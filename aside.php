 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/Revenue/index.php" class="brand-link">
      <img src="/Revenue/dist/img/AdminLTELogo.png" alt="Revenue" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Revenue Collection</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/Revenue/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/Revenue/index.php" class="d-block"><?php echo $_SESSION['name'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if ($_SESSION['domain'] == '0' OR $_SESSION['domain']=='2') { ?>
              <li class="nav-item">
                <a href="/Revenue/pages/forms/general.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Application</p>
                </a>
              </li>
              <?php } ?>

              <?php if ($_SESSION['domain'] == '0') { ?>
                  <li class="nav-item">
                    <a href="/Revenue/pages/examples/projects.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Business Actions</p>
                    </a>
                  </li>
              <?php } ?>



              <?php if ($_SESSION['domain'] == '0' OR $_SESSION['domain']=='1' OR $_SESSION['domain']=='2') { ?>
              <li class="nav-item">
                <a href="/Revenue/pages/tables/data.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Businesses</p>
                </a>
              </li>
              <?php } ?>


              <?php if ($_SESSION['domain'] == '0') { ?>
              <li class="nav-item">
                <a href="/Revenue/pages/forms/add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
              <?php } ?>

              <?php if ($_SESSION['domain'] == '1') { ?>
              <li class="nav-item">
                <a href="/Revenue/pages/forms/verification.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Verification</p>
                </a>
              </li>
              <?php } ?>
              
            </ul>
          </li>
          
          
          <?php if ($_SESSION['domain'] == '0') { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Statistics
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/Revenue/index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Graphs/Charts</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-bill-wave"></i>
              <p>
                Payments
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <!-- <ul class="nav nav-treeview"> -->
              <!-- <li class="nav-item"> -->
                <!-- <a href="/Revenue/pages/examples/mkpayment.php" class="nav-link"> -->
                  <!-- <i class="far fa-circle nav-icon"></i> -->
                  <!-- <p>Make Payments</p> -->
                <!-- </a> -->
              <!-- </li> -->
            <!-- </ul> -->

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/Revenue/pages/examples/invoice.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoices</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/Revenue/pages/examples/payments.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payments</p>
                </a>
              </li>
            </ul>
            
            <!-- <ul class="nav nav-treeview"> -->
              <!-- <li class="nav-item"> -->
                <!-- <a href="/Revenue/pages/examples/permit.php" class="nav-link"> -->
                  <!-- <i class="far fa-circle nav-icon"></i> -->
                  <!-- <p>Permits</p> -->
                <!-- </a> -->
              <!-- </li> -->
            <!-- </ul> -->
            
          </li>
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-map-marker-alt"></i>
              <p>
                Regions
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <?php if ($_SESSION['domain'] == '0') { ?>
              <li class="nav-item">
                <a href="/Revenue/pages/forms/addregion.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Region</p>
                </a>
              </li>
              <?php } ?>
            
              <li class="nav-item">
                <a href="/Revenue/pages/examples/viewregion.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Regions</p>
                </a>
              </li>
            </ul>
          </li>



          <?php if ($_SESSION['domain'] == '0') { ?>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Staff
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/Revenue/pages/forms/agentregister.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Revenue/pages/examples/agent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staff Actions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Revenue/pages/tables/agentview.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Staff</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>

        

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Mail
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/Revenue/pages/mailbox/compose.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
               <?php if ($_SESSION['domain'] == '0') { ?>
              <li class="nav-item">
                <a href="/Revenue/pages/mailbox/mailbox.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
            <?php }?>
              
            </ul>
            
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Account
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/Revenue/pages/examples/profile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>
  
              <li class="nav-item">
                <a href="/Revenue/pages/examples/logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Log Out</p>
                </a>
              </li>
            </ul>
          </li>
          
          
            
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
