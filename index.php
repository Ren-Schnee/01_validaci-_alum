<?php
//L'index ha de carregar el model i redirigir al home
session_start();
include('./model/users.php');
include('./model/products.php');
include('./model/categories.php');
include('./config/config.php');
header('Location: ./views/home.php');
exit;

?>
