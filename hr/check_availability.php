<?php

require_once("../includes/config.php");
// Check for Branch Code validation
if (!empty($_POST["EmpAtt"])) {
    $eatt = $_POST["EmpAtt"];

    $result = mysqli_query($con, "select * from attendance where EmpID='$eatt' and date(Date) = date(CURDATE())");
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        echo '
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h6><i class="icon fas fa-ban"></i>An Time In attendance is already in the system</h6>
                </div>
        ';
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } else {

        echo '
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h6><i class="icon fas fa-check"></i>TimeIn Attendance Can Add</h6>
                </div>
        ';
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }

}



?>
