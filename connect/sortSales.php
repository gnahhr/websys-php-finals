<?php
    require_once '../connect/config.php';
    $statement = $pdo -> prepare("SELECT * FROM saleshistory WHERE status='Complete'");
    $statement -> execute();
    $sales = $statement -> fetchAll();

    // $curIteration = new DateTime($sales['dateBought']);
    // $day = $curIteration -> format('Y-m-d'); // Day
    // $day = $curIteration -> format('W'); // Week
    // $day = $curIteration -> format('m'); // Month
    // $day = $curIteration -> format('Y'); // Year

    Header("Location: ../pages/admin-dashboard-payments.php");
?>