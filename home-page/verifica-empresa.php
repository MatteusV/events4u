<?php
session_start();
    if($_SESSION['email']) {
    }
    else {
        header('Location: /opt/lampp/htdocs/events4u/home-page/home.php');
        exit();
    }
?>