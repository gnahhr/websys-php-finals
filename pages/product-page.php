<?php
    include '../connect/session.php';
    require_once '../connect/config.php';

    $statement = $pdo -> prepare("SELECT * FROM products WHERE productID = :productID");
    $statement -> execute([
        'productID' => $_GET['productID']
    ]);
    $product = $statement -> fetch(0);
    // echo '<pre>';
    // echo var_dump($products[0]['productImage']);
    // echo '</pre>';

    if (isset($_POST['quantity'])){
        if(isset($_SESSION['orders']) && !checkDupes($product['productID'], $_SESSION['orders'])){
            array_push($_SESSION['orders'], array(
                'productID' => $product['productID'],
                'productName' => $product['productName'],
                'quantity' => $_POST['quantity'],
                'totalPrice' => $_POST['quantity'] * $product['productPrice']
            ));
        } else {
            foreach ($_SESSION['orders'] as $sessProduct) {
                if ($sessProduct['productID'] == $_GET['productID']) {
                    $totalQty = $sessProduct['quantity'] + $_POST['quantity'];
                    $sessProduct['quantity'] = $totalQty;
                }
            }
            $sessProduct['quantity'] = $totalQty;
            Header("Location: ./shop.php");
        }
    }

    function checkDupes($productID, $prodArray) {
        foreach ($prodArray as $product) {
            if ($product['productID'] === $productID) {
                return true;
            }
        }

        return false;
    }

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
                
                <form method="POST" action="product-page.php?productID=<?php echo $product['productID']?>">
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