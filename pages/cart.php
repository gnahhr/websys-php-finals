<?php
    include '../connect/session.php';
    $totalItems = 0;
    $totalPrice = 0;
    $initialArray = 0;
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
    
    <title>Escafe - <?php echo $_SESSION['username']; ?> 's Cart</title>
</head>
<body>

    <!-- HEADER -->
    <?php include 'user-header.php' ?>
    
    <main>
        <h1> Shopping Cart </h1>
        <div class="shopping-cart">
            <?php if (!isset($_SESSION['orders']) || (count($_SESSION['orders']) === 0)): ?>
                <h2>There's nothing in cart!</h2>
                <a href="./shop.php" class="btn view-btn cart-shop">Shop Now!</a>
                </div>
            <?php else: ?>
            <div class="table-rec-cart">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['orders'] as $order): ?>
                        <tr>
                            <td><?php echo $order['productName']; ?></td>
                            <td><?php echo $order['quantity']; ?></td>
                            <td><?php echo $order['totalPrice']; ?></td>
                            <td><a href="../connect/deleteCartItem.php?deleteId=<?php echo $initialArray ?>" class="btn delete-btn">Delete</a></td>
                            <?php
                                $totalPrice += $order['totalPrice'];
                                $totalItems += $order['quantity'];
                            ?>
                        </tr>
                        <?php $initialArray++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            </div>
            
            <div class="cart-checkout-btn">
                <p>Total Item & Price: Php. <span><?php echo $totalPrice. " (" . $totalItems . " Items)";?></span></p>
                <a href="../connect/checkoutCart.php" class="cart-btn"> Check out </a>
            </div>
            <?php endif; ?>
        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2022</p>
    </footer>
</body>
</html>