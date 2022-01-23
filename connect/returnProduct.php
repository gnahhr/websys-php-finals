<?php
    require_once './config.php';

    $orderStatus = 'hello';

    if (strcmp($_GET['action'], 'accept')) {
        $orderStatus = "Refunded";
    }else if (strcmp($_GET['action'], 'decline')){
        $orderStatus = "Shipping";
    }

    $statement = $pdo -> prepare("UPDATE saleshistory SET status = :status WHERE orderID = :orderID");
    $statement -> execute([
        ':status' => $orderStatus, 
        ':orderID' => $_GET['orderID']
    ]);

    Header("Location: ../pages/admin-dashboard-order-status.php");
?>