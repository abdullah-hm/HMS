

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
                        <a href="payment.php" class="nav-link active">
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
                        <h1 class="m-0 text-dark">Admin Department | Payment</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Admin</a></li>
                            <li class="breadcrumb-item active">Payment</li>
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
            <h3>List of All Payment Details
                <a href="reports/exportdata-payment.php" class="no-print btn btn-success float-right"><i
                    class="fas fa-file-excel"></i> Export
                </a>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class=" table table-bordered table-hover">

                <thead>
                    <tr>
                        <th>Payment ID</th>
                        <th>Customer Name</th>
                        <th>Total Amount</th>
                        <th>Discount</th>
                        <th>Paid Amount</th>
                        <th>Due Amount</th>
                        <th>Payment Type</th>
                        <th>Payment Date</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query = mysqli_query($con, "select p.PayID, e.EmpID, e.EmpFLname, c.CusID, c.CusFLName, p.PaymentDate, p.PaymentType, p.Amount, p.Discount, p.PaidAmount, p.DueAmount, PaymentStatus from payment as P
                        left join customer as c on c.CusID = p.CusID
                        left join employee as e on e.EmpID = p.EmpID");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($query)) {
                        ?>

                        <tr>
                            <td><?php echo $row['PayID']; ?></td>
                            <td><?php echo $row['CusFLName']; ?></td>
                            <td><?php echo $row['Amount']; ?></td>
                            <td><?php echo $row['Discount']; ?></td>
                            <td><?php echo $row['PaidAmount']; ?></td>
                            <td><?php echo $row['DueAmount']; ?></td>
                            <td><?php echo $row['PaymentType']; ?></td>
                            <td><?php echo $row['PaymentDate']; ?></td>
                            <td><?php echo $row['PaymentStatus']; ?></td>
                            <td class="text-center">

                                <a href="edit-Payment.php?pid=<?php echo $row['PayID']; ?>">
                                    <i class="fas fa-edit" style="color:blue"></i>
                                </a>
                            </td>
                        </tr>

                        <?php $cnt++;
                    } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Payment ID</th>
                        <th>Customer Name</th>
                        <th>Total Amount</th>
                        <th>Discount</th>
                        <th>Paid Amount</th>
                        <th>Due Amount</th>
                        <th>Payment Type</th>
                        <th>Payment Date</th>
                        <th>Payment Status</th>
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
