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

    //Opens the csv file or writes if it does not exist. "W" = Write File = Overwrite everything
    $file = fopen("../csv/sales.csv", "w");

    //Input data of the header
    fputcsv($file, $headers);

    //Input data of the body per row
    foreach($sales as $sale) {
        fputcsv($file, $sale);
    }
    
    Header("Location: ../pages/admin-dashboard.php");

    //Close the file
    fclose($file);
?>