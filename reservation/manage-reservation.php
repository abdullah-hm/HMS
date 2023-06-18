<?php
session_start();


if (!isset($_SESSION['resid'])) {
    header('Location:../logout.php');
}
include('../AdminLTE/header.php');
include_once('../includes/config.php');

?>


<div class="reservation-dashboard">
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
                    <i class="fas fa fa-user"></i> Mr/Mrs: <b> <?= $_SESSION['resname'] ?> </b>
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
                        <a href="manage-customer.php" class="nav-link ">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Customer
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="manage-room.php" class="nav-link ">
                            <i class="nav-icon fas fa-building "></i>
                            <p>
                                Room
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview menu-open">
                        <a href="manage-reservation.php" class="nav-link  active">
                            <i class="nav-icon fas fa-user-tag"></i>
                            <p>
                                Reservation
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add-reservation.php" class="nav-link">
                                    <i class="nav-icon fa fa-plus "></i>
                                    <p>Add Reservation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage-reservation.php" class="nav-link  active">
                                    <i class="nav-icon fas fa-user-check "></i>
                                    <p>Manage Reservation</p>
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
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Reservation Dashboard | Room Reservation</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Reservation</a></li>
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
                            <h3>All Customer Reserved Room Details
                                <a href="reports/exportdata-customer.php" class="no-print btn btn-success float-right"><i
                                            class="fas fa-file-excel"></i> Export
                                </a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class=" table table-bordered table-hover">

                                <thead>
                                <tr>
                                    <th>Reservation ID</th>
                                    <th>Room No</th>
                                    <th>Customer ID</th>
                                    <th>No Of Adults</th>
                                    <th>No Of Kids</th>
                                    <th>Total Person</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>No Of Days</th>
                                    <th>Total Payment</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php


                                $query = mysqli_query($con, "select * from reservation");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>

                                    <tr>

                                        <td><?php echo $row['Resv_id']; ?></td>
                                        <td><?php echo $row['Room_id']; ?></td>
                                        <td><?php echo $row['CusID']; ?></td>
                                        <td><?php echo $row['CusAdult']; ?></td>
                                        <td><?php echo $row['CusKid']; ?></td>
                                        <td><?php echo $row['TotCus']; ?></td>
                                        <td><?php echo $row['CheckIn']; ?></td>
                                        <td><?php echo $row['CheckOut']; ?></td>
                                        <td><?php echo $row['DaysInHotel']; ?></td>
                                        <td>Rs. <?php echo $row['TotalPayment']; ?></td>
                                        <td class="text-center">
                                            <a href="edit-reservation.php?rid=<?php echo $row['Resv_id']; ?>">
                                                <i class="fas fa-edit" style="color:blue"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <?php $cnt++;
                                } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Reservation ID</th>
                                    <th>Room No</th>
                                    <th>Cus ID</th>
                                    <th>No Of Adults</th>
                                    <th>No Of Kids</th>
                                    <th>Total Person</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>No Of Days</th>
                                    <th>Total Payment</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>


                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<?php include('../AdminLTE/footer.php') ?>

