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
    
    <title>Shop</title>
</head>
<body>

    <!-- HEADER -->
    <?php include 'user-header.php' ?>
    
    <main>
        <div class="shop-main">
            <form action="POST">
                <input type="text" name="searchProd" id="searchProd" placeholder="Search">
                <input type="submit" value="Search">
            </form>
            <div class="shop-items">
                <div class="shop-item">
                    <img src="../img/users/blank.png" alt="item1">
                    <h2>Item 1</h2>
                    <button type="submit">Add to Cart</button>
                </div>
                <div class="shop-item">
                    <img src="../img/users/blank.png" alt="item1">
                    <h2>Item 2</h2>
                    <button type="submit">Add to Cart</button>
                </div>
                <div class="shop-item">
                    <img src="../img/users/blank.png" alt="item1">
                    <h2>Item 3</h2>
                    <button type="submit">Add to Cart</button>
                </div>
                <div class="shop-item">
                    <img src="../img/users/blank.png" alt="item1">
                    <h2>Item 4</h2>
                    <button type="submit">Add to Cart</button>
                </div>
            </div>
            <div class="pages">
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2022</p>
    </footer>
</body>
</html>