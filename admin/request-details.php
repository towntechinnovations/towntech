<?php session_start();
//DB conncetion
include_once('includes/config.php');
error_reporting(0);

//validating Session
if (strlen($_SESSION['aid'] == 0)) {
  header('location:logout.php');
} else {

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <title> Emergency Reporting Details</title>
    <?php include_once('includes/header.php') ?>

  </head>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Preloader -->
      <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60" />
        </div> -->

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" />
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>

          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle" />
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Brad Diesel
                      <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted">
                      <i class="far fa-clock mr-1"></i> 4 Hours Ago
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3" />
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      John Pierce
                      <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted">
                      <i class="far fa-clock mr-1"></i> 4 Hours Ago
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3" />
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nora Silvester
                      <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted">
                      <i class="far fa-clock mr-1"></i> 4 Hours Ago
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> -->
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
            <!-- Main Sidebar Container -->
            <?php if ($_SESSION['aid']) : ?>
                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <!-- Sidebar -->
                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <?php include_once('includes/sidebarusers.php') ?>
                        </div>

                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                                <li class="nav-item">
                                    <a href="dashboard.php" class="nav-link">
                                        <i class="fas fa-fw fa-tachometer-alt"></i>
                                        <p>Dashboard</p>
                                    </a>
                                </li>

                                <li class="nav-item menu-close">
                                    <a href="#" class="nav-link ">
                                        <i class="fas fa-fw fa-users"></i>
                                        <p>
                                            Emergency
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">

                                        <li class="nav-item menu-close">
                                            <a href="#" class="nav-link ">
                                                <i class="fas fa-fw fa-file"></i>
                                                <p>
                                                    Emergency Teams
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="add-team.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Add</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="manage-teams.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Manage</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item menu-close">
                                            <a href="#" class="nav-link ">
                                                <i class="fas fa-fw fa-exclamation-circle"></i>
                                                <p>
                                                    Emergency Alerts
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="new-requests.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>New Requests</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="assigned-requests.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Assigned Requests</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="team-ontheway-requests.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Team On the Way Report</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="workin-progress-requests.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Relief Work in Progress</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="completed-requests.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Completed Requests</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="all-requests.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>All Requests</p>
                                                    </a>
                                                </li>

                                            </ul>
                                        </li>

                                        <li class="nav-item menu-close">
                                            <a href="#" class="nav-link ">
                                                <i class="fas fa-fw fa-file"></i>
                                                <p>
                                                    Reports
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="bwdates-report-ds.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>B/w Dates</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="search-report.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Search</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item menu-close">
                                    <a href="#" class="nav-link ">
                                        <i class="fas fa-fw fa-users"></i>
                                        <p>
                                            Solid Waste
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">

                                        <li class="nav-item menu-close">
                                            <a href="#" class="nav-link ">
                                                <i class="fas fa-fw fa-file"></i>
                                                <p>
                                                    Emergency Teams
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="add-team.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Add</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="manage-teams.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Manage</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item menu-close">
                                            <a href="#" class="nav-link ">
                                                <i class="fas fa-fw fa-exclamation-circle"></i>
                                                <p>
                                                    Emergency Alerts
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="new-requests.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>New Requests</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="assigned-requests.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Assigned Requests</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="team-ontheway-requests.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Team On the Way Report</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="workin-progress-requests.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Relief Work in Progress</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="completed-requests.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Completed Requests</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="all-requests.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>All Requests</p>
                                                    </a>
                                                </li>

                                            </ul>
                                        </li>

                                        <li class="nav-item menu-close">
                                            <a href="#" class="nav-link ">
                                                <i class="fas fa-fw fa-file"></i>
                                                <p>
                                                    Reports
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="bwdates-report-ds.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>B/w Dates</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="search-report.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Search</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="manage-site.php">
                                                <i class="fas fa-fw fa-cog"></i>
                                                <p>Manage Website</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <div class="user-panel pb-3 mb-3 d-flex">
                                </div>


                                <li class="nav-item">
                                    <a class="nav-link" href="manage-site.php">
                                        <i class="fas fa-fw fa-cog"></i>
                                        <p>Manage Website</p>
                                    </a>
                                </li>

                                <li class="nav-item menu-close">
                                    <a href="#" class="nav-link ">
                                        <i class="fas fa-fw fa-file"></i>
                                        <p>
                                            My Profile
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="profile.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Profile</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="change-password.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Change Password</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                <a class="dropdown-item nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </li>


                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                </aside>
            <?php endif; ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Emergency Reporting Details</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Emergency Reporting Details</li>
                </ol>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="container-fluid">

              <!-- Content Row -->
              <!-- DataTales Example -->
              <!-- Page Heading -->
              <form method="post" name="adminprofile">



                <div class="row">

                  <div class="col-lg-6">

                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Personal Information (Reported by)</h6>
                      </div>
                      <div class="card-body">

                        <?php $rid = $_GET['requestid'];
                        $query = mysqli_query($con, "select * from tblemergencyreport where id='$rid'");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                          <table class="table table-bordered" width="100%" cellspacing="0">
                            <tr>
                              <th>Full Name</th>
                              <td><?php echo $row['fullName']; ?></td>
                            </tr>

                            <tr>
                              <th>Mobile Number</th>
                              <td><?php echo $row['mobileNumber']; ?></td>
                            </tr>

                            <tr>
                              <th>Location</th>
                              <td><?php echo $row['location']; ?></td>
                            </tr>


                            <tr>
                              <th>Message</th>
                              <td><?php echo $row['message']; ?></td>
                            </tr>


                            <tr>
                              <th>Reporting Time</th>
                              <td><?php echo $row['postingDate']; ?></td>
                            </tr>



                            </tr>
                          </table>
                          <?php if ($row['assignTo'] == '') :
                          ?>
                            <div class="form-group">
                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#assignto">Assign To</button>
                            </div>
                            <?php else :
                            $rstatus = $row['status'];
                            if ($rstatus == 'Assigned' || $rstatus == 'Team On the Way' || $rstatus == 'Fire Relief Work in Progress') : ?>
                              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#takeaction">Take Action</button>
                          <?php
                            endif;
                          endif; ?>
                        <?php } ?>


                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6">

                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Assigned Details</h6>
                      </div>
                      <div class="card-body">
                        <?php $query = mysqli_query($con, "select * from tblemergencyreport 
                        join tblteams on tblteams.id=tblemergencyreport.assignTo
                            where tblemergencyreport.id='$rid'");
                        $count = mysqli_num_rows($query);
                        if ($count > 0) {
                          while ($row = mysqli_fetch_array($query)) { ?>


                            <table class="table table-bordered" width="100%" cellspacing="0">
                              <tr>
                                <th>Team Name</th>
                                <td><?php echo $row['teamName']; ?></td>
                              </tr>

                              <tr>
                                <th>Team Leader Name</th>
                                <td><?php echo $row['teamLeaderName']; ?></td>
                              </tr>


                              <tr>
                                <th>TL Mobile No.</th>
                                <td><?php echo $row['teamLeadMobno']; ?></td>
                              </tr>

                              <tr>
                                <th>Team Members</th>
                                <td><?php echo $row['teamMembers']; ?></td>
                              </tr>
                              <tr>
                                <th>Assigned Time</th>
                                <td><?php echo $row['assignTme']; ?></td>
                              </tr>

                            </table>
                          <?php }
                        } else { ?>
                          <h4 style="color:red;" align="center">Not Assigned Yet</h4>
                        <?php } ?>


                      </div>
                    </div>

                  </div>
                </div>

                <!-- Test Tracking History --->
                <?php
                $ret = mysqli_query($con, "select * from tblemergencyrequesthistory where requestId='$rid'");
                $num = mysqli_num_rows($ret);
                ?>

                <div class="row">
                  <div class="col-lg-12">

                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary" align="center">Request Track History</h6>
                      </div>
                      <div class="card-body">
                        <?php if ($num > 0) {
                        ?>
                          <table class="table table-bordered" width="100%" cellspacing="0">
                            <tr>
                              <th>Remark</th>
                              <th>Status</th>
                              <th>Remark Date</th>
                              <?php while ($result = mysqli_fetch_array($ret)) { ?>
                            </tr>
                            <tr>
                              <td><?php echo $result['remark']; ?></td>
                              <td><?php echo $result['status']; ?></td>
                              <td><?php echo $result['postingDate']; ?></td>
                            </tr>

                          <?php } // End while loop
                          ?>

                          </table>
                        <?php
                          //end if   
                        } else { ?>
                          <h4 align="center" style="color:red"> No Tracking history found </h4>
                        <?php } ?>


                      </div>
                    </div>

                  </div>
                </div>




              </form>
              <!-- Content Row -->


              <!-- Footer -->
              <!-- include_once('includes/footer.php');?> -->
              <!-- End of Footer -->

            </div>
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

      </div>
      <!-- /.content-wrapper -->
      <?php include_once('includes/footer.php') ?>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- Scroll to Top Button-->
    <?php include_once('includes/footer2.php'); ?>
  </body>


  </html>
<?php } ?>