<?php
session_start();
    if($_SESSION['email']) {
    }
    else {
    header('Location: /events4u/login-promoter/index.php');
    exit();
    }
?>