<?php
session_start();


if (!isset($_SESSION['barid'])) {
    header('Location:../logout.php');
}
include('../AdminLTE/header.php');
include_once('../includes/config.php');
?>


<div class="bar-dashboard">
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
                    <i class="fas fa fa-user"></i> Mr/Mrs: <b> <?= $_SESSION['barname'] ?> </b>
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
                        <a href="manage-beverage.php" class="nav-link  ">
                            <i class="nav-icon fas fa-glass-cheers"></i>
                            <p>
                                Beverage
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add-beverage.php" class="nav-link">
                                    <i class="nav-icon fas fa-cocktail"></i>
                                    <p>Add Beverage</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage-beverage.php" class="nav-link  ">
                                    <i class="nav-icon fas fa-glass-cheers"></i>
                                    <p>Manage Beverage</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview menu-close">
                        <a href="manage-bev-purchase.php" class="nav-link  ">
                            <i class="nav-icon fas fa-wine-bottle"></i>
                            <p>
                                Customer Purchase
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add-bev-purchase.php" class="nav-link">
                                    <i class="nav-icon fas fa-user-plus"></i>
                                    <p>Add Bevg to Customer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage-bev-purchase.php" class="nav-link  ">
                                    <i class="nav-icon fas fa-users "></i>
                                    <p>Manage Bevg Purchase</p>
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
                        <h1 class="m-0 text-dark">Bar Department Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Bar</a></li>
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

                $query1 = mysqli_query($con, "select * from bar where  BStatus='In Stock'");
                $query2 = mysqli_query($con, "select * from bar where  BStatus='Out Of Stock'");

                $instock_beverage = mysqli_num_rows($query1);
                $outstock_beverage = mysqli_num_rows($query2);
                $totalbeverage = $instock_beverage + $outstock_beverage;

                ?>

                <div class="row">

                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-green ">
                            <div class="inner">


                                <h3><?= $totalbeverage ?></h3>
                                <p>Total Beverages</p>
                            </div>
                            <div class="icon">
                                <i class="fas fas fa-wine-bottle"></i>
                            </div>
                            <a href="manage-beverage.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-blue ">
                            <div class="inner">


                                <h3><?= $instock_beverage ?></h3>
                                <p>Total In-Stock Beverages</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-cocktail"></i>
                            </div>
                            <a href="manage-beverage.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">


                                <h3><?= $outstock_beverage ?></h3>
                                <p>Total Out Of Stock Beverages</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-wine-glass-alt"></i>
                            </div>
                            <a href="manage-beverage.php" class="small-box-footer">More info <i
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

