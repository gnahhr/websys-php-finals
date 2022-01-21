<?php
    include '../connect/session.php';

    if (isset($_SESSION['access']) && ($_SESSION['access'] === 'user')){
        header("Location: ../pages/index.php");
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
                    <img src="../img/users/blank.png" alt="user profile">
                </div>
            </div>
    
            <div class="dashboard-main">
                <h1>DASHBOARD</h1>
    
                <!-- MAIN SALES -->
                <h2>SALES</h2>
                <div class="main-sales">
                    <div class="sales-cont total-income">
                        <h3>Total Income</h3>
                        <p>Php. 60,000.00</p>
                    </div>
                    <div class="sales-cont total-expenses">
                        <h3>Total Expenses</h3>
                        <p>Php. 30, 000.00</p>
                    </div>
                    <div class="sales-cont net-profit">
                        <h3>Net Profit</h3>
                        <p>Php. 30,000.00</p>
                    </div>
                    <div class="sales-cont balance">
                        <h3>Balance</h3>
                        <p>Php. 100,000.00</p>
                    </div>
                </div>
    
                <!-- INVENTORY SUMMARY -->
                <h2>INVENTORY SUMMARY</h2>
                <div class="inventory-summary">
                    <div class="current-stocks">
                        <h3>CURRENT STOCKS</h3>
                        <div class="table-round">
                            <table>
                                <tr>
                                    <th>Item</th>
                                    <th>Qty</th>
                                </tr>
                                <tr>
                                    <td>Something 1</td>
                                    <td>60</td>
                                </tr>
                                <tr>
                                    <td>Something 2</td>
                                    <td>9</td>
                                </tr>
                                <tr>
                                    <td>Something 3</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>Something 4</td>
                                    <td>20</td>
                                </tr>
                            </table>
                        </div>
                    </div>
    
                    <div class="arrival">
                        <h3>ARRIVAL OF GOODS</h3>
                        <div class="table-round">
                            <table>
                                <tr>
                                    <th>Item</th>
                                    <th>Supplier</th>
                                    <th>ETA</th>
                                </tr>
                                <tr>
                                    <td>Something 1</td>
                                    <td>Supplier 1</td>
                                    <td>January 20, 2022</td>
                                </tr>
                                <tr>
                                    <td>Something 2</td>
                                    <td>Supplier 2</td>
                                    <td>January 20, 2022</td>
                                </tr>
                                <tr>
                                    <td>Something 3</td>
                                    <td>Supplier 3</td>
                                    <td>January 20, 2022</td>
                                </tr>
                                <tr>
                                    <td>Something 4</td>
                                    <td>Supplier 4</td>
                                    <td>January 20, 2022</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
    
                <!-- ORDERS -->
                <h2>ORDERS</h2>
                <div class="main-orders">
    
                    <div class="on-return">
                        <h3>REQUEST ON RETURNS</h3>
                        <div class="table-round">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Reason</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- FOREACH LOOP OF SALES HIST WITH RETURNING STATUS -->
                                    <tr>

                                    </tr>
                                </tbody>
                            </table>
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