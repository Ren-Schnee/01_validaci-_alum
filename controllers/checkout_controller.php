<?php
session_start();

if (isset($_POST['confirm_purchase']) && !empty($_SESSION['cart'])) {

    //echo prova
    //echo "Hola hola hola";

	$userId = $_SESSION['user']['id'];
	$cart = $_SESSION['cart'];
	$date = date('Y-m-d H:i:s');

	$order = [
		'user_id' => $userId,
		'date' => $date,
		'cart' => $cart,
	];

	if (!isset($_SESSION['history'])) {
		$_SESSION['history'] = [];
	}

	array_push($_SESSION['history'], $order);

    unset($_SESSION['cart']);

    //print_r($_SESSION['history']);

    header('Location: ../controllers/history_controller.php');
    exit;
}
?>