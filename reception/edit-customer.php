<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['recepid'])) {
    header('Location:../logout.php');
}

include('../AdminLTE/header.php');
include_once('../includes/config.php');


$cid = intval($_GET['cid']);


if (isset($_POST['update'])) {
//getting post values

    $cmobile = $_POST['cus_mobile'];
    $cflname = $_POST['cus_flname'];
    $cnic = $_POST['cus_nic'];
    $cdob = $_POST['cus_dob'];
    $cgender = $_POST['cus_gender'];
    $caddr = $_POST['cus_addr'];
    $cmail = $_POST['cus_mail'];
    $cbcode = $_POST['cus_bcode'];



    $query = "update customer set CusFLName='$cflname',CusNic='$cnic',CusDob='$cdob',CusGender='$cgender',CusAddr='$caddr',CusContactNo='$cmobile',CusEmail='$cmail',CusBCode='$cbcode'  where CusID='$cid'";

    $result = mysqli_query($con, $query);
    if ($result) {
        echo '<script>alert("Customer record updated successfully.")</script>';
        echo "<script>window.location.href='manage-customer.php'</script>";
    } else {
        echo "<script>alert('Customer record went wrong. Please try again.');</script>";
        echo "<script>window.location.href='manage-customer.php'</script>";
    }
}


?>


<div class="reception-dashboard">
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
                    <i class="fas fa fa-user"></i> Mr/Mrs: <b> <?= $_SESSION['recepname'] ?> </b>
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
                        <a href="dashboard.php" class="nav-link ">

                            <i class=" nav-icon fas fa-tachometer-alt"></i>

                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview menu-open">
                        <a href="manage-customer.php" class="nav-link active">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Customer
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="manage-customer.php" class="nav-link active">
                                    <i class="nav-icon fas fa-user-edit "></i>
                                    <p>Edit Customer</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="add-customer.php" class="nav-link ">
                            <i class="nav-icon fas fa fa-user-plus "></i>
                            <p>
                                Add Customer
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
    <!-- /.navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Reception Department | Update Customer</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Reception</a></li>
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

                    <form method="post" name="editcustomer">
                        <!-- SELECT2 EXAMPLE -->
                        <div class="card card-default">
                            <!-- /.card-header -->


                            <div class="card-body">
                                <div class="row">

                                    <?php
                                    $cid = intval($_GET['cid']);
                                    $query = mysqli_query($con, "select * from customer where CusID='$cid'");
                                    $branches = mysqli_query($con, "select * from branch");

                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>

                                        <div class="form-group col-sm-6 col-md-6">
                                            <label>Mobile No</label>
                                            <div class="input-group">
                                                <input type="number"
                                                       name="cus_mobile" id="CusMobile"
                                                       required
                                                       class="form-control" value="<?= $row['CusContactNo']; ?>"
                                                       readonly="true">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-phone-alt"></i></span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group col-sm-6 col-md-6">
                                            <label>Full Name</label>
                                            <div class="input-group">
                                                <input type="text" value="<?= $row['CusFLName']; ?>"
                                                       name="cus_flname"
                                                       class="form-control" required>
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-user"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6 col-md-6">
                                            <label>NIC No</label>
                                            <div class="input-group">
                                                <input type="text" value="<?= $row['CusNic']; ?>"
                                                       name="cus_nic"
                                                       class="form-control" minlength="4" maxlength="12" required>
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa fa-id-card"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6 col-md-6">
                                            <label>DOB</label>
                                            <div class="input-group date" id="uempdob"
                                                 data-target-input="nearest">
                                                <input type="text" name="cus_dob" value="<?= $row['CusDob']; ?>"
                                                       class="form-control datetimepicker-input"
                                                       data-target="#uempdob" required/>
                                                <div class="input-group-append" data-target="#uempdob"
                                                     data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6 col-md-6 ">
                                            <label>Gender</label>
                                            <select name="cus_gender" type="text" class="form-control" required>
                                                <option value="">Update Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>


                                        <div class="form-group col-sm-6 col-md-6">
                                            <label>Address</label>
                                            <div class="input-group">
                                                <input type="text" value="<?= $row['CusAddr']; ?>"
                                                       name="cus_addr"
                                                       class="form-control" required>
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-location-arrow"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6 col-md-6">
                                            <label>Email</label>
                                            <div class="input-group">
                                                <input type="email" value="<?= $row['CusEmail']; ?>"
                                                       name="cus_mail"
                                                       class="form-control" required>
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-envelope"></i></span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group col-sm-6 col-md-6">
                                            <label>Branch</label>
                                            <select class="select2" type="text" name="cus_bcode"
                                                    data-placeholder="Update Branch" style="width: 100%" required>
                                                <option value=""></option>
                                                <?php
                                                foreach ($branches as $branch) {

                                                    if ($branch) {
                                                        ?>
                                                        <option value="<?= $branch['BranchCode']; ?>"><?= $branch['BranchName'];; ?></option>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <option value="error">No Branches Found</option>
                                                        <?php
                                                    }
                                                }
                                                ?>

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

