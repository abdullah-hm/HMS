<?php

session_start();

if (strlen($_SESSION['resid'] == 0)) {
    header('location:../logout.php');
} else{
    header('location:dashboard.php');
}
?>
