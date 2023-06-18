<?php
session_start();


if (!isset($_SESSION['resid'])) {
    header('Location:../logout.php');
}
include('../AdminLTE/header.php');
include_once('../includes/config.php');


if (isset($_POST['submit'])) {
//getting post values

    $roomid = $_POST['room_no'];
    $cusid = $_POST['cus_id'];
    $no_of_adults = $_POST['no_of_adults'];
    $no_of_kids = $_POST['no_of_kids'];
    $totperson = $no_of_adults + $no_of_kids;

    $checkin = $_POST['check_in'];

    $checkout = $_POST['check_out'];

    function dateDiff($checkin, $checkout)
    {
        $date1_ts = strtotime($checkin);
        $date2_ts = strtotime($checkout);
        $diff = $date2_ts - $date1_ts;
        return round($diff / 86400);
    }
    $dateDiff = dateDiff($checkin, $checkout);
    $no_of_days = $dateDiff;

    $room_price = $_POST['room_price'];

    $totalpayment = $no_of_days * $room_price;



    $query = "insert into reservation(Room_id,CusID,CusAdult,CusKid,TotCus,CheckIn,CheckOut,DaysInHotel,TotalPayment) 
values('$roomid','$cusid','$no_of_adults','$no_of_kids','$totperson','$checkin','$checkout','$no_of_days','$totalpayment')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo '<script>alert("Reservation info added Successfully.")</script>';
        echo "<script>window.location.href='manage-reservation.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
        echo "<script>window.location.href='add-reservation.php'</script>";
    }
}

?>

<script>

    function roomnoAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'RoomNo=' + $("#RoomNo").val(),
            type: "POST",
            success: function (data) {
                $("#room-no-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }

</script>


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
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
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
                        <a href="dashboard.php" class="nav-link">

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
                                <a href="add-reservation.php" class="nav-link active">
                                    <i class="nav-icon fa fa-plus "></i>
                                    <p>Add Reservation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage-reservation.php" class="nav-link  ">
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
                        <h1 class="m-0 text-dark">Reservation Department | Add Reservation</h1>
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

                    <form method="post" name="addreservation">
                        <!-- SELECT2 EXAMPLE -->
                        <div class="card card-default">
                            <!-- /.card-header -->

                            <span id="room-no-availability-status"></span>

                            <div class="card-body">
                                <div class="row">


                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>Room No</label>
                                        <div class="input-group">
                                            <input type="text" placeholder="Enter Room No" maxlength="6" minlength="1"
                                                   name="room_no" id="RoomNo"
                                                   class="form-control" onblur="roomnoAvailability()" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-building"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>Room Price(Per Day)</label>
                                        <select class="select2" type="text" name="room_price"
                                                data-placeholder="Select Customer" style="width: 100%" required>
                                            <option value=""> search Customer</option>
                                            <?php
                                            $rooms = mysqli_query($con, "select * from room where RoomStatus='Available'");
                                            foreach ($rooms as $room) {

                                                if ($room) {
                                                    ?>
                                                    <option value="<?= $room['RoomPrice']; ?>">Room No:[<?= $room['RoomNo']; ?>] = Rs.<?= $room['RoomPrice']; ?>/= [ <?= $room['RoomBCode']; ?> / <?= $room['RoomType']; ?> / (<?= $room['MaxPerson']; ?>)]</option>
                                                    <?php

                                                } else {
                                                    ?>
                                                    <option value="error">Room Records Not Found</option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>Customer ID</label>
                                        <select class="select2" type="text" name="cus_id"
                                                data-placeholder="Select Customer" style="width: 100%" required>
                                            <option value=""> search Customer</option>
                                            <?php
                                            $customers = mysqli_query($con, "select * from customer");
                                            foreach ($customers as $customer) {

                                                if ($customer) {
                                                    ?>
                                                    <option value="<?= $customer['CusID']; ?>">[<?= $customer['CusID']; ?>
                                                        ] <?= $customer['CusFLName']; ?>
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

                                    <div class="form-group col-sm-6 col-md-6 ">
                                        <label>No Of Adults</label>
                                        <select name="no_of_adults" class="form-control" required>
                                            <option value="">Select No Of Adults</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6 ">
                                        <label>No Of Kids</label>
                                        <select name="no_of_kids" class="form-control" required>
                                            <option value="">Select No Of Kids</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>Check In</label>
                                        <div class="input-group date" id="checkindate" data-target-input="nearest">
                                            <input type="text" name="check_in" class="form-control datetimepicker-input"
                                                   data-target="#checkindate" maxlength="<?= date("Y/m/d"); ?>"
                                                   required/>
                                            <div class="input-group-append" data-target="#checkindate"
                                                 data-toggle="datetimepicker">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>Check Out</label>
                                        <div class="input-group date" id="checkoutdate" data-target-input="nearest">
                                            <input type="text" name="check_out"
                                                   class="form-control datetimepicker-input"
                                                   data-target="#checindate" maxlength="<?= date("Y/m/d"); ?>"
                                                   required/>
                                            <div class="input-group-append" data-target="#checkoutdate"
                                                 data-toggle="datetimepicker">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6 py-lg-4">
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

