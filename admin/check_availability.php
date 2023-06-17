<?php

require_once("../includes/config.php");
// Check for Branch Code validation
if (!empty($_POST["branch_code"])) {
    $bcode = $_POST["branch_code"];

    $result = mysqli_query($con, "select id from branch where BranchCode='$bcode'");
    $count = mysqli_num_rows($result);
    if ($count > 0) {

        echo "<span class='text-danger text-bold'>Branch Code already exists. Please try Again.</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } else {

        echo "<span class='text-success text-bold'>Branch Code Available for Registration .</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}


// Check Email Validation
if (!empty($_POST["EmpMail"])) {
    $email = $_POST["EmpMail"];

    $result = mysqli_query($con, "select * from employee where EmpEmail='$email'");
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo '
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h6><i class="icon fas fa-ban"></i>Employee Info already exists.Try Again</h6>
                </div>
        ';
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } else {

        echo '
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h6><i class="icon fas fa-check"></i> Employee Info available for Registration. </h6>
                </div>
        ';
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}


?>
