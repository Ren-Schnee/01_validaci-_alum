<?php
session_start();
include('./config/config.php');
include('./model/users.php');
header('Location: ../views/home.php');
exit;
?>
