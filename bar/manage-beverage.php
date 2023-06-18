<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['barid'])) {
    header('Location:../logout.php');
}

include('../AdminLTE/header.php');
include_once('../includes/config.php');

if ($_GET['action'] == 'delete') {
    $bid = intval($_GET['bid']);
    $query = mysqli_query($con, "delete from bar where Bid='$bid'");
    echo '<script>alert("Record deleted")</script>';
    echo "<script>window.location.href='manage-beverage.php'</script>";
}
?>

<div class="bar-dashboard">
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
                    <i class="fas fa fa-user"></i> Mr/Mrs: <b> <?= $_SESSION['barname'] ?> </b>
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


                    <li class="nav-item has-treeview menu-open ">
                        <a href="manage-beverage.php" class="nav-link active">
                            <i class="nav-icon fas fa-glass-cheers"></i>
                            <p>
                                Beverage
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add-beverage.php" class="nav-link">
                                    <i class="nav-icon fas fa-cocktail"></i>
                                    <p>Add Beverage</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage-beverage.php" class="nav-link active ">
                                    <i class="nav-icon fas fa-glass-cheers"></i>
                                    <p>Manage Beverage</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview menu-close">
                        <a href="manage-bev-purchase.php" class="nav-link  ">
                            <i class="nav-icon fas fa-wine-bottle"></i>
                            <p>
                                Customer Purchase
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add-bev-purchase.php" class="nav-link">
                                    <i class="nav-icon fas fa-user-plus"></i>
                                    <p>Add Bevg to Customer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage-bev-purchase.php" class="nav-link  ">
                                    <i class="nav-icon fas fa-users "></i>
                                    <p>Manage Bevg Purchase</p>
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
                        <h1 class="m-0 text-dark">Bar Department  | Beverages Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Bar</a></li>
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
                            <h3>List of All Beverages
                                <a href="reports/exportdata-beverage.php" class="no-print btn btn-success float-right"><i
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
                                    <th>Beverage Tag No</th>
                                    <th>Available Branch</th>
                                    <th>Beverage Name</th>
                                    <th>Beverage Price</th>
                                    <th>Status</th>
                                    <th class="no-print">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $query = mysqli_query($con, "select * from bar");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>

                                    <tr>
                                        <td><?php echo $cnt; ?></td>
                                        <td><?php echo $row['BNo']; ?></td>
                                        <td><?php echo $row['BBCode']; ?></td>
                                        <td><?php echo $row['BName']; ?></td>
                                        <td>Rs <?php echo $row['BPrice']; ?></td>
                                        <td><?php echo $row['BStatus']; ?></td>
                                        <td class="text-center no-print">

                                            <a href="edit-beverage.php?bid=<?php echo $row['Bid']; ?>">
                                                <i class="fas fa-edit" style="color:blue"></i>
                                            </a>&nbsp;|&nbsp;

                                            <a href="manage-beverage.php?bid=<?php echo $row['Bid']; ?>&&action=delete"
                                               onclick="return confirm('Do you really want to delete this record?');">
                                                <i class="fas fa fa-trash " aria-hidden="true" style="color:red"
                                                   title="Delete this record"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <?php $cnt++;
                                } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Beverage Tag No</th>
                                    <th>Available Branch</th>
                                    <th>Beverage Name</th>
                                    <th>Beverage Price</th>
                                    <th>Status</th>
                                    <th class="no-print">Action</th>
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

