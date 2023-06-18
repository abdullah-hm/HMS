<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['barid'])) {
    header('Location:../logout.php');
}

include('../AdminLTE/header.php');
include_once('../includes/config.php');


$bid = intval($_GET['bid']);


if (isset($_POST['update'])) {
//getting post values

    $bno = $_POST['b_no'];
    $bcode = $_POST['b_bc'];
    $bname = $_POST['b_name'];
    $bprice = $_POST['b_price'];
    $bstatus = $_POST['b_status'];



    $query = "update bar set BNo='$bno',BBCode='$bcode',BName='$bname',BPrice='$bprice',BStatus='$bstatus'  where Bid='$bid'";

    $result = mysqli_query($con, $query);
    if ($result) {
        echo '<script>alert("Beverage record updated successfully.")</script>';
        echo "<script>window.location.href='manage-beverage.php'</script>";
    } else {
        echo "<script>alert('Beverage record went wrong. Please try again.');</script>";
        echo "<script>window.location.href='manage-beverage.php'</script>";
    }
}


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
                        <a href="dashboard.php" class="nav-link">

                            <i class=" nav-icon fas fa-tachometer-alt"></i>

                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview menu-open">
                        <a href="manage-beverage.php" class="nav-link  active">
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
                                <a href="manage-beverage.php" class="nav-link active ">
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
    <!-- /.navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Bar Department | Update Beverage</h1>
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


                <div class="row">

                    <form method="post" name="editbeverage">
                        <!-- SELECT2 EXAMPLE -->
                        <div class="card card-default offset-md-3 col-md-5 col-sm-12">
                            <!-- /.card-header -->


                            <div class="card-body">
                                <div class="row">

                                    <?php
                                    $bid = intval($_GET['bid']);
                                    $query = mysqli_query($con, "select * from bar where Bid='$bid'");

                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>

                                        <div class="form-group col-12">
                                            <label>Beverage Tag No</label>
                                            <div class="input-group">
                                                <input type="number"  value="<?= $row['BNo']; ?>"
                                                       name="b_no"
                                                        readonly
                                                       class="form-control"
                                                         required>
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-wine-bottle"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <label>Branch</label>
                                            <div class="input-group">
                                                <input type="text"
                                                       name="b_bc"  value="<?= $row['BBCode']; ?>"
                                                       class="form-control"
                                                        readonly required>
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-location-arrow"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <label>Beverage Name</label>
                                            <div class="input-group">
                                                <input type="text"
                                                       name="b_name" value="<?= $row['BName']; ?>"
                                                       class="form-control" required>
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-wine-bottle"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <label>Beverage Price</label>
                                            <div class="input-group">
                                                <input type="number" value="<?= $row['BPrice']; ?>"
                                                       name="b_price"
                                                       class="form-control" required>
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa fa-money-bill"></i></span>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group col-12 ">
                                            <label>Room Status</label>
                                            <select name="b_status" class="form-control" required>
                                                <option value="">Update Beverage Status</option>
                                                <option value="In Stock">In Stock</option>
                                                <option value="Out of Stock">Out of Stock</option>
                                            </select>
                                        </div>


                                        <div class="form-group offset-md-3  offset-sm-2 col-sm-6 col-md-6">
                                            <div class="text-center">
                                                <button type="submit" value="submit" name="update"
                                                        class="btn btn-block bg-gradient-info btn-lg ">
                                                    Update
                                                </button>
                                            </div>
                                        </div>

                                    <?php } ?>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>

                        </div>
                        <!-- /.card -->
                    </form>


                </div>


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</div>

<?php include('../AdminLTE/footer.php') ?>

