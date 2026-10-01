<?php
session_start();
//carreguem funcions de producte
include ('../functions/product_functions.php');


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action']) && isset($_GET['id'])) {
        $action = $_GET['action'];
        $id = $_GET['id'];

        //si s'ha clicat a "-" restem qty
        if ($action == 'remove') {
            foreach ($_SESSION['cart'] as $key => $product) {
                if ($product['id'] == $id) {
                    $_SESSION['cart'][$key]['qty']--;
                    //si qty=0 eliminem producte del carret
                    if ($_SESSION['cart'][$key]['qty']==0) {
                        unset($_SESSION['cart'][$key]);
                    }
                }
            }
        }
        //si s'ha clicat a "+" augmentem qty
        if ($action == 'add') {
            foreach ($_SESSION['cart'] as $key => $product) {
                if ($product['id'] == $id) {
                    $_SESSION['cart'][$key]['qty']++;
                }
            }
        }

        header ('Location: ../views/cart.php');
        exit();
    }

}