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
                        <a href="dashboard.php" class="nav-link ">

                            <i class=" nav-icon fas fa-tachometer-alt"></i>

                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="manage-employee.php" class="nav-link active">
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
                    <div class="col-sm-8">
                        <h1 class="m-0 text-dark">HR Department | Employee Management</h1>
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


                    <!-- ./col -->

                    <div class="card col-lg-12 col-sm-12">
                        <div class="card-header ">
                            <h3>List of All Employee
                                <a href="reports/exportdata-employee.php" class="no-print btn btn-success float-right"><i
                                            class="fas fa-file-excel"></i> Export
                                </a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class=" table table-bordered table-hover">

                                <thead>
                                <tr>
                                    <th>Emp ID</th>
                                    <th>Full Name</th>
                                    <th>Address</th>
                                    <th>NIC</th>
                                    <th>Mobile No</th>
                                    <th>Branch</th>
                                    <th>Dept</th>
                                    <th>Job</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $query = mysqli_query($con, "select * from employee");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>

                                    <tr>

                                        <td><?php echo $row['EmpID']; ?></td>
                                        <td><?php echo $row['EmpFLname']; ?></td>
                                        <td><?php echo $row['EmpAddr']; ?></td>
                                        <td><?php echo $row['EmpNic']; ?></td>
                                        <td><?php echo $row['EmpContactNo']; ?></td>
                                        <td><?php echo $row['EmpBCode']; ?></td>
                                        <td><?php echo $row['EmpDept']; ?></td>
                                        <td><?php echo $row['EmpDesignation']; ?></td>
                                        <td><?php echo $row['EmpEmail']; ?></td>
                                    </tr>

                                    <?php $cnt++;
                                } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Emp ID</th>
                                    <th>Full Name</th>
                                    <th>Address</th>
                                    <th>NIC</th>
                                    <th>Mobile No</th>
                                    <th>Branch</th>
                                    <th>Dept</th>
                                    <th>Job</th>
                                    <th>Email</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>


                </div>


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</div>

<?php include('../AdminLTE/footer.php') ?>

