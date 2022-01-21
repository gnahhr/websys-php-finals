<?php
    require_once './config.php';

    $id = $_GET['supplierID'];

    $statement = $pdo -> prepare ("DELETE FROM supplier WHERE supplierID = :supplierID");
    $statement -> execute([
        ':supplierID' => $id
    ]);

    Header('Location: ..\pages\admin-dashboard-inv-supplier.php');
?>