<?php
session_start();
include('../functions/user_functions.php');
include('../functions/image_functions.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (
            isset($_POST['name']) &&
            isset($_POST['username']) &&
            isset($_POST['pass1']) &&
            isset($_POST['pass2']) &&
            isset($_POST['mail']) 
        ) {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['pass1'];
            $password2 = $_POST['pass2'];
            $mail = $_POST['mail'];

            if (!checkMail($mail)) {
                $_SESSION['error'] = 'El correu electrònic no és vàlid';
                header('Location: ../views/register.php');
                exit();
            }

            //si usuari existeix retornar a la vista un missatge

            print_R($_FILES['image']);

            if (isset($_FILES['image'])){
                $image = $_FILES['name'];
                $imageName = checkImageProfile($image);
                $uploadDir = "../public/images/profile/";
                $destination = $uploadDir.$imageName;
                move_uploaded_file($_FILES['tmp_name'], $destination);
            } else{
                $imageName = 'default.png';
            }

            $newUser = [
                "id" => count($_SESSION['users']),
                "name" => $name,
                "username" => $username,
                "password" => $password,
                "mail" => $mail,
                "rol" => "user",
                "image" => $imageName
            ];

            array_push($_SESSION['users'],$newUser);

            //decidir si redirigir a la vista del register amb un missatge de usuari creat

            //O redirigir a l'aplicacio directament (fer login immediat), si fem aixo cal crear $_SESSION['user_logged']
        }
    }