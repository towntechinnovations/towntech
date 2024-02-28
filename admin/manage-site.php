<?php session_start();
error_reporting(0);
//DB conncetion
include_once('includes/config.php');
//validating Session
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {


    if (isset($_POST['submit'])) {
        $wtitle = $_POST['webtitle'];
        $cphoto = $_POST['currentphoto'];
        $imgfile = $_FILES["image"]["name"];
        $currentppath = "uploadeddata" . "/" . $cphoto;
        // get the image extension
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        $uname = $_SESSION['uname'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $link = $_SERVER['REQUEST_URI'];
        $action = 'Manage Site';

        if (!in_array($extension, $allowed_extensions)) {
            $status = 0;
            mysqli_query($con, "insert into  tbllogs(userName,userIp,userAction,actionUrl,actionStatus) values('$uname','$uip','$action','$link','$status')");
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            //rename the image file
            $imgnewfile = md5($imgfile) . $extension;
            // Code for move image into directory
            move_uploaded_file($_FILES["image"]["tmp_name"], "uploadeddata/" . $imgnewfile);

            $sql = mysqli_query($con, "update tblsite set siteLogo='$imgnewfile',siteTitle='$wtitle'");
            unlink($currentppath);
            $status = 1;
            mysqli_query($con, "insert into  tbllogs(userName,userIp,userAction,actionUrl,actionStatus) values('$uname','$uip','$action','$link','$status')");
            echo "<script>alert('Website Details Updated');</script>";
            //echo "<script>window.location.href='manage-employee.php'</script>";
        }
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title> Manage Website</title>
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
                                            <a class="nav-link active" href="manage-site.php">
                                                <i class="fas fa-fw fa-cog"></i>
                                                <p>Manage Website</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <div class="user-panel pb-3 mb-3 d-flex">
                                </div>


                                <li class="nav-item">
                                    <a class="nav-link active" href="manage-site.php">
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

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="container-fluid">

                            <!-- Content Row -->
                            <!-- DataTales Example -->
                            <h1 class="h3 pt-4 mb-3 text-gray-800">Manage Website</h1>
                            <form method="post" enctype="multipart/form-data">

                                <?php
                                $query = mysqli_query($con, "select * from tblsite");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>

                                    <div class="row">

                                        <div class="col-lg-10">

                                            <!-- Basic Card Example -->
                                            <div class="card shadow mb-4">
                                                <input type="hidden" name="currentphoto" value="<?php echo $row['siteLogo']; ?>">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="inputSubject">Current Logo</label>
                                                        <img src="uploadeddata/<?php echo $row['siteLogo']; ?>" width="250">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="inputSubject">Website Title</label>
                                                        <input class="form-control" id="webtitle" name="webtitle" required="true" value="<?php echo $row['siteTitle']; ?>">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="inputSubject">Website Logo</label>
                                                        <input type="file" name="image" required class="form-control" />
                                                        <small style="color:red;">Only jpg / jpeg/ png /gif format allowed.</small>
                                                        </td>
                                                    <?php } ?>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" id="submit" value="Update">
                                                    </div>

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