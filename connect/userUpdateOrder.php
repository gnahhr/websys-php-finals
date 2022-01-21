<?php
    include './session.php';
    require_once './config.php';

    $statement = $pdo -> prepare ("UPDATE salesHistory SET status = :status WHERE orderID = :orderID");
    $statement -> execute([
        ':status' => $_GET['action'],
        ':orderID' => $_GET['orderID']
    ]);

    // If action = complete add totalPrice to owner's balance.
    // If action = returned deduct totalPrice to owner's balance.

    Header("Location: ../pages/order-history.php");
?>