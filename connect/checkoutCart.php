<?php
    include './session.php';
    require_once './config.php';

    foreach ($_SESSION['orders'] as $order){
        $statement = $pdo -> prepare ("INSERT INTO salesHistory(productID, productName, quantity, totalPrice, dateBought, buyerUsername, status)
        VALUES (
            :productID,
            :productName,
            :quantity,
            :totalPrice,
            current_timestamp(),
            :buyerUsername,
            'Shipping'
        )");

        $statement -> execute([
            ':productID' => $order['productID'],
            ':productName' => $order['productName'],
            ':quantity' => $order['quantity'],
            ':totalPrice' => $order['totalPrice'],
            ':buyerUsername' => $_SESSION['username']
        ]);
    }

    unset($_SESSION['orders']);

    Header("Location: confirmItem.php");
?>