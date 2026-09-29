<?php
session_start();
$_SESSION['cart'] = $_SESSION['cart'] ?? [];
$cart = $_SESSION['cart'];

$id = $_POST['id'];

include("../functions/product_functions.php");

$products = $_SESSION['products'];

//rebem el id dels productes
$product = getProductById($id, $products);

$productInCart = getProductById($id, $cart);

if ($productInCart != null) {

    foreach ($cart as $key => $item) {

        if ($item['id'] == $id) {
            $cart[$key]['qty']++;
        }
    }
} else {

    $product['qty'] = 1;

    array_push($cart, $product);
}

$_SESSION['cart'] = $cart; // ← Always save back to session
header('Location: ../views/products.php');
exit;
