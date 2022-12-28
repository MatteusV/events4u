<?php
session_start();
session_destroy();
    header('Location: ../login-empresa/index-empresa.php');
    exit();
?>