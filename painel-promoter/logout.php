<?php
session_start();
session_destroy();
    header('Location: /events4u/login-promoter/index.php');
    exit();
?>