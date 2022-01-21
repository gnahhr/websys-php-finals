<?php
    require_once './config.php';

    $statement = $pdo -> prepare ("INSERT INTO supplier(supplierName, itemSupplied, contactNumber, Location)
    VALUES (
        :supplierName,
        :itemSupplied,
        :contactNumber,
        :location
    )");

    $statement -> execute([
        ':supplierName' => $_POST['supplierName'],
        ':itemSupplied' => $_POST['itemSupplied'],
        ':contactNumber' => $_POST['contactNumber'],
        ':location' => $_POST['location']
    ]);

    Header("Location: ../pages/admin-dashboard-inv-supplier.php");
?>