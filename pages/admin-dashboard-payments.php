<?php
    include '../connect/session.php';
    require_once '../connect/config.php';

    $statement = $pdo -> prepare ("SELECT * FROM saleshistory WHERE status = 'Complete'");
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
                
                <form action="../connect/sortSales.php" method="GET">
                    <select name="saleSort" id="saleSort">
                        <option value="perTrans">Per Transaction</option>
                        <option value="perDay">Per Day</option>
                        <option value="perWeek">Per Week</option>
                        <option value="perMonth">Per Month</option>
                        <option value="perYear">Per Year</option>
                    </select>

                    <input type="submit" value="Sort" class="view-btn btn">
                </form>

                <div class="table-rec">
                    <table>
                        <thead>
                            <tr>
                                <th>ORDER ID</th>
                                <th>BUYER ID</th>
                                <th>PRODUCTS</th>
                                <th>QUANTITY</th>
                                <th>TOTAL PRICE</th>
                                <th>DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sales as $sale): ?>
                                <tr>
                                    <td><?php echo $sale['productID'] ?></td>
                                    <td><?php echo $sale['buyerID'] ?></td>
                                    <td><?php echo $sale['productName'] ?></td>
                                    <td><?php echo $sale['quantity'] ?></td>
                                    <td><?php echo $sale['totalPrice'] ?></td>
                                    <td><?php echo $sale['dateBought'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>


    <!-- FOOTER -->
    <footer>
        <p>&copy; 2022</p>
    </footer>
</body>
</html>