<?php
    include '../connect/session.php';
    require_once '../connect/config.php';

    $statement = $pdo -> prepare ("SELECT * FROM saleshistory ORDER BY orderID DESC");
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
                                <th>ORDER ID</th>
                                <th>USERNAME</th>
                                <th>PRODUCTS</th>
                                <th>QUANTITY</th>
                                <th>TOTAL PRICE</th>
                                <th>DATE</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sales as $sale): ?>
                                <tr>
                                    <td><?php echo $sale['orderID'] ?></td>
                                    <td><?php echo $sale['buyerID'] ?></td>
                                    <td><?php echo $sale['productName'] ?></td>
                                    <td><?php echo $sale['quantity'] ?></td>
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
    <footer>
        <p>&copy; 2022</p>
    </footer>
</body>
</html>