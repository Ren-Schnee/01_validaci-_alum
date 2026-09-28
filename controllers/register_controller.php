<?php
session_start();
include('../functions/user_functions.php');
include('../functions/image_functions.php');
// 1. comprovar REQUEST_METHOD
// 2. comporvar isset dels parametres
// 3. comprovar que les contrasenyes coincideixen
// 4. comprovar regex usernaem, password, email
// 5. comprovar si l'usuari existeix
// 6. tractar iamtge usauri (ho fem més tard)
// 7. desar imatge o assignar default
// 8. desar usuari
// 9. Tornar a la vista del registre --> mostrar missatge exit
//10- O bé, entrar a l'app --> desar usuari logejat

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

        //Si contrasenyes son diferents retornar a la vista amb un missatge d'error


        //Si no es cumpleix el regex del username retornar a la vista amb un missatge d'error
        //Si no es cumpleix el regex del password retornar a la vista amb un missatge d'error

        //comporvar si el mail es un mail
        if (!checkMail($mail)) {
            //Retornar a la vista amb un missatge d'error
        }

        //Si l'usuari existeix retornar a la vista un missatge

        //print_R($_FILES['image']); <-- commentat per proves

        if (isset($_FILES['image'])) {
            $image = $_FILES['image'];
            $imageName = checkImageProfile($image);
            $uploadDir = "../public/images/profile/";
            $destination = $uploadDir . $imageName;
            move_uploaded_file($image['tmp_name'], $destination); //
        } else {
            $imageName = 'default.png';
        }

        $newUser = [
            "id" => count($_SESSION['users']),
            "name" => $name,
            "username" => $username,
            //Desem el password encriptat
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "mail" => $mail,
            "rol" => "user",
            "image" => $imageName
        ];

        array_push($_SESSION['users'],$newUser);

        //decidir di redirigir a la vista del register amb un missatge usuari creat
        //redirigir a l'aplciació, si fem això cal crear $_SESSION['user_logged]

        // login automàtic després del registre
        $_SESSION['user_logged'] = $newUser;

        header('Location: ../views/home.php');
        exit;
    }
}
