<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['rsid'])) {
    header('Location:../logout.php');
}

include('../AdminLTE/header.php');
include_once('../includes/config.php');

if ($_GET['action'] == 'delete') {
    $rid = intval($_GET['rid']);
    $query = mysqli_query($con, "delete from room where Room_id='$rid'");
    echo '<script>alert("Record deleted")</script>';
    echo "<script>window.location.href='manage-room.php'</script>";
}
?>

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
                        <a href="manage-room.php" class="nav-link active">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Manage Room
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="add-room.php" class="nav-link ">
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
                    <div class="col-sm-8">
                        <h1 class="m-0 text-dark">Room Service Department  | Room Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-4">
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

                    <!-- ./col -->

                    <div class="card col-lg-12 col-sm-12">
                        <div class="card-header ">
                            <h3>List of All Available Room
                            <a href="reports/exportdata-availableroom.php" class="no-print btn btn-success float-right"><i
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
                                    <th>Room Branch</th>
                                    <th>Room Type</th>
                                    <th>Room Max Person</th>
                                    <th>Room Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
                                        <td class="text-center">

                                            <a href="edit-room.php?rid=<?php echo $row['Room_id']; ?>">
                                                <i class="fas fa-edit" style="color:blue"></i>
                                            </a>&nbsp;|&nbsp;

                                            <a href="manage-room.php?rid=<?php echo $row['Room_id']; ?>&&action=delete"
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
                                    <th>Room No</th>
                                    <th>Room Branch</th>
                                    <th>Room Type</th>
                                    <th>Room Max Person</th>
                                    <th>Room Price</th>
                                    <th>Status</th>
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

