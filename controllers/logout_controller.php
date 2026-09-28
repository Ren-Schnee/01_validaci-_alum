<?php
session_start();

//1. eliminar variable sessio usuari logejat
unset($_SESSION['user_logged']);

//2. redirigir
header('Location: ../views/home.php');
exit;