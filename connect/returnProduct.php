<?php
    require_once './config.php';

    $orderStatus = 'hello';

    if (strcmp($_GET['action'], 'accept')) {
        $orderStatus = "Refunded";
    }else if (strcmp($_GET['action'], 'decline')){
        $orderStatus = "Shipping";
    }

    $statement = $pdo -> prepare("UPDATE transactionlog SET status = :status WHERE transactionID = :transactionID");
    $statement -> execute([
        ':status' => $orderStatus, 
        ':transactionID' => $_GET['transactionID']
    ]);

    Header("Location: ../pages/admin-dashboard-order-status.php");
?>