<?php
session_start();
include('includes/config.php');

if (isset($_POST['login'])) {

    $utype = $_POST['usertype'];
    $email = $_POST['email'];
    $Password = md5($_POST['inputpwd']);
    $edpt = $utype;


    if ($utype == 'admin') {

        $admin_query = mysqli_query($con, "select * from admin where  Email='$email' && Password='$Password' ");
        $adminresult = mysqli_fetch_array($admin_query);
        if ($adminresult > 0) {
            $_SESSION['adminid'] = $adminresult['id'];
            $_SESSION['adminname'] = $adminresult['AdminName'];
            header('location: admin/index.php');
        } else {
            echo "<script>alert('Invalid Admin Details.');</script>";
        }

    } elseif ($utype == 'rec') {

        $reception_query = mysqli_query($con, "select * from employee where  EmpEmail='$email' && EmpPwd='$Password' && EmpDept ='$edpt'");
        $recresult = mysqli_fetch_array($reception_query);
        if ($recresult > 0) {
            $_SESSION['recepid'] = $recresult['EmpID'];
            $_SESSION['recepname'] = $recresult['EmpFLname'];
            header('location: reception/index.php');
        } else {
            echo "<script>alert('Invalid Reception Details.');</script>";
        }
    }elseif ($utype == 'res') {

        $reservation_query = mysqli_query($con, "select * from employee where  EmpEmail='$email' && EmpPwd='$Password' && EmpDept ='$edpt'");
        $resresult = mysqli_fetch_array($reservation_query);
        if ($resresult > 0) {
            $_SESSION['resid'] = $resresult['EmpID'];
            $_SESSION['resname'] = $resresult['EmpFLname'];
            header('location: reservation/index.php');
        } else {
            echo "<script>alert('Invalid Reservation Details.');</script>";
        }
    }elseif ($utype == 'hr') {

        $hr_query = mysqli_query($con, "select * from employee where  EmpEmail='$email' && EmpPwd='$Password' && EmpDept ='$edpt'");
        $hrresult = mysqli_fetch_array($hr_query);
        if ($hrresult > 0) {
            $_SESSION['hrid'] = $hrresult['EmpID'];
            $_SESSION['hrname'] = $hrresult['EmpFLname'];
            header('location: hr/index.php');
        } else {
            echo "<script>alert('Invalid HR Details.');</script>";
        }
    }elseif ($utype == 'room') {

        $roomserv_query = mysqli_query($con, "select * from employee where  EmpEmail='$email' && EmpPwd='$Password' && EmpDept ='$edpt'");
        $rs_result = mysqli_fetch_array($roomserv_query);
        if ($rs_result > 0) {
            $_SESSION['rsid'] = $rs_result['EmpID'];
            $_SESSION['rsname'] = $rs_result['EmpFLname'];
            header('location: roomservice/index.php');
        } else {
            echo "<script>alert('Invalid Room Service Details.');</script>";
        }
    }elseif ($utype == 'acc') {

        $account_query = mysqli_query($con, "select * from employee where  EmpEmail='$email' && EmpPwd='$Password' && EmpDept ='$edpt'");
        $acc_result = mysqli_fetch_array($account_query);
        if ($acc_result > 0) {
            $_SESSION['accid'] = $acc_result['EmpID'];
            $_SESSION['accname'] = $acc_result['EmpFLname'];
            header('location: account/index.php');
        } else {
            echo "<script>alert('Invalid Account Department Details.');</script>";
        }
    }elseif ($utype == 'bar') {

        $bar_query = mysqli_query($con, "select * from employee where  EmpEmail='$email' && EmpPwd='$Password' && EmpDept ='$edpt'");
        $bar_result = mysqli_fetch_array($bar_query);
        if ($bar_result > 0) {
            $_SESSION['barid'] = $bar_result['EmpID'];
            $_SESSION['barname'] = $bar_result['EmpFLname'];
            header('location: bar/index.php');
        } else {
            echo "<script>alert('Invalid BAR Department Details.');</script>";
        }
    }elseif ($utype == 'it') {

        $it_query = mysqli_query($con, "select * from employee where  EmpEmail='$email' && EmpPwd='$Password' && EmpDept ='$edpt'");
        $it_result = mysqli_fetch_array($it_query);
        if ($it_result > 0) {
            $_SESSION['itid'] = $it_result['EmpID'];
            $_SESSION['itname'] = $it_result['EmpFLname'];
            header('location: it/index.php');
        } else {
            echo "<script>alert('Invalid IT Department Details.');</script>";
        }
    }
    else {
        echo "<script>alert('Invalid Details. Please Try Again..!');</script>";
    }




}
?>


<?php include('includes/login-header.php'); ?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">
            <h3 align="center" style="margin-top:4%;color:#fff">WELCOME TO LAK DERANA</h3>
            <div class="card o-hidden border-0 shadow-lg my-5">

                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <form name="login" method="post">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block  ">
                                <a href="index.php">
                                    <img src="https://wallpaperaccess.com/full/2690557.jpg"
                                         width="460px" height="420px">
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Sign In</h1>
                                    </div>
                                    <form class="user">

                                        <div class="form-group">
                                            <select name="usertype" class="form-control" required>
                                                <option value="">Select Department</option>
                                                <option value="rec">Reception Department</option>
                                                <option value="res">Reservation Department</option>
                                                <option value="room">Room Service Department</option>
                                                <option value="hr">HR Department</option>
                                                <option value="acc">Account Department</option>
                                                <option value="bar">Bar Department</option>
                                                <option value="it">IT Department</option>
                                                <option value="admin">Admin Department</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email"
                                                   id="email" placeholder="Enter Email ID" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="inputpwd"
                                                   id="inputpwd" placeholder="Enter Password" required>
                                        </div>
                                        <input type="submit" name="login" class="btn btn-primary btn-user btn-block"
                                               value="login">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="medium" href="#" style="font-weight:bold">Forgot
                                            Password?</a>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>

<?php include('includes/login-footer.php'); ?>