<?php
session_start();
    if($_SESSION['email']) {
    }
    else {
    header('Location: ../login-promoter/index.php');
    exit();
    }
?>