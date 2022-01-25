<?php
    include './session.php';
    require_once './config.php';

    $statement = $pdo -> prepare ("UPDATE supplier SET
        supplierName = :supplierName,
        itemSupplied = :itemSupplied,
        location = :location,
        contactNumber = :contactNumber
        WHERE supplierID = :supplierID
    ");

    $statement -> execute([
        ':supplierName' => $_POST['supplierName'],
        ':itemSupplied' => $_POST['itemSupplied'],
        ':location' => $_POST['location'],
        ':contactNumber' => $_POST['contactNumber'],
        ':supplierID' => $_GET['supplierID']
    ]);

    Header("Location: ../pages/admin-dashboard-inv-supplier.php");
?>