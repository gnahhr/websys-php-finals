<?php
    include '../connect/session.php';
    require_once '../connect/config.php';

    $statement = $pdo -> prepare("SELECT * FROM products WHERE productID = :productID");
    $statement -> execute([
        'productID' => $_GET['productID']
    ]);
    $product = $statement -> fetch(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user-shop.css">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poor+Story&family=Roboto:wght@300&family=Satisfy&display=swap" rel="stylesheet">
    
    <title>Escafe - <?php echo $product['productName']?></title>
</head>
<body>

    <!-- HEADER -->
    <?php include 'user-header.php' ?>
    
    <main>
        <div class="product-main">
            <div class="product-image">
            <img src=<?php echo '../connect/'.$product['productImage'] ?> alt="<?php echo $product['productName'] . 'picture '?>">
            </div>
            <div class="product-text">
                <div class="product-text-head">
                    <h2><?php echo $product['productName'] ?></h2>
                    <h3><?php echo $product['productCategory']?></h3>
                </div>
                <div class="product-text-body">
                    <h3>Description: </h3>
                    <p><?php echo $product['productDescription']?></p>
                    <h4>Stocks: </h4>
                    <p><?php echo $product['quantity']?></p>
                </div>
                
                <form action="../connect/addToCart.php?productID=<?php echo $_GET['productID']?>" method="POST" enctype="multipart/form-data">
                    <label for="quantity">Quantity: </label>
                    <input type="number" name="quantity" id="quantity" min="1" max="<?php echo $product['quantity']?>" required> <br>
                    <input type="submit" value="Add to Cart">
                </form>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2022</p>
    </footer>
</body>
</html>