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

    $email = $_POST['emp_mail'];
    $epass = md5($_POST['emp_pass']);
    $eflname = $_POST['emp_flname'];
    $egender = $_POST['emp_gender'];
    $eaddr = $_POST['emp_addr'];
    $enic = $_POST['emp_nic'];
    $edob = $_POST['emp_dob'];
    $econt = $_POST['emp_cont'];
    $ebcode = $_POST['emp_bcode'];
    $edept = $_POST['emp_dept'];
    $edesi = $_POST['emp_desig'];
    $eslr = $_POST['emp_salary'];


    $query = "insert into employee(EmpFLname,EmpGender,EmpAddr,EmpNic,EmpDob,EmpContactNo,EmpBCode,EmpDept,EmpDesignation,EmpSalary,EmpEmail,EmpPwd) 
values('$eflname','$egender','$eaddr','$enic','$edob','$econt','$ebcode','$edept','$edesi','$eslr','$email','$epass')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo '<script>alert("Employee info added Successfully.")</script>';
        echo "<script>window.location.href='manage-employee.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
        echo "<script>window.location.href='add-employee.php'</script>";
    }
}


?>

<script>
    function employeeAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'EmpMail=' + $("#EmpMail").val(),
            type: "POST",
            success: function (data) {
                $("#employee-availability-status").html(data);
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
                    <li class="nav-item has-treeview menu-close">
                        <a href="manage-branch.php" class="nav-link ">
                            <i class="nav-icon fa fa-braille"></i>
                            <p>
                                Branch
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add-branch.php" class="nav-link ">
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
                    <li class="nav-item has-treeview menu-open">
                        <a href="manage-employee.php" class="nav-link active">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Employee
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add-employee.php" class="nav-link active">
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
                        <h1 class="m-0 text-dark">Admin Department | Add Employee</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Admin</a></li>
                            <li class="breadcrumb-item active">Employee</li>
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

                    <form method="post" name="addemployee">
                        <!-- SELECT2 EXAMPLE -->
                        <div class="card card-default">
                            <!-- /.card-header -->

                            <span id="employee-availability-status"></span>

                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <input type="email" placeholder="Enter Email Address"
                                                   name="emp_mail" id="EmpMail"
                                                   class="form-control" onblur="employeeAvailability()" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-envelope"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>Password</label>
                                        <div class="input-group">
                                            <input type="password" placeholder="Enter Password"
                                                   name="emp_pass"
                                                   class="form-control" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-lock"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>Full Name</label>
                                        <div class="input-group">
                                            <input type="text" placeholder="Enter Full Name"
                                                   name="emp_flname"
                                                   class="form-control" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-user"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6 ">
                                        <label>Gender</label>
                                        <select name="emp_gender" class="form-control" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>Address</label>
                                        <div class="input-group">
                                            <input type="text" placeholder="Enter Address"
                                                   name="emp_addr"
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
                                            <input type="text" placeholder="Enter NIC No"
                                                   name="emp_nic"
                                                   class="form-control" minlength="4" maxlength="12" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa fa-id-card"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>DOB</label>
                                        <div class="input-group date" id="empdob" data-target-input="nearest">
                                            <input type="text" name="emp_dob" class="form-control datetimepicker-input"
                                                   data-target="#empdob" maxlength="<?= date("Y/m/d"); ?>" required/>
                                            <div class="input-group-append" data-target="#empdob"
                                                 data-toggle="datetimepicker">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>Contact No</label>
                                        <div class="input-group">
                                            <input type="text" placeholder="Enter Contact No"
                                                   name="emp_cont"
                                                   class="form-control" minlength="9" maxlength="10" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-phone-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>Branch</label>
                                        <select class="select2" type="text" name="emp_bcode"
                                                data-placeholder="Select Branch" style="width: 100%" required>
                                            <option value=""> Select Branch</option>
                                            <?php
                                            $branches = mysqli_query($con, "select * from branch");
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

                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>Department</label>
                                        <select class="form-control" type="text" name="emp_dept"
                                                style="width: 100%" required>
                                            <option value="">Select Department</option>
                                            <option value="rec">Reception Department</option>
                                            <option value="res">Reservation Department</option>
                                            <option value="room">Room Service Department</option>
                                            <option value="bar">Bar Department</option>
                                            <option value="hr">HR Department</option>
                                            <option value="acc">Account Department</option>
                                            <option value="it">IT Department</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>Designation</label>
                                        <div class="input-group">
                                            <input type="text" placeholder="Enter Job Role"
                                                   name="emp_desig"
                                                   class="form-control" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-user"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>Salary</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rs.</span>
                                            </div>
                                            <input type="number" name="emp_salary" class="form-control" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group offset-md-3  offset-sm-2 col-sm-6 col-md-6">
                                        <div class="text-center">
                                            <button type="submit" value="submit" name="submit" id="submit"
                                                    class="btn btn-block bg-gradient-info btn-lg ">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
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

