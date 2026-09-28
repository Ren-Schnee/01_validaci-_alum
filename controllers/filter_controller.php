<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Recuperem els productes de la variable sessio
    $products = $_SESSION['products'];

    //recuperem la info del formunari
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];




    $filterProducts = [];

    foreach ($products as $product) {
        $nameOk = true;
        $categoryOk = true;
        $priceOk = true;

        if ($name != '') {
            //stripos() serveix per buscar un text dins un altre text
            $position = stripos($product['name'], $name);
            if ($position !== false) {
                $nameOk = true;
            } else {
                $nameOk = false;
            }
        }

        if ($category != '' && $product['category'] != $category) {
            $categoryOk = false;
        }

        if ($price != '' && $product['price'] >= $price) {
            $priceOk = false;
        }

        if ($nameOk && $categoryOk && $priceOk) {
            array_push($filterProducts, $product);
            //$filterProducts[]=$product;
        }

        
    }
    $_SESSION['filterProducts'] = $filterProducts;

    header('Location: ../views/products.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if (isset($_GET['delete'])) {
        unset($_SESSION ['filterProducts']);
        header('Location: ../views/products.php');
        exit;
    }
}