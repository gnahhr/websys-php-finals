<?php
    session_start();

    //Remove index of the orders
    unset($_SESSION['orders'][$_GET['deleteId']]);

    //Create new array
    $_SESSION['newOrders'] = array();

    //Push items into the new array
    foreach ($_SESSION['orders'] as &$order){
        array_push($_SESSION['newOrders'], $order);
    }

    //Overrite the old into the new to make the id consecutive
    $_SESSION['orders'] = $_SESSION['newOrders'];

    //Delete the temporary session
    unset($_SESSION['newOrders']);
    
    Header("Location: ../pages/cart.php");
?>