<?php
    require_once '../connect/config.php';

    //Get data from salesHistory with Complete status
    $statement = $pdo -> prepare("SELECT * FROM saleshistory WHERE status='Complete' ORDER BY dateBought DESC");
    $statement -> execute();
    $sales = $statement -> fetchAll();

    $filteredResults = array();

    //Placeholder ng summation of the sales
    $salesToday = $salesThisMonth = $salesThisYear = 0;

    //SALES TODAY
    foreach ($sales as $sale) {
        //Get the date of the current iteration
        $curSale = new DateTime($sale['dateBought']);
        //Get the date today
        $curQuery = $curSale -> format('Y-m-d');

        //If the date today and the date of the query is the same
        //Add the total earnings for today
        if ($curQuery == date("Y-m-d")){ //Y = 2022 m = 04 d = 23
            $salesToday += $sale['totalPrice'];
        }
    }

    //SALES THIS MONTH
    foreach ($sales as $sale) {
        $curSale = new DateTime($sale['dateBought']);
        $curQuery = $curSale -> format('F Y'); //F = Month String January 2022
        if ($curQuery == date("F Y")){
            $salesThisMonth += $sale['totalPrice'];
        }
    }
    
    //SALES THIS YEAR
    foreach ($sales as $sale) {
        $curSale = new DateTime($sale['dateBought']);
        $curQuery = $curSale -> format('Y'); // 2022
        if ($curQuery == date("Y")){
            $salesThisYear += $sale['totalPrice'];
        }
    }
?>