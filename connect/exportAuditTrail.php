<?php
    require_once '../connect/config.php';

    $statement = $pdo -> prepare ("SELECT * FROM userlog ORDER BY dateTime DESC");
    $statement -> execute([]);
    $logs = $statement -> fetchAll();

    $headers = array(
        "ID",
        "Username",
        "Action",
        "Date Time"
    );

    $file = fopen("../csv/userlog.csv", "w");

    fputcsv($file, $headers);

    foreach($logs as $log) {
        fputcsv($file, $log);
    }
    
    Header("Location: ../pages/admin-dashboard.php");
    fclose($file);
?>