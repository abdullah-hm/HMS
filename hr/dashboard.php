<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['hrid'])) {
    header('Location:../logout.php');
}
include('../AdminLTE/header.php');
include_once('../includes/config.php');
?>


<div class="hr-dashboard">
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
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" >
                    <i class="fas fa fa-user"></i> Mr/Mrs: <b> <?= $_SESSION['hrname'] ?> </b>
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
                        <a href="manage-employee.php" class="nav-link ">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Employee
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview menu-close">
                        <a href="manage-attendance.php" class="nav-link  ">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Attendance
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add-attendance.php" class="nav-link">
                                    <i class="nav-icon fa fa-plus "></i>
                                    <p>Add Attendance</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="manage-attendance.php" class="nav-link  ">
                                    <i class="nav-icon fas fa-user-check "></i>
                                    <p>Manage Attendance</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="manage-attendance.php" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Leave
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add-leave.php" class="nav-link">
                                    <i class="nav-icon fa fa-plus "></i>
                                    <p>Add Leave</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage-leave.php" class="nav-link  ">
                                    <i class="nav-icon fas fa-user-check "></i>
                                    <p>Manage Leave</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview menu-close">
                        <a href="manage-salary.php" class="nav-link  ">
                            <i class="nav-icon fas fa-user-tag"></i>
                            <p>
                                Salary
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add-salary.php" class="nav-link">
                                    <i class="nav-icon fa fa-plus "></i>
                                    <p>Add Salary</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage-salary.php" class="nav-link  ">
                                    <i class="nav-icon fas fa-user-check "></i>
                                    <p>Manage Salary</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="manage-attendance.php" class="nav-link">
                            <i class="nav-icon fa fa-"></i>
                            <p>
                                Complaints
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="manage-complaint.php" class="nav-link  ">
                                    <i class="nav-icon fas fa-user-check "></i>
                                    <p>Complaint Details</p>
                                </a>
                            </li>
                        </ul>
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
                        <h1 class="m-0 text-dark">HR Department Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">HR</a></li>
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

                $query1 = mysqli_query($con, "select * from employee");
                $totalemployee = mysqli_num_rows($query1);
                $query2 = mysqli_query($con, "select * from attendance where Date = curdate()");
                $todayattendance = mysqli_num_rows($query2);
                $query3 = mysqli_query($con, "select * from emp_leave where Date = curdate()");
                $todayleaves = mysqli_num_rows($query3);
                $query4 = mysqli_query($con, "select * from emp_leave where month(Date) = month(curdate())");
                $monthleave = mysqli_num_rows($query4);

                ?>

                <div class="row">

                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-purple ">
                            <div class="inner">


                                <h3><?= $totalemployee ?></h3>
                                <p>Total Employee</p>
                            </div>
                            <div class="icon">
                                <i class="fa  fa-users"></i>
                            </div>
                            <a href="manage-employee.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-green ">
                            <div class="inner">

                                <h3><?= $todayattendance?></h3>
                                <p>Today Total Attendance</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa fa-bookmark"></i>
                            </div>
                            <a href="manage-attendance.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-red ">
                            <div class="inner">

                                <h3><?= $todayleaves?></h3>
                                <p>Today Total Leaves</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-bookmark"></i>
                            </div>
                            <a href="manage-leave.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-blue ">
                            <div class="inner">


                                <h3><?= $monthleave ?></h3>
                                <p>Total Leaves This Month</p>
                            </div>
                            <div class="icon">
                                <i class="fa  fa-users"></i>
                            </div>
                            <a href="manage-employee.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->

                        <div class="small-box bg-red ">
                            <div class="inner">
                                <h3>
                                    1
                                </h3>
                                <p>Complaints</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-bookmark"></i>
                            </div>
                            <a href="manage-leave.php" class="small-box-footer">Write Complaint <i
                                        class="fas fa-user-edit"></i></a>
                        </div>
                    </div>



                    <!-- ./col -->
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Employees by gender</h3>
                                </div>
                            </div>
                            <div id="display" class="myCustom1">
                            <?php include("charts/chart-doughnut.php"); ?>
                             </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Employees by Department</h3>
                                </div>
                            </div>
                            <div id="display" class="myCustom1">
                            <?php include("charts/chart-bar.php"); ?>
                             </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->
                </div>



            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<?php include('../AdminLTE/footer.php') ?>

