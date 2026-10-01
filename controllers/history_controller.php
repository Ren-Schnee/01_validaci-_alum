<?php
session_start();

if (!isset($_SESSION['user']['id'])) {
    header('Location: ../views/login.php');
    exit;
}

$userId = $_SESSION['user']['id'];
$history = $_SESSION['history'] ?? [];
$userHistory = [];

foreach ($history as $order) {
    if (isset($order['user_id']) && $order['user_id'] == $userId) {
        $userHistory[] = $order;
    }
}

// Keep the filtered history in the session so the view can access it after redirect.
$_SESSION['user_history'] = $userHistory;

header('Location: ../views/history.php');
exit;