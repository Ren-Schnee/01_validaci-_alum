<?php
session_start();
include('../functions/user_functions.php');
// 1. comprovar REQUEST_METHOD
// 2. comporvar isset dels parametres
// 3. comprovar login 
// 4. Guardar usuari logejat
// 5. Redirigir a l'app

if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (
    isset($_POST['username']) &&
    isset($_POST['password'])
) {

    $username = $_POST['username'];
    $password=$_POST['password'];
        
    if (checkLogin($username,$password,$_SESSION['users'])) {
        //creem la variables de sessio per guardar l'usuari autenticat
        $_SESSION['user_logged']=checkLogin($username,$password,$_SESSION['users']);
        header('Location: ../views/products.php');
        exit;
    }

    //el cas del else
    //redirigir a la vista de Login amb l'error de credencials incorectes

    }
}


