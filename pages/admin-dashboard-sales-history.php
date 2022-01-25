<?php
    include '../connect/session.php';
    require_once '../connect/config.php';

    if(isset($_SESSION['access']) && ($_SESSION['access'] === "user") || !isset($_SESSION['access'])){
        Header("Location: ../pages/index.php");
    } else if ($_SESSION['access'] === "employee") {
        Header("Location: ../pages/admin-dashboard.php");
    }

    $statement = $pdo -> prepare ("SELECT * FROM transactionlog sale ORDER BY transactionID DESC");
    $statement -> execute();
    $sales = $statement -> fetchAll();
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
    
    <title>Escafe - Sales History</title>
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
                    <img src='<?php
                                    if($pic != null)
                                        echo '../connect/'.$pic;
                                    else
                                        echo '../img/users/blank.png';
                                    
                              ?>' alt="Profile Pic">
                </div>
            </div>
    
            <div class="dashboard-sub">
                <h1>SALES HISTORY</h1>

                <div class="table-rec">
                    <table>
                        <thead>
                            <tr>
                                <th>TRANSACTION ID</th>
                                <th>BUYER ID</th>
                                <th>PRODUCTS</th>
                                <th>TOTAL ITEMS</th>
                                <th>TOTAL PRICE</th>
                                <th>DATE</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                    <td><?php echo $sale['status'] ?></td>
                                </tr>
                            <?php endforeach; ?>
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
                //Split the string between commas
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