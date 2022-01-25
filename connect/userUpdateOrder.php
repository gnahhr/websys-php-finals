<?php
    include './session.php';
    require_once './config.php';

    $statement = $pdo -> prepare ("UPDATE transactionlog SET status = :status WHERE transactionID = :transactionID");
    $statement -> execute([
        ':status' => $_GET['action'],
        ':transactionID' => $_GET['transactionID']
    ]);

    // If action = complete add totalPrice to owner's balance.
    // If action = returned deduct totalPrice to owner's balance.

    Header("Location: ../pages/order-history.php");
?>