<?php
    include './session.php';
    require_once './config.php';

    foreach ($_SESSION['orders'] as $order){
        $statement = $pdo -> prepare ("INSERT INTO salesHistory(productID, productName, quantity, totalPrice, dateBought, buyerID, status)
        VALUES (
            :productID,
            :productName,
            :quantity,
            :totalPrice,
            current_timestamp(),
            :buyerID,
            'Shipping'
        )");

        $statement -> execute([
            ':productID' => $order['productID'],
            ':productName' => $order['productName'],
            ':quantity' => $order['quantity'],
            ':totalPrice' => $order['totalPrice'],
            ':buyerID' => $_SESSION['id']
        ]);
    }

    unset($_SESSION['orders']);

    Header("Location: ../pages/shop.php");
?>