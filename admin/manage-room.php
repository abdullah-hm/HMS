<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['adminid'])) {
    header('Location:../logout.php');
}

include('../AdminLTE/header.php');
include_once('../includes/config.php');
?>

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
                        <a href="dashboard.php" class="nav-link">

                            <i class=" nav-icon fas fa-tachometer-alt"></i>

                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview menu-close">
                        <a href="manage-branch.php" class="nav-link">
                            <i class="nav-icon fa fa-braille"></i>
                            <p>
                                Branch
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add-branch.php" class="nav-link">
                                    <i class="nav-icon fas fa-hospital "></i>
                                    <p>Add Branch</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage-branch.php" class="nav-link">
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
                        <a href="manage-room.php" class="nav-link active">
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
                        <h1 class="m-0 text-dark">Admin Department | Room Management </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Admin</a></li>
                            <li class="breadcrumb-item active">Room</li>
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
            <h3>List of All Rooms
            <a href="reports/exportdata-rooms.php" class="no-print btn btn-success float-right"><i
                            class="fas fa-file-excel"></i> Export
                </a>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class=" table table-bordered table-hover">

                <thead>
                <tr>
                    <th>ID</th>
                    <th>Room No</th>
                    <th>Branch</th>
                    <th>Room Type</th>
                    <th>Max Person Count</th>
                    <th>Room Price</th>
                    <th>Room Status</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $query = mysqli_query($con, "select * from room");
                $cnt = 1;
                while ($row = mysqli_fetch_array($query)) {
                    ?>

                    <tr>
                        <td><?php echo $cnt; ?></td>
                        <td><?php echo $row['RoomNo']; ?></td>
                        <td><?php echo $row['RoomBCode']; ?></td>
                        <td><?php echo $row['RoomType']; ?></td>
                        <td><?php echo $row['MaxPerson']; ?></td>
                        <td><?php echo $row['RoomPrice']; ?></td>
                        <td><?php echo $row['RoomStatus']; ?></td>
                    </tr>

                    <?php $cnt++;
                } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Room No</th>
                    <th>Branch</th>
                    <th>Room Type</th>
                    <th>Max Person Count</th>
                    <th>Room Price</th>
                    <th>Room Status</th>
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

