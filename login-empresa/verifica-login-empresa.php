<?php
session_start();
    if($_SESSION['email']) {
    }
    else {
        header('Location: /events4u/login-empresa/index-empresa.php');
        exit();
    }
?>