<?php
    require_once '../connect/config.php';

    $statement = $pdo -> prepare ("SELECT * FROM transactionlog ORDER BY dateBought DESC");
    $statement -> execute([]);
    $sales = $statement -> fetchAll();

    $headers = array(
        "Transaction ID",
        "Products Bought",
        "Total Items",
        "Total Price",
        "Date Bought",
        "Buyer ID",
        "Status"
    );

    $file = fopen("../csv/sales.csv", "w");

    fputcsv($file, $headers);

    foreach($sales as $sale) {
        fputcsv($file, $sale);
    }
    
    Header("Location: ../pages/admin-dashboard.php");
    fclose($file);
?>