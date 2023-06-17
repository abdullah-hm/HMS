<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['adminid'])) {
    header('Location:../logout.php');
}

include('../AdminLTE/header.php');
include_once('../includes/config.php');


if (isset($_POST['submit'])) {
//getting post values
    $bcode = $_POST['branch_code'];
    $bname = $_POST['branch_name'];
    $baddr = $_POST['branch_address'];
    $query = "insert into branch(BranchCode,BranchName,BranchAddress) values('$bcode','$bname','$baddr')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo '<script>alert("Branch Added successfully.")</script>';
        echo "<script>window.location.href='manage-branch.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
        echo "<script>window.location.href='add-branch.php'</script>";
    }
}


?>

<script>
    function branchCodeAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'branch_code=' + $("#branchcode").val(),
            type: "POST",
            success: function (data) {
                $("#branchid-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }
</script>

<div class="admin-dashboard">
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
                    <i class="fas fa fa-user"></i> Mr/Mrs: <b> <?= $_SESSION['adminname'] ?> </b>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar     elevation-4">
        <!-- Brand Logo -->
        <a href="dashboard.php" class="brand-link">

            <span class="brand-text center">Lak Derana</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link ">

                            <i class=" nav-icon fas fa-tachometer-alt"></i>

                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview menu-open">
                        <a href="manage-branch.php" class="nav-link active">
                            <i class="nav-icon fa fa-braille"></i>
                            <p>
                                Branch
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add-branch.php" class="nav-link active">
                                    <i class="nav-icon fas fa-hospital "></i>
                                    <p>Add Branch</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage-branch.php" class="nav-link ">
                                    <i class="nav-icon fa fa-building "></i>
                                    <p>Manage Branch</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview menu-close">
                        <a href="manage-employee.php" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Employee
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add-employee.php" class="nav-link">
                                    <i class="nav-icon fa fa-plus "></i>
                                    <p>Add Employee</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage-employee.php" class="nav-link">
                                    <i class="nav-icon fas fa-user "></i>
                                    <p>Manage Employee</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="manage-room.php" class="nav-link ">
                            <i class="nav-icon fa fa-building"></i>
                            <p>
                                Rooms
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="manage-customer.php" class="nav-link ">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                Customers
                            </p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="payment.php" class="nav-link">
                            <i class="nav-icon fas  fa-money-check"></i>
                            <p>
                                Payment
                            </p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="manage-complaint.php" class="nav-link ">
                            <i class="nav-icon fa fa-sticky-note"></i>
                            <p>
                                Complaint
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
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
                        <h1 class="m-0 text-dark">Admin Department | Add Branch</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Admin</a></li>
                            <li class="breadcrumb-item active">Branch</li>
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


                    <form method="post" name="addbranch">
                        <!-- SELECT2 EXAMPLE -->
                        <div class="card card-default col-md-8 col-sm-12 offset-md-4">
                            <!-- /.card-header -->

                            <div class="card-header py-3 ">
                                <h5 class="m-0 font-weight-bold text-primary">Add Branch Information</h5>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-12">
                                        <label>Branch Code:</label>
                                        <div class="input-group">

                                            <input type="text" placeholder="Enter Branch Code"
                                                   name="branch_code" id="branchcode"
                                                   class="form-control" maxlength="4" minlength="3"
                                                   onblur="branchCodeAvailability()"
                                                   required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-hospital"></i></span>
                                            </div>

                                        </div>
                                        <span id="branchid-availability-status" style="font-size:13px;"></span>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Branch Name:</label>
                                        <div class="input-group">
                                            <input type="text" placeholder="Enter Branch Name"
                                                   name="branch_name"
                                                   class="form-control" maxlength="12" minlength="4" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-hospital-alt"></i></span>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group col-12">
                                        <label>Branch Address:</label>
                                        <div class="input-group">
                                            <input type="text" placeholder="Enter Branch Address"
                                                   name="branch_address"
                                                   class="form-control" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-map-pin"></i></span>
                                            </div>

                                        </div>

                                    </div>


                                    <div class="form-group offset-md-3  offset-sm-2 col-sm-6 col-md-6">
                                        <div class="text-center ">
                                            <button type="submit" value="Submit" name="submit" id="submit"
                                                    class=" py-2 btn btn-block bg-gradient-info btn-lg ">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->


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

