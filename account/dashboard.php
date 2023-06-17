<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['accid'])) {
    header('Location:../logout.php');
}
include('../AdminLTE/header.php');
include_once('../includes/config.php');
?>


<div class="account-dashboard">
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
                    <i class="fas fa fa-user"></i> Mr/Mrs: <b> <?= $_SESSION['accname'] ?> </b>
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
                    <li class="nav-item has-treeview menu-close">
                        <a href="#" class="nav-link  ">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Employee
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="manage-employee.php" class="nav-link">
                                    <i class="nav-icon fa fa-users"></i>
                                    <p>Employee Detail</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage-attendance.php" class="nav-link">
                                    <i class="nav-icon fa fa-users"></i>
                                    <p>Attendance</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage-leave.php" class="nav-link  ">
                                    <i class="nav-icon fa fa-users"></i>
                                    <p>Leave</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="manage-salary.php" class="nav-link ">
                            <i class="nav-icon fas fa-user-tag"></i>
                            <p>
                                Salary
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="manage-customer.php" class="nav-link ">
                            <i class="nav-icon fas fa-user "></i>
                            <p>
                                Customers
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="manage-payment.php" class="nav-link ">
                            <i class="nav-icon fab fa-cc-amazon-pay "></i>
                            <p>
                                Payments
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="invoice-payment.php" class="nav-link ">
                            <i class="nav-icon fa fa-plus"></i>
                            <p>
                                Add Invoice
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
                        <h1 class="m-0 text-dark">Account Department Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Account</a></li>
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

                <div class="row">

                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-purple ">
                            <div class="inner">
                                <?php
                                $query1 = mysqli_query($con, "select sum(TotalSalary) as Total from payroll");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($query1)) {
                                    ?>
                                    <h3>Rs. <?php echo $row['Total']; ?></h3>
                                    <?php $cnt++;
                                } ?>

                                <p>Total employee payroll for this month</p>
                            </div>
                            <div class="icon">
                                <i class="fa  fa-users"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="no-print col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-green ">
                                <div class="inner">

                                    <?php
                                    $query1 = mysqli_query($con, "select sum(PaidAmount) as Total from payment where month(paymentDate) = month(current_date())");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($query1)) {
                                        ?>
                                        <h3>Rs. <?php echo $row['Total']; ?></h3>
                                        <?php $cnt++;
                                    } ?>

                                    <p>Total revenue for the month</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa fa-bookmark"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="no-print col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-red ">
                                    <div class="inner">

                                        <?php
                                        $query1 = mysqli_query($con, "select sum(DueAmount) as Total from payment");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($query1)) {
                                            ?>
                                            <h3>Rs. <?php echo $row['Total']; ?></h3>
                                            <?php $cnt++;
                                        } ?>

                                        <p>Total Due Amount</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-bookmark"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>

                                <!-- ./col -->
                            </div>

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-header border-0">
                                            <div class="d-flex justify-content-between">
                                                <h3 class="card-title">Total Payroll by Department</h3>
                                            </div>
                                        </div>
                                        <div id="display" class="myCustom1">
                                            <?php include("charts/chart-bar.php"); ?>
                                        </div>
                                    </div>
                                    <!-- /.card -->


                                    <!-- /.card -->
                                </div>
                                <!-- /.col-md-6 -->
                                
                            </div>


                        </section>
                        <!-- /.content -->
                    </div>
                    <!-- /.content-wrapper -->
                </div>
                <?php include('../AdminLTE/footer.php') ?>

