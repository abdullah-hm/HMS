<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['accid'])) {
    header('Location:../logout.php');
}

include('../AdminLTE/header.php');
include_once('../includes/config.php');

$pid = intval($_GET['pid']);


if (isset($_POST['update'])) {
//getting post values

    $empid = $_POST['empid'];
    $basic = $_POST['basic_salary'];
    $overtime = $_POST['overtime_pay'];
    $travelallovance = $_POST['travel_allowance'];
    $deduct = $_POST['deduct_amount'];
    $total = ($basic + $overtime + $travelallovance) - $deduct;
    $issuedate = $_POST['issuedate'];


    $query = "update payroll set EmpID='$empid',Basic='$basic',OverTime='$overtime',TravelAllowance='$travelallovance',DeductSalary='$deduct',TotalSalary='$total', SalaryIssuedDate='$issuedate' where PayrollID='$pid'";

    $result = mysqli_query($con, $query);
    if ($result) {
        echo '<script>alert("Salary record updated successfully.")</script>';
        echo "<script>window.location.href='manage-salary.php'</script>";
    } else {
        echo "<script>alert('Salary record went wrong. Please try again.');</script>";
        echo "<script>window.location.href='manage-employee.php'</script>";
    }
}

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
                        <a href="dashboard.php" class="nav-link">

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
                        <a href="manage-salary.php" class="nav-link active">
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
                    <div class="col-sm-8">
                        <h1 class="m-0 text-dark">HR Department | Salary Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-4">
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


                <div class="row">

                    <form method="post" name="updatesalary">
                        <!-- SELECT2 EXAMPLE -->
                        <div class="card card-default">
                            <!-- /.card-header -->

                            <div class="card-body">

                                <div class="row">
                                    <form method="post" name="updatesalary">
                                        <!-- SELECT2 EXAMPLE -->
                                        <div class="card card-default offset-md-3 col-md-5 col-sm-12  ">
                                            <!-- /.card-header -->


                                            <div class="card-header py-3">
                                                <h5 class="m-0 font-weight-bold text-primary">Update Salary
                                                Information</h5>
                                            </div>
                                            <?php
                                            $pid = intval($_GET['pid']);
                                            $query = mysqli_query($con, "select * from payroll where PayrollID='$pid'");

                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="form-group col-12">
                                                            <label>Employee ID:</label>
                                                            <div class="input-group">
                                                                <input type="number"
                                                                name="empid" id="CusMobile"
                                                                required
                                                                class="form-control" value="<?= $row['EmpID']; ?>"
                                                                readonly="true">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                        class="fas fa-user"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="form-group  col-12">
                                                                <label>Basic Salary</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Rs.</span>
                                                                    </div>
                                                                    <input type="number" name="basic_salary" value="<?= $row['Basic']; ?>"
                                                                    class="form-control" required>

                                                                </div>
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>OverTime Payment</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Rs.</span>
                                                                    </div>
                                                                    <input type="number" name="overtime_pay"
                                                                    class="form-control" value="<?= $row['OverTime']; ?>" required>

                                                                </div>
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Travelling Allowance</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Rs.</span>
                                                                    </div>
                                                                    <input type="number" name="travel_allowance"
                                                                    class="form-control" value="<?= $row['TravelAllowance']; ?>"
                                                                    required>

                                                                </div>
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Deduct Amount</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Rs.</span>
                                                                    </div>
                                                                    <input type="number" name="deduct_amount"
                                                                    class="form-control" value="<?= $row['DeductSalary']; ?>" required>

                                                                </div>
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Issue Date</label>
                                                                <div class="input-group date" id="empdob" data-target-input="nearest">
                                                                    <input type="text" name="issuedate" class="form-control datetimepicker-input"
                                                                    data-target="#empdob" maxlength="<?= date("Y/m/d"); ?>" required/>
                                                                    <div class="input-group-append" data-target="#empdob"
                                                                    data-toggle="datetimepicker">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-calendar-alt"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group offset-md-3  offset-sm-2 col-sm-6 col-md-6">
                                                            <div class="text-center">
                                                                <button type="submit" value="submit" name="update"

                                                                class="btn btn-block bg-gradient-info btn-lg ">
                                                                Update
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>


                                                <!-- /.row -->
                                            </div>
                                        <?php } ?>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </form>
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

