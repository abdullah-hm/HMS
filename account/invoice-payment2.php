<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['accid'])) {
    header('Location:../logout.php');
}
include('../AdminLTE/header.php');
include_once('../includes/config.php');

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
                        <a href="manage-salary.php" class="nav-link ">
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
                        <a href="invoice-payment.php" class="nav-link active">
                            <i class="nav-icon fas fa-money-bill"></i>
                            <p>
                                Invoice
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="logout.php" class="nav-link">
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
                        <h1 class="m-0 text-dark">Generated Customer Payment Invoice</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Invoice</a></li>
                            <li class="breadcrumb-item active">Generated Invoice</li>
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

                    <div class="container card">
                        <div class="card-body" id="invoice">
                            <form action="#" method="post">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">
                                        <h3>
                                            <i class="fas fa-building "></i> Lak Derana (Pvt) Ltd
                                            <small class="float-right">Date: <span id="datetime"></span> </small>
                                            <script>
                                                var dt = new Date();
                                                document.getElementById("datetime").innerHTML = (("0" + dt.getDate()).slice(-2)) + "/" + (("0" + (dt.getMonth() + 1)).slice(-2)) + "/" + (dt.getFullYear());
                                            </script>
                                        </h3>
                                    </div>
                                    <!-- /.col -->
                                </div>

                                <!-- info row -->

                                <?php

                                $query = mysqli_query($con, "select * from customer as c left join branch as b on c.CusBCode = b.BranchCode where CusID = 1");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 col-md-4 invoice-col">
                                            <div>
                                                <strong>Check In Date: </strong> 2022/01/05<br>
                                                <strong>Check Out Date: </strong> 2022/01/09<br>
                                            </div>
                                        </div>

                                        <div class=" col-sm-4 col-md-4 invoice-col ">
                                            <div>
                                                <strong>Customer ID : </strong> <?php echo $row['CusID']; ?> <br>
                                                <strong>Customer Mobile
                                                    No: </strong> <?php echo $row['CusContactNo']; ?> <br>
                                            </div>
                                        </div>

                                        <div class=" col-sm-4 col-md-4 invoice-col ">
                                            <div>
                                                <strong>Branch Name : </strong> <?php echo $row['BranchName']; ?> <br>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.row -->
                                    <?php $cnt++;
                                } ?>

                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <br>
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Description</th>
                                                <th>Total</th>

                                            </tr>
                                            </thead>

                                            <tbody>

                                            <tr>
                                                <td>1</td>
                                                <td>Twin Bed Rom</td>
                                                <td>Rs. 12000</td>

                                            </tr>

                                            <tr>
                                                <td>2</td>
                                                <td>Coca Cola - 500ml</td>
                                                <td>Rs. 1500/=</td>

                                            </tr>

                                            <tr>
                                                <td>2</td>
                                                <td>Pepsi - 1L</td>
                                                <td>Rs. 1500/=</td>

                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-5 col-sm-12">
                                        <div class="table-responsive">
                                            <p class="lead col-sm-12 col-md-12">Payment Summary:</p>

                                            <table class="table table-bordered">


                                                <tr>
                                                    <th style="width:50%"> Subtotal:</th>
                                                    <td>Rs. 15000/=</td>
                                                </tr>
                                                <tr>
                                                    <th>Discount($total_discount%):</th>
                                                    <td>Rs. - 0/=</td>
                                                </tr>
                                                <tr>
                                                    <th>Grand Total:</th>
                                                    <th>Rs. 15000/=</th>
                                                </tr>


                                            </table>

                                            <div class="no-print col-sm-12 col-md-12">

                                                <div class="offset-3  col-6">
                                                    <a class="btn btn-success" href="pay.php" type="submit"
                                                       name="Pay_Now"
                                                       class="btn btn-success"><i
                                                                class="far fa-credit-card"></i> Pay
                                                    </a>
                                                    <a href="#" class="no-print btn btn-warning float-right"
                                                       onclick="window.print();"><i
                                                                class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br> <br> <br>
                            </form>
                            <div class="card-footer">
                                <h3 class="text-center">Thank You </h3>
                            </div>
                        </div>

                    </div>
                    <!-- ./col -->

                </div>

        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
</div>
<?php include('../AdminLTE/footer.php') ?>




