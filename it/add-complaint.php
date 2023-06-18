<?php


session_start();
error_reporting(0);

if (!isset($_SESSION['itid'])) {
    header('Location:../logout.php');
}

include('../AdminLTE/header.php');
include_once('../includes/config.php');


if (isset($_POST['submit'])) {
//getting post values

    $empid = $_POST['empid'];
    $dept = $_POST['dept'];
    $complaint = $_POST['Complaint'];
    $status = $_POST['Status'];


    $query = "insert into complaint(EmpID, Dept, Complaint, Status) values('$empid','$dept','$complaint','$status')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo '<script>alert("Complaint added Successfully.")</script>';
        echo "<script>window.location.href='manage-complaint.php'</script>";
    } else {
        echo "<script>alert('Complaint went wrong. Please try again.');</script>";
        echo "<script>window.location.href='add-complaint.php'</script>";
    }
}


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
                        <a href="dashboard.php" class="nav-link ">

                            <i class=" nav-icon fas fa-tachometer-alt"></i>

                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                       <a href="add-complaint.php" class="nav-link active">
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
                        <h1 class="m-0 text-dark">IT Department | Add Complaint</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">IT</a></li>
                            <li class="breadcrumb-item active">Complaint</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                <div class="row ">

                    <form method="post" name="addcomplaint">
                        <!-- SELECT2 EXAMPLE -->
                        <div class="card card-default offset-3 col-7">
                            <!-- /.card-header -->



                            <div class="card-body">
                                <div class="row">

                                <div class="form-group col-12">
                                        <label>Employee ID / Name</label>
                                        <select class="select2" type="text" name="empid"
                                                data-placeholder="Select Employee ID / Name" style="width: 100%"
                                                required>
                                            <option value=""></option>
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

                                    <div class="form-group col-sm-12 col-md-12">
                                        <label>Department</label>
                                        <select class="form-control" type="text" name="dept"
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
                                    <div class="form-group col-12">
                                        <label>Complaint</label>
                                        <div class="input-group">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name = "Complaint"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 col-md-12 ">
                                        <label>Status</label>
                                        <select name="Status" class="form-control" required>
                                            <option value="New">New</option>
                                            <!-- <option value="Single Room">Pending</option> -->
                                            <!-- <option value="Twin Bed Room">Solved</option> -->
                                        </select>
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

