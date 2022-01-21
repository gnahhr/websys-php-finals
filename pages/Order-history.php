<?php
    include '../connect/session.php';
    require_once '../connect/config.php';

    $statement = $pdo -> prepare("SELECT * FROM salesHistory WHERE buyerID = :id ORDER BY dateBought DESC");
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

        <div class="table-rec">
        <table>
            <thead>
                <tr>
                <th>Product Name</th>
                <th>Date Bought</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo $order['productName'] ?></td>
                        <td><?php echo $order['dateBought'] ?></td>
                        <td><?php echo $order['quantity'] ?></td>
                        <td><?php echo $order['totalPrice'] ?></td>
                        <td><?php echo $order['status'] ?></td>
                        <td>
                        <?php if ($order['status'] === 'Shipping'): ?>    
                            <a href="../connect/userUpdateOrder.php?action=Complete&orderID=<?php echo $order['orderID']; ?>" class="btn view-btn">Complete</a>
                            <a href="../connect/userUpdateOrder.php?action=Returning&orderID=<?php echo $order['orderID']; ?>" class="btn delete-btn">Return</a>
                        <?php elseif ($order['status'] === 'Complete'): ?>
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

    </main>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2022</p>
    </footer>
</body>
</html>