<?php
session_start();


if (!isset($_SESSION['barid'])) {
    header('Location:../logout.php');
}
include('../AdminLTE/header.php');
include_once('../includes/config.php');



if (isset($_POST['submit'])) {
//getting post values

    $cusid = $_POST['cus_id'];
    $bname = $_POST['b_name'];
    $bprice = $_POST['b_price'];
    $no_of_bev = $_POST['b_no'];
    $total = $bprice * $no_of_bev;



    $query = "insert into purchase(CusID,BName,BPrice,NoOfBev,TotalPayment) values('$cusid','$bname','$bprice','$no_of_bev','$total')";

    $result = mysqli_query($con, $query);
    if ($result) {
        echo '<script>alert("Beverage info added Successfully.")</script>';
        echo "<script>window.location.href='manage-bev-purchase.php'</script>";
    } else {
        echo "<script>alert('Beverage info went wrong. Please try again.');</script>";
        echo "<script>window.location.href='add-bev-purchase.php'</script>";
    }
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
                        <a href="dashboard.php" class="nav-link">

                            <i class=" nav-icon fas fa-tachometer-alt"></i>

                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview menu-close">
                        <a href="manage-beverage.php" class="nav-link  ">
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
                                <a href="manage-beverage.php" class="nav-link  ">
                                    <i class="nav-icon fas fa-glass-cheers"></i>
                                    <p>Manage Beverage</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview menu-open ">
                        <a href="manage-bev-purchase.php" class="nav-link active ">
                            <i class="nav-icon fas fa-wine-bottle"></i>
                            <p>
                                Customer Purchase
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add-bev-purchase.php" class="nav-link active">
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
                        <h1 class="m-0 text-dark">Bar Department | Add Beverage to Customer</h1>
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

                    <form method="post" name="addbeverage">
                        <!-- SELECT2 EXAMPLE -->
                        <div class="card card-default offset-md-3 col-md-6 col-sm-12">
                            <!-- /.card-header -->



                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-12">
                                        <label>Customer ID</label>
                                        <select class="select2" type="text" name="cus_id"
                                                data-placeholder="Select Customer" style="width: 100%" required>
                                            <option value=""> search Customer</option>
                                            <?php
                                            $customers = mysqli_query($con, "select * from customer");
                                            foreach ($customers as $customer) {

                                                if ($customer) {
                                                    ?>
                                                    <option value="<?= $customer['CusID']; ?>">[<?= $customer['CusID']; ?>] <?= $customer['CusFLName']; ?>
                                                        - <?= $customer['CusContactNo']; ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="error">Customer record not Found</option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Beverage Name</label>
                                        <select class="select2" type="text" name="b_name"
                                                data-placeholder="Select Beverage Name" style="width: 100%" required>
                                            <option value=""> Select Branch</option>
                                            <?php
                                            $beverages = mysqli_query($con, "select * from bar where BStatus='In Stock'");
                                            foreach ($beverages as $bvg) {

                                                if ($bvg) {
                                                    ?>
                                                    <option value="<?= $bvg['BName']; ?>"><?= $bvg['BName']; ?> - Rs <?= $bvg['BPrice']; ?> </option>
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

                                    <div class="form-group col-12">
                                        <label>Beverage Price(Per)</label>
                                        <div class="input-group">
                                            <input type="number" placeholder="Enter Above Beverage Price"
                                                   name="b_price"
                                                   class="form-control" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa fa-money-bill"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>No Of Beverages</label>
                                        <div class="input-group">
                                            <input type="number" placeholder="Enter No Of Beverage"
                                                   name="b_no"
                                                   class="form-control" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa fa-wine-bottle"></i></span>
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

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>



<?php include('../AdminLTE/footer.php') ?>

