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
                    <li class="nav-item has-treeview menu-close">
                        <a href="manage-attendance.php" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Attendance
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add-attendance.php" class="nav-link ">
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
                    <li class="nav-item has-treeview menu-open">
                        <a href="manage-salary.php" class="nav-link  active">
                            <i class="nav-icon fas fa-user-tag"></i>
                            <p>
                                Salary
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add-salary.php" class="nav-link ">
                                    <i class="nav-icon fa fa-plus "></i>
                                    <p>Add Salary</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage-salary.php" class="nav-link  active">
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
                        <h1 class="m-0 text-dark">HR Department | Employee Salary Management</h1>
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
                            <h3>List of All Salary Details
                            <a href="reports/exportdata-salary.php" class="no-print btn btn-success float-right"><i
                                class="fas fa-file-excel"></i> Export
                            </a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class=" table table-bordered table-hover">

                                <thead>
                                <tr>
                                    <th>Salary ID</th>
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <th>Basic Salary</th>
                                    <th>Over Time</th>
                                    <th>Travelling Allowance</th>
                                    <th>Deduct Amount</th>
                                    <th>Total Salary</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $query = mysqli_query($con, "select p.PayrollID, e.EmpID, e.EmpFLname, monthname(p.Date) as Month, p.Basic, p.OverTime, p.TravelAllowance, p.DeductSalary, (p.Basic + p.OverTime + p.TravelAllowance - p.DeductSalary) as TotalSalary from Payroll as P
                                inner join employee as e on e.EmpID = p.EmpID");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>

                                    <tr>
                                        <td><?php echo $row['PayrollID']; ?></td>
                                        <td><?php echo $row['EmpID']; ?></td>
                                        <td><?php echo $row['EmpFLname']; ?></td>
                                        <td>Rs <?php echo $row['Basic']; ?></td>
                                        <td>Rs <?php echo $row['OverTime']; ?></td>
                                        <td>Rs <?php echo $row['TravelAllowance']; ?></td>
                                        <td>Rs <?php echo $row['DeductSalary']; ?></td>
                                        <td>Rs <?php echo $row['TotalSalary']; ?></td>
                                        <td class="text-center">

                                            <a href="edit-salary.php?pid=<?php echo $row['PayrollID']; ?>">
                                                <i class="fas fa-edit" style="color:blue"></i>
                                            </a>

                                        </td>
                                    </tr>

                                    <?php $cnt++;
                                } ?>
                                </tbody>
                                <tfoot>
                                <tr>

                                    <th>Salary ID</th>
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <th>Basic Salary</th>
                                    <th>Over Time</th>
                                    <th>Travelling Allowance</th>
                                    <th>Deduct Amount</th>
                                    <th>Total Salary</th>
                                    <th>Action</th>
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

