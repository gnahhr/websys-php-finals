<?php
    include '../connect/session.php';
    require_once '../connect/config.php';

    $statement = $pdo -> prepare("SELECT * FROM transactionlog WHERE buyerID = :id ORDER BY dateBought DESC");
    $statement -> execute([
        'id' => $_SESSION['id']
    ]);

    $orders = $statement -> fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user-profile.css">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poor+Story&family=Roboto:wght@300&family=Satisfy&display=swap" rel="stylesheet">
    
    <title>Escafe - Order History</title>
</head>
<body>
    <!-- HEADER -->
    <?php include 'user-header.php' ?>
    
    <main>
        <h1> Order History </h1>
        <div class="order-table">
            <div class="table-rec">
            <table>
                <thead>
                    <tr>
                    <th>Transaction ID</th>
                    <th>Products Bought</th>
                    <th>Total Price</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo $order['transactionID'] ?></td>
                            <td>
                                <?php foreach(formatProducts($order['productsBought']) as $product){
                                        echo $product . "<br>";
                                    }
                                ?>
                            </td>
                            <td><?php echo $order['totalPrice'] ?></td>
                            <td><?php echo $order['dateBought'] ?></td>
                            <td><?php echo $order['status'] ?></td>
                            <td>
                            <?php if ($order['status'] === 'Shipping'): ?>    
                                <a href="../connect/userUpdateOrder.php?action=Complete&transactionID=<?php echo $order['transactionID']; ?>" class="btn view-btn">Complete</a>
                                <a href="../connect/userUpdateOrder.php?action=Returning&transactionID=<?php echo $order['transactionID']; ?>" class="btn delete-btn">Return</a>
                            <?php elseif ($order['status'] === 'Complete' || $order['status'] === 'Refunded'): ?>
                                <a href="./shop.php" class="btn view-btn">Order Again</a>
                            <?php elseif ($order['status'] === 'Returned' || $order['status'] === 'Returning'): ?>
                                <a href="#" class="btn view-btn" disabled>Wait for action</a>
                            <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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