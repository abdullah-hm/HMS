<?php


session_start();
error_reporting(0);

if (!isset($_SESSION['rsid'])) {
    header('Location:../logout.php');
}

include('../AdminLTE/header.php');
include_once('../includes/config.php');


if (isset($_POST['submit'])) {
//getting post values

    $roomno = $_POST['room_no'];
    $roombc = $_POST['room_bc'];
    $roomtype = $_POST['room_type'];
    $roommax = $_POST['room_mp'];
    $roomprice = $_POST['room_price'];
    $roomstatus = $_POST['room_status'];


    $query = "insert into room(RoomNo,RoomBCode,RoomType,MaxPerson,RoomPrice,RoomStatus) values('$roomno','$roombc','$roomtype','$roommax','$roomprice','$roomstatus')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo '<script>alert("Room info added Successfully.")</script>';
        echo "<script>window.location.href='manage-beverage.php'</script>";
    } else {
        echo "<script>alert('Room info went wrong. Please try again.');</script>";
        echo "<script>window.location.href='add-beverage.php'</script>";
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
                $("#roomno-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }
</script>

<div class="roomservice-dashboard">
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
                    <i class="fas fa fa-user"></i> Mr/Mrs: <b> <?= $_SESSION['rsname'] ?> </b>
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
                        <a href="manage-room.php" class="nav-link ">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Manage Room
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="add-room.php" class="nav-link active">
                            <i class="nav-icon far fa-building "></i>
                            <p>
                                Add Room
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
                        <h1 class="m-0 text-dark">Lak Derana | Add Room</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Room Service</a></li>
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

                    <form method="post" name="addroom">
                        <!-- SELECT2 EXAMPLE -->
                        <div class="card card-default">
                            <!-- /.card-header -->

                            <span id="roomno-availability-status"></span>

                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>Room No</label>
                                        <div class="input-group">
                                            <input type="text" maxlength="10"
                                                   name="room_no" id="RoomNo" placeholder="Enter Room No"
                                                   required
                                                   class="form-control"
                                                   onblur="roomnoAvailability()" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-building"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>Branch</label>
                                        <select class="select2" type="text" name="room_bc"
                                                data-placeholder="Select Branch" style="width: 100%" required>
                                            <option value=""> Select Branch</option>
                                            <?php
                                            $branches = mysqli_query($con, "select * from branch");
                                            foreach ($branches as $branch) {

                                                if ($branch) {
                                                    ?>
                                                    <option value="<?= $branch['BranchCode']; ?>"><?= $branch['BranchName'];; ?></option>
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


                                    <div class="form-group col-sm-6 col-md-6 ">
                                        <label>Room Type</label>
                                        <select name="room_type" class="form-control" required>
                                            <option value="">Select Room Type</option>
                                            <option value="Single Room">Single Room</option>
                                            <option value="Twin Bed Room">Twin Bed Room</option>
                                            <option value="Family Room">Family Room</option>
                                            <option value="Deluxe Room">Deluxe Room</option>
                                        </select>
                                    </div>


                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>Room Max Person</label>
                                        <div class="input-group">
                                            <input type="number" placeholder="Enter Maximum Person Capacity"
                                                   name="room_mp"
                                                   class="form-control" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa fa-users"></i></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-sm-6 col-md-6">
                                        <label>Room Price (Per Day)</label>
                                        <div class="input-group">
                                            <input type="number" placeholder="Enter Room Price Based On Room Type"
                                                   name="room_price"
                                                   class="form-control" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa fa-money-bill"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6 ">
                                        <label>Room Status</label>
                                        <select name="room_status" class="form-control" required>
                                            <option value="">Select Room Status</option>
                                            <option value="Available">Available</option>
                                            <option value="Maintenance">Maintenance</option>
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

