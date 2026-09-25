<?php
function checkImageProfile($image) {
    if($image['error']!= UPLOAD_ERR_OK){
        header('Location: ../view/register.php?error=1');
        exit;
    }

    $allowedTypesImage=[
        'image/jpeg',
        'image/png',
        'image/webp'
    ];

    if (!in_array($image['type'],$allowedTypesImage)){
        header('Location: ../view/register.php?error=2');
        exit;
    }

    //funcio per comprovar extensio del fitxer
    $extension = match (($allowedTypesImage)) {
         'image/jpeg' => 'jpg',
         'image/png' => 'png',
         'image/webp' => 'webp'
    };

    //funcio per generar el nom
    $newName = uniqid("profile_", true) . "." . $extension;
    return $newName;
}
?>