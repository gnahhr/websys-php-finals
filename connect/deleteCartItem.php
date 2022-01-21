<?php
    session_start();
    unset($_SESSION['orders'][$_GET['deleteId']]);
    $_SESSION['newOrders'] = $_SESSION['orders'];
    $_SESSION['orders'] = $_SESSION['newOrders'];
    unset($_SESSION['newOrders']);
    Header("Location: ../pages/cart.php");
?>