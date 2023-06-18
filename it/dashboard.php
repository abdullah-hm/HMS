<?php
session_start();


if (!isset($_SESSION['itid'])) {
    header('Location:../logout.php');
}
include('../AdminLTE/header.php');
include_once('../includes/config.php');
?>


<div class="it-dashboard">
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

            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                    <i class="fas fa fa-user"></i> Mr/Mrs: <b> <?= $_SESSION['itname'] ?> </b>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar   elevation-4">
        <!-- Brand Logo -->
        <a href="dashboard.php" class="brand-link navbar-navy">
            <span class="brand-text">LAK DERANA</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link active">

                            <i class=" nav-icon fas fa-tachometer-alt"></i>

                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>                    
                    <li class="nav-item">
                       <a href="add-complaint.php" class="nav-link ">
                           <i class="nav-icon fa fa-plus"></i>
                           <p>
                               Add Complaint
                           </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="manage-complaint.php" class="nav-link ">
                            <i class="nav-icon fa fa-folder-open"></i>
                            <p>
                                Manage Complaint
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="logout.php" class="nav-link ">
                            <i class="nav-icon  fas fa-sign-out-alt "></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->

        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">IT Department Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">IT</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <?php

                $query1 = mysqli_query($con, "select * from complaint where Dept='it'");
                $query2 = mysqli_query($con, "select * from complaint where Dept='it' and Status='New'");
                $query3 = mysqli_query($con, "select * from complaint where Dept='it' and Status='Pending'");
                $query4 = mysqli_query($con, "select * from complaint where Dept='it' and Status='Solved'");

                $totalcomplaint = mysqli_num_rows($query1);
                $new = mysqli_num_rows($query2);
                $pending = mysqli_num_rows($query3);
                $solved = mysqli_num_rows($query4);

                ?>

                <div class="row">



                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-red ">
                            <div class="inner">

                                <h3><?= $totalcomplaint ?></h3>
                                <p>Total Complaints</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-comments"></i>
                            </div>
                            <a href="manage-complaint.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-green ">
                            <div class="inner">

                                <h3><?= $new ?></h3>
                                <p>New Complaints</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-comments"></i>
                            </div>
                            <a href="manage-complaint.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-blue ">
                            <div class="inner">

                                <h3><?= $pending ?></h3>
                                <p>Pending Complaints</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-comments"></i>
                            </div>
                            <a href="manage-complaint.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-purple ">
                            <div class="inner">

                                <h3><?= $solved ?></h3>
                                <p>Solved Complaints</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-comments"></i>
                            </div>
                            <a href="manage-complaint.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- ./col -->
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<?php include('../AdminLTE/footer.php') ?>

