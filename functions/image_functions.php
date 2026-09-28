<?php

function checkImageProfile($image)
{
    if ($image['error'] != UPLOAD_ERR_OK) {
        header('Location: ../views/register.php?error=1');
        exit;
    }

    //comprovar la mida de la imatge


    //Formats d'imatge permessos
    $alloweTypesImage = [
        'image/jpeg',
        'image/png',
        'image/webp'
    ];

    
    if (!in_array($image['type'], $alloweTypesImage)) {
        header('Location: ../views/register.php?error=2');
        exit;
    }

    //extensio del fitxer, afegim el punt al davant
    $extension = ".".match ($image['type']) {
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp'
    };

    //generar el nom
    $newName = uniqid("profile_").$extension;

    return $newName;
}
