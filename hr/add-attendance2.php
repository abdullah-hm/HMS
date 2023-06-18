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
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
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
                        <a href="dashboard.php" class="nav-link ">

                            <i class=" nav-icon fas fa-tachometer-alt"></i>

                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="manage-employee.php" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Employee
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview menu-open">
                        <a href="manage-attendance.php" class="nav-link  active">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Attendance
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add-attendance.php" class="nav-link active">
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
                    <div class="col-sm-8">
                        <h1 class="m-0 text-dark">HR Department | Employee Attendance Management</h1>
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
                    <form method="post" name="addattendance">
                        <!-- SELECT2 EXAMPLE -->
                        <div class="card card-default col-md-12 col-sm-12 offset-md-8 ">
                            <!-- /.card-header -->


                            <div class="card-header py-3 text-center">
                                <h5 class="m-0 font-weight-bold text-primary">Add Attendance Information</h5>
                                <h5 class="m-0 font-weight-bold text-success"> Current Date | Time : <span id="datetime"></span></h5>
                                <script>
                                    var dt = new Date();
                                    document.getElementById("datetime").innerHTML = (("0" + dt.getDate()).slice(-2)) + "/" + (("0" + (dt.getMonth() + 1)).slice(-2)) + "/" + (dt.getFullYear()) + "  " + (("0" + dt.getHours()).slice(-2)) + ":" + (("0" + dt.getMinutes()).slice(-2));
                                </script>
                            </div>


                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-sm-12 col-md-12">
                                        <label>Employee ID / Name</label>
                                        <select class="select2" type="text" name="employeeid"
                                                data-placeholder="Select Employee ID / Name" style="width: 100%"
                                                required>
                                            <option value=""> Select Branch</option>
                                            <?php
                                            $allemployee = mysqli_query($con, "select * from employee");
                                            foreach ($allemployee as $emp) {

                                                if ($emp) {
                                                    ?>
                                                    <option value="<?= $emp['EmpID']; ?>">[<?= $emp['EmpID']; ?>]
                                                        - <?= $emp['EmpFLname']; ?> </option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="">Employee Data Not Found</option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <div class="form-group col-sm-6 col-md-6">
                                        <button type="submit" value="Submit" name="timein"
                                                class=" py-2 btn btn-block bg-success btn-lg ">
                                            Time In
                                        </button>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">

                                        <button type="submit" value="Submit" name="timeout"
                                                class=" py-2 btn btn-block bg-gradient-info btn-lg ">
                                            Time Out
                                        </button>
                                    </div>

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </form>
                </div>
                <!-- /.card-body -->
            </div>

    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

</div>

<?php
// ************************ add Time IN ************************
if (isset($_POST['timein'])) {
    $employeeid = $_POST['employeeid'];
    $q = "select count(1) from attendance WHERE EmpID = '$employeeid' and Date = CURDATE()";
    if ($q == 1) {
        echo "<script>alert('An Time In attendance is already in the system')</script>";
        echo "<script>window.location.href='add-attendance.php'</script>";
    } else {
        $insert = "insert into attendance (EmpID, Date, TimeIn, TimeOut) values ( '$employeeid', CURDATE(), NOW(), '' )";
        if ($con->query($insert) === TRUE) {
            echo "<script>alert('Employee Time In Attendance Successfully Added.')</script>";
            echo "<script>window.location.href='manage-attendance.php'</script>";
        } else {
            echo "Error:" . $insert . "<br>" . $con->error;
        }
    }
    $con->close();
}
?>

<?php
// ************************ add Time Out ************************
if (isset($_POST['timeout'])) {
    $employeeid = $_POST['employeeid'];
    $update = "update attendance set TimeOut = now() where EmpID = '$employeeid' and Date = CURDATE()";
    if ($con->query($update) === TRUE) {
        echo "<script>alert('Employee Time Out Attendance Successfully Added')</script>";
        echo "<script>window.location.href='manage-attendance.php'</script>";
    } else {
        echo "Error:" . $update . "<br>" . $con->error;
    }
    $con->close();
}
?>


<?php include('../AdminLTE/footer.php') ?>

