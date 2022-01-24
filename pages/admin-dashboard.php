<?php
    include '../connect/session.php';
    include '../connect/dashSales.php';
    include '../connect/config.php';

    if (isset($_SESSION['access']) && ($_SESSION['access'] === 'user')){
        header("Location: ../pages/index.php");
    }
    $statement = $pdo -> prepare ("SELECT * FROM products ORDER BY expirationDate DESC");
    $statement -> execute();
    $products = $statement -> fetchAll(PDO::FETCH_ASSOC);
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
    
    <title>Escafe - Admin Dashboard</title>
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
    
            <div class="dashboard-main">
                <h1>DASHBOARD</h1>
    
                <!-- MAIN SALES -->
                <h2>SALES</h2>
                <div class="main-sales">
                    <div class="sales-cont total-income">
                        <h3>Income Today</h3>
                        <p><?php echo "Php.".$salesToday ;?></p>
                    </div>
                    <div class="sales-cont total-expenses">
                        <h3>Income This Month</h3>
                        <p><?php echo "Php.".$salesThisMonth ;?></p>
                    </div>
                    <div class="sales-cont net-profit">
                        <h3>Income This Year</h3>
                        <p><?php echo "Php.".$salesThisYear ;?></p>
                    </div>
                    <div class="sales-cont balance">
                        <h3>Balance</h3>
                        <p><?php echo "Php.".$balance ;?></p>
                    </div>
                </div>
    
                <!-- INVENTORY SUMMARY -->
                <h2>INVENTORY SUMMARY</h2>
                <div class="inventory-summary">
                    <div class="current-stocks">
                        <h3>CURRENT STOCKS</h3>
                        <div class="table-round">
                        <table>
                        <thead>
                            <tr>
                                <th>PRODUCT NAME</th>
                                <th>QTY</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach($products as $products){ ?>
                                <tr>
                                    
                                    <td><?php echo $products['productName'] ?></td>
                                    <td><?php echo $products['quantity'];
                                            if($products['quantity'] <= 10)
                                                echo '<h4> Low </h4>';   
                                        ?></td>
                                    
                                </tr>
                            <?php }?>
                            
                        </tbody>
                    </table>
                        </div>
                    </div>
    
                    </div>
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