<?php
    include '../connect/session.php';
    require_once '../connect/config.php';
    $product = $_SESSION['orders'];
    $totalShit = 0;
    $totalItems = 0;
    $productsBought='';

    foreach ( $product as $order) {
        $totalShit += $order['totalPrice'];
        $productsBought .= (string)$order['productID'] . ' - ' . (string)$order['productName'] . ' - ' . (string)$order['quantity'] . ', ';
        $totalItems += $order['quantity'];
    }
    $totalShit += floatval($totalShit * 0.12) + 50;
    $productsBought = substr($productsBought,0,-2);
    echo $productsBought . '<br>';
    echo $totalShit . '<br>';
    echo $totalItems . '<br>';

    $statement = $pdo -> prepare ("INSERT INTO transactionLog(productsBought, totalItems, totalPrice, dateBought, buyerID, status)
        VALUES (
            :productsBought,
            :totalItems,
            :totalPrice,
            current_timestamp(),
            :buyerID,
            'Shipping'
        )");

        $statement -> execute([
            ':productsBought' => $productsBought,
            ':totalItems' => $totalItems,
            ':totalPrice' => $totalShit,
            ':buyerID' => $_SESSION['id']
        ]);
    
    unset($_SESSION['orders']);

    Header("Location: ../pages/shop.php");
?>