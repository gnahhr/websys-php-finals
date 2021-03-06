<?php
    include '../connect/session.php';
    require_once '../connect/config.php';

    //If not set, get all products from query
    if (!isset($_GET['search']) || ($_GET['search'] === '')) {
        $statement = $pdo -> prepare("SELECT * FROM products");
        $statement ->execute();
        $products = $statement -> fetchAll(PDO::FETCH_ASSOC);
    } else {
        //Get products with the same productName or productCategory as the $search variable
        $search = $_GET['search'];
        $statement = $pdo -> prepare("SELECT * FROM products WHERE productName LIKE '%$search%' OR productCategory LIKE '%$search%'");
        $statement -> execute();
        $products = $statement -> fetchAll(PDO::FETCH_ASSOC);
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
    
    <title>Escafe - Shop</title>
</head>
<body>

    <!-- HEADER -->
    <?php include 'user-header.php' ?>
    
    <main>
        <div class="shop-main">
            <form action="shop.php?>">
                <input type="text" name="search" id="search" placeholder="Search">
                <input type="submit" value="Search">
            </form>
            <div class="shop-items">
                <?php foreach ($products as $product): ?>
                    <div class="shop-item">
                        <img src='<?php echo '../connect/'.$product['productImage'] ?>' alt="item1">
                        <h2><?php echo $product['productName'] ?></h2>
                        <p>Price: <?php echo $product['productPrice'] ?></p>
                        <a href="product-page.php?productID=<?php echo $product['productID']?>"
                        class = "btn view-btn"
                        >View Product</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <?php include "./footer.php"; ?>
</body>
</html>