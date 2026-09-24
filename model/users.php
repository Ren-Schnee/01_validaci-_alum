<?php
$users = [
    [
        "id" => 0,
        "name" => "Daniel Espinosa",
        "username" => "admin",
        "password" => password_hash('123', PASSWORD_DEFAULT),
        "mail" => "toni.fernandez@cirvianum.cat",
        "rol" => "admin",
        "image" => 'default.png'
    ],
    [
        "id" => 1,
        "name" => "Ren Schnee",
        "username" => "ren",
        "password" => password_hash('123', PASSWORD_DEFAULT),
        "mail" => "raquel.boronat@cirvianum.cat",
        "rol" => "user",
        "image" => 'default.png'
    ]
];
$_SESSION['users'] = $users;
