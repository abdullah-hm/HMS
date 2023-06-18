<?php

require_once("../includes/config.php");

// Check & validation
if (!empty($_POST["RoomNo"])) {
    $rno = $_POST["RoomNo"];

    $result = mysqli_query($con, "select * from reservation where Room_id='$rno'");
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo '
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h6><i class="icon fas fa-ban"></i>This Room No is Already reserved.Try Again</h6>
                </div>
        ';
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } else {

        echo '
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h6><i class="icon fas fa-check"></i>Room No available for Booking. </h6>
                </div>
        ';
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}


?>
