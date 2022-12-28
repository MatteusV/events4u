<?php
    if($_SESSION['email']) {
    }
    else {
    header('Location: ../home-page/home.php');
    exit();
    }
?>