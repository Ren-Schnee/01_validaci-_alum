<?php
session_start();
include('../functions/user_functions.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["username"]) && isset($_POST["password"])) {
         
        $username = $_POST["username"];
        $password = $_POST["password"];
        if(checkLogin($username,$password,$_SESSION['users'])){
            //creem la variable de sessio per guardar l'usuari autenticat
            $_SESSION['user_logged']=checkLogin($username,$password,$_SESSION['users']);
            header('Location: ../views/products.php');
            exit;
        }  
        }
    }
?>       