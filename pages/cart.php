<?php
    include '../connect/session.php';
    $totalItems = 0;
    $totalPrice = 0;
    $initialArray = 0;

    // var_dump($_SESSION['orders']);
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
    
    <title>Escafe - <?php echo $_SESSION['username']; ?>'s Cart</title>
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
                        <th>Image</th>
                        <th>Product</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['orders'] as $order): ?>
                        <?php if($order['bundledWith'] != 0): ?>
                            <div class="bundled-item">
                                <tr class="initial-item">
                                    <td><img src="../connect/<?php echo $order['productImage'] ;?>" alt="prodPic"></td>
                                    <td><?php echo $order['productName']; ?></td>
                                    <td>
                                        <?php if ($order['discount'] != 0): ?>
                                            <?php echo "<span>Php. " . $order['productPrice'] . "</span></br> Php. " .($order['productPrice']-$order['productPrice']*($order['discount']/100). "</span>"); ?>
                                        <?php else: ?>
                                            <?php echo $order['productPrice']; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td rowspan=2;><?php echo $order['quantity']; ?></td>
                                    <td rowspan=2;><?php echo $order['totalPrice']; ?></td>
                                    <td rowspan=2;><a href="../connect/deleteCartItem.php?deleteId=<?php echo $initialArray ?>" class="btn delete-btn">Delete</a></td>
                                    <?php
                                        $totalPrice += $order['totalPrice'];
                                        $totalItems += $order['quantity'];
                                    ?>
                                </tr>
                                <tr class="bundled-row">
                                    <td><img src="../connect/<?php echo $order['bundledImage'] ;?>" alt="prodPic"></td>
                                    <td><?php echo $order['bundledName']; ?></td>
                                    <td>
                                    <?php if ($order['discount'] != 0): ?>
                                            <?php echo "<span>Php. " . $order['bundledPrice'] . "</span></br> Php. " .($order['bundledPrice']-$order['bundledPrice']*(.1) . "</span>"); ?>
                                        <?php else: ?>
                                            <?php echo $order['bundledPrice']; ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </div>
                        <?php else: ?>
                            <tr>
                            <td><img src="../connect/<?php echo $order['productImage'] ;?>" alt="prodPic"></td>
                                    <td><?php echo $order['productName']; ?></td>
                                    <td>
                                        <?php if ($order['discount'] != 0): ?>
                                            <?php echo "<span>Php. " . $order['productPrice'] . "</span></br> Php. " .($order['productPrice']-$order['productPrice']*($order['discount']/100). "</span>"); ?>
                                        <?php else: ?>
                                            <?php echo "Php. " . $order['productPrice']; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $order['quantity']; ?></td>
                                    <td><?php echo $order['totalPrice']; ?></td>
                                    <td><a href="../connect/deleteCartItem.php?deleteId=<?php echo $initialArray ?>" class="btn delete-btn">Delete</a></td>
                                    <?php
                                        $totalPrice += $order['totalPrice'];
                                        $totalItems += $order['quantity'];
                                    ?>
                            </tr>
                        <?php endif; ?>
                        <?php $initialArray++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            </div>
            
            
            <div class="cart-checkout-btn">
                <p class="cart-p"><span>Tax:</span> Php. <?php echo $totalPrice *.12; ?><br>
                <p class="cart-p"><span>Shipping Fee:</span> Php. 50</p><br>
                <div class="total-button">
                    <p>Total Item & Price: Php. <span><?php echo $totalPrice + 50 . " (" . $totalItems . " Items)";?></span></p>
                    <a href="../connect/checkout.php" class="cart-btn"> Check out </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </main>

    <!-- FOOTER -->
    <?php include './footer.php'; ?>
</body>
</html>