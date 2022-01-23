<?php
    session_start();
    unset($_SESSION['orders'][$_GET['deleteId']]);
    
    $_SESSION['newOrders'] = array();

    foreach ($_SESSION['orders'] as &$order){
        array_push($_SESSION['newOrders'], $order);
    }

    $_SESSION['orders'] = $_SESSION['newOrders'];
    unset($_SESSION['newOrders']);
    Header("Location: ../pages/cart.php");
?>