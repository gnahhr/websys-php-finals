<?php
    include '../connect/session.php';
    require_once '../connect/config.php';

    if(isset($_SESSION['access']) && ($_SESSION['access'] === "user") || !isset($_SESSION['access'])){
        Header("Location: ../pages/index.php");
    }

    //GET SALES WITH COMPLETE STATUS
    $statement = $pdo -> prepare("SELECT * FROM transactionlog WHERE status='Complete' ORDER BY dateBought DESC");
    $statement -> execute();
    $sales = $statement -> fetchAll();

    $filteredResults = array();
    //Date checker
    $curSaleItem = "";

    //SORT PER DAY
    if (!isset($_GET['saleSort'])) {
        $saleSort = "perTrans";
    } else {
        $saleSort = $_GET['saleSort'];
    }

    if ($saleSort === "perDay") {
        foreach ($sales as $sale) {
            //Get the date of the current iteration
            $curSale = new DateTime($sale['dateBought']);
            $curQuery = $curSale -> format('Y-m-d');

            //Check if the current date iteration and the current date is the same
            if ($curQuery == $curSaleItem){
                //Loop through the filtered result
                foreach ($filteredResults as &$filtSale) {
                    //If the filtered result date is the same as the current date iteration
                    //Add the total sales and price of the current iteration to the whole
                    if ($filtSale['Date'] == $curQuery){
                        $filtSale['Total Sales'] = $filtSale['Total Sales'] + $sale['totalPrice'];
                        $filtSale['Total Items'] = $filtSale['Total Items'] + $sale['totalItems'];
                    }
                }
            } else {
                //Make a new array with a different date to separate the days in the data
                array_push($filteredResults, [
                    'Date' => $curQuery,
                    'Total Items' => $sale['totalItems'],
                    'Total Sales' => $sale['totalPrice']
                ]);
                $curSaleItem = $curQuery;
            }
        }
    } else if($saleSort === "perWeek"){
        foreach ($sales as $sale) {
            $curSale = new DateTime($sale['dateBought']);
            $curQuery = $curSale -> format('W');
            if ($curQuery == $curSaleItem){
                foreach ($filteredResults as &$filtSale) {
                    if ($filtSale['Week Number'] == $curQuery){
                        $filtSale['Total Sales'] = $filtSale['Total Sales'] + $sale['totalPrice'];
                        $filtSale['Total Items'] = $filtSale['Total Items'] + $sale['totalItems'];
                    }
                }
            } else {
                array_push($filteredResults, [
                    'Week Number' => $curQuery,
                    'Total Sales' => $sale['totalPrice'],
                    'Total Items' => $sale['totalItems']
                ]);
                $curSaleItem = $curQuery;
            }
        }
    } else if($saleSort === "perMonth"){
        foreach ($sales as $sale) {
            $curSale = new DateTime($sale['dateBought']);
            $curQuery = $curSale -> format('F Y');
            if ($curQuery == $curSaleItem){
                foreach ($filteredResults as &$filtSale) {
                    if ($filtSale['Month'] == $curQuery){
                        $filtSale['Total Sales'] = $filtSale['Total Sales'] + $sale['totalPrice'];
                        $filtSale['Total Items'] = $filtSale['Total Items'] + $sale['totalItems'];
                    }
                }
            } else {
                array_push($filteredResults, [
                    'Month' => $curQuery,
                    'Total Sales' => $sale['totalPrice'],
                    'Total Items' => $sale['totalItems']
                ]);
                $curSaleItem = $curQuery;
            }
        }
    } else if($saleSort === "perYear") {
        foreach ($sales as $sale) {
            $curSale = new DateTime($sale['dateBought']);
            $curQuery = $curSale -> format('Y');
            if ($curQuery == $curSaleItem){
                foreach ($filteredResults as &$filtSale) {
                    if ($filtSale['Year'] == $curQuery){
                        $filtSale['Total Sales'] = $filtSale['Total Sales'] + $sale['totalPrice'];
                        $filtSale['Total Items'] = $filtSale['Total Items'] + $sale['totalItems'];
                    }
                }
            } else {
                array_push($filteredResults, [
                    'Year' => $curQuery,
                    'Total Sales' => $sale['totalPrice'],
                    'Total Items' => $sale['totalItems']
                ]);
                $curSaleItem = $curQuery;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poor+Story&family=Roboto:wght@300&family=Satisfy&display=swap" rel="stylesheet">
    
    <title>Escafe - Payments</title>
</head>
<body>

    <!-- HEADER -->
    <?php include './admin-header.php'; ?>

    <!-- MAIN CONTENTS -->
    <main>
        <div class="main-wrapper">
            <div class="user">  
                <div class="user-text">
                    <p>Hi, <?php echo $_SESSION['username']?></p>
                    <a href="../connect/logout.php">Logout</a>
                </div>
                <div class="user-image">
                    <img src="../img/users/blank.png" alt="user profile">
                </div>
            </div>
    
            <div class="dashboard-sub">
                <h1>PAYMENTS</h1>
                
                <form action="./admin-dashboard-payments.php" method="GET">
                    <select name="saleSort" id="saleSort">
                        <option value="perTrans" <?php if ($saleSort === "perTrans"): echo "selected"; endif;?>>Per Transaction</option>
                        <?php if ($_SESSION['access'] === "admin"): ?>
                            <option value="perDay" <?php if ($saleSort === "perDay"): echo "selected"; endif;?>>Per Day</option>
                            <option value="perWeek" <?php if ($saleSort === "perWeek"): echo "selected"; endif;?>>Per Week</option>
                            <option value="perMonth" <?php if ($saleSort === "perMonth"): echo "selected"; endif;?>>Per Month</option>
                            <option value="perYear" <?php if ($saleSort === "perYear"): echo "selected"; endif;?>>Per Year</option>
                        <?php endif; ?>
                    </select>

                    <input type="submit" value="Sort" class="view-btn btn">
                </form>

                <div class="table-rec">
                    <table>
                        <thead>
                            <?php if ($saleSort === "perDay"): ?>
                                <tr>
                                    <th>DAY</th>
                                    <th>TOTAL ITEMS</th>
                                    <th>TOTAL SALES</th>
                                </tr>
                            <?php elseif ($saleSort === "perWeek"): ?>
                                <tr>
                                    <th>WEEK NUMBER</th>
                                    <th>TOTAL ITEMS</th>
                                    <th>TOTAL SALES</th>
                                </tr>
                            <?php elseif ($saleSort === "perMonth"): ?>
                                <tr>
                                    <th>MONTH</th>
                                    <th>TOTAL ITEMS</th>
                                    <th>TOTAL SALES</th>
                                </tr>
                            <?php elseif ($saleSort === "perYear"): ?>
                                <tr>
                                    <th>YEAR</th>
                                    <th>TOTAL ITEMS</th>
                                    <th>TOTAL SALES</th>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <th>TRANSACTION ID</th>
                                    <th>BUYER ID</th>
                                    <th>PRODUCTS</th>
                                    <th>TOTAL ITEMS</th>
                                    <th>TOTAL PRICE</th>
                                    <th>DATE</th>
                                </tr>
                            <?php endif; ?>
                        </thead>
                        <tbody>
                            <?php if ($saleSort === "perDay"): ?>
                                <?php foreach ($filteredResults as $filtRes): ?>
                                    <tr>
                                        <td><?php echo $filtRes["Date"];?></td>
                                        <td><?php echo $filtRes["Total Items"];?></td>
                                        <td><?php echo $filtRes["Total Sales"];?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php elseif ($saleSort === "perWeek"): ?>
                                <?php foreach ($filteredResults as $filtRes): ?>
                                    <tr>
                                        <td><?php echo $filtRes["Week Number"];?></td>
                                        <td><?php echo $filtRes["Total Items"];?></td>
                                        <td><?php echo $filtRes["Total Sales"];?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php elseif ($saleSort === "perMonth"): ?>
                                <?php foreach ($filteredResults as $filtRes): ?>
                                    <tr>
                                        <td><?php echo $filtRes["Month"];?></td>
                                        <td><?php echo $filtRes["Total Items"];?></td>
                                        <td><?php echo $filtRes["Total Sales"];?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php elseif ($saleSort === "perYear"): ?>
                                <?php foreach ($filteredResults as $filtRes): ?>
                                    <tr>
                                        <td><?php echo $filtRes["Year"];?></td>
                                        <td><?php echo $filtRes["Total Items"];?></td>
                                        <td><?php echo $filtRes["Total Sales"];?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <?php foreach ($sales as $sale): ?>
                                    <tr>
                                        <td><?php echo $sale['transactionID'] ?></td>
                                        <td><?php echo $sale['buyerID'] ?></td>
                                        <td>
                                            <?php foreach(formatProducts($sale['productsBought']) as $product){
                                                    echo $product . "<br>";
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $sale['totalItems'] ?></td>
                                        <td><?php echo $sale['totalPrice'] ?></td>
                                        <td><?php echo $sale['dateBought'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>


    <!-- FOOTER -->
    <?php include './footer.php'; ?>

    <!-- FUNCTIONS -->
    <?php
        function formatProducts($product){
                $perRow = explode(',', $product);
                $productsBought = array();
                foreach ($perRow as $row){
                    $latter = explode('-', $row);
                    $pushString = $latter[1] . " (" . $latter[2] . " pcs.)";
                    array_push($productsBought, $pushString);
                }
                
                return $productsBought;
        }
    ?>
</body>
</html>