<?php
session_start();
session_destroy();
    header('Location: /events4u/home-page/home.php');
    exit();
?>