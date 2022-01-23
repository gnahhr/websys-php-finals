<?php
    require_once '../connect/config.php';
    $statement = $pdo -> prepare("SELECT * FROM saleshistory WHERE status='Complete' ORDER BY dateBought DESC");
    $statement -> execute();
    $sales = $statement -> fetchAll();

    $filteredResults = array();

    $salesToday = $salesThisMonth = $salesThisYear = 0;

    //SALES TDAY
    foreach ($sales as $sale) {
        $curSale = new DateTime($sale['dateBought']);
        $curQuery = $curSale -> format('Y-m-d');
        if ($curQuery == date("Y-m-d")){
            $salesToday += $sale['totalPrice'];
        }
    }

    //SALES THIS MONTH
    foreach ($sales as $sale) {
        $curSale = new DateTime($sale['dateBought']);
        $curQuery = $curSale -> format('F Y');
        if ($curQuery == date("F Y")){
            $salesThisMonth += $sale['totalPrice'];
        }
    }
    
    //SALES THIS YEAR
    foreach ($sales as $sale) {
        $curSale = new DateTime($sale['dateBought']);
        $curQuery = $curSale -> format('Y');
        if ($curQuery == date("Y")){
            $salesThisYear += $sale['totalPrice'];
        }
    }

    
?>