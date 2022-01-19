<?php
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=escafe','root','');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_GET['id'];

    $statement = $pdo -> prepare ("SELECT * FROM products WHERE productID = :id ");
    $statement ->bindValue(':id',$id);
    $statement -> execute();
    $product = $statement -> fetchAll(PDO::FETCH_ASSOC);
    // echo '<pre>';
    // var_dump($product);
    // echo '</pre>';
    // echo $product[0]["productName"];
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
    <header>
        <div class="logo-name">
            <div class="logo-head"><img src="../img/dashboard/logo-green-trim.png" alt="logo"></div>
            <div class="name-head"><p>escafé<p></div>
        </div>

        <h1>ADMIN</h1>

        <nav>
            <ul>
                <li>
                    <h2>INVENTORY</h2>
                    <ul>
                        <li> <a href="#">SUPPLIER</a></li>
                        <li> <a href="#">CATEGORIES</a></li>
                        <li> <a href="#">MANAGE</a></li>
                        <li> <a href="#">STOCKS</a></li>
                    </ul>
                </li>
                <li>
                    <h2>POINT OF SALE</h2>
                    <ul>
                        <li> <a href="#">ORDER ITEMS</a></li>
                        <li> <a href="#">PLACEHOLDER</a></li>
                        <li> <a href="#">PLACEHOLDER</a></li>
                        <li> <a href="#">PLACEHOLDER</a></li>
                    </ul>
                </li>
                <li>
                    <h2>REPORTS</h2>
                    <ul>
                        <li> <a href="#">SALES</a></li>
                        <li> <a href="#">PRODUCT</a></li>
                        <li> <a href="#">PLACEHOLDER</a></li>
                        <li> <a href="#">PLACEHOLDER</a></li>
                    </ul>
                </li>

                <li>
                    <h2>SYSTEM SETTINGS</h2>
                    <ul>
                        <li> <a href="#">SET BALANCE</a></li>
                        <li> <a href="#">UPDATE SITE</a></li>
                        <li> <a href="#">ADD POST</a></li>
                        <li> <a href="#">CONTENT</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <!-- MAIN CONTENTS -->
    <main>
        <div class="main-wrapper">
            <div class="user">  
                <div class="user-text">
                    <p>Hi, $user</p>
                    <a href="#">Logout</a>
                </div>
                <div class="user-image">
                    <img src="../img/users/blank.png" alt="user profile">
                </div>
            </div>
    
            <div class="dashboard-sub">
                <h1>INVENTORY - PRODUCT NAME</h1>
                <h2>EDIT</h2>
                
                <form action="../connect/editProduct.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
                    <div class="inv-pic">
                        <div class="inv-content">
                            <img src=<?php echo '../connect/'.$product[0]['productImage']?> alt="user pic">
                            <input type="file" name="productImage" id="productImage">
                        </div>
                    </div>

                    <label for="prodName">Product Name</label> <br>
                    <input type="text" name="prodName" value=<?php echo $product[0]['productName']?> id="prodName" required><br>

                    <label for="prodPrice">Price</label> <br>
                    <input type="number" name="prodPrice" value=<?php echo $product[0]['productPrice']?> id="prodPrice" required><br>

                    <label for="prodQuantity">Qty</label> <br>
                    <input type="number" name="prodQuantity" value=<?php echo $product[0]['quantity']?> id="prodQuantity" required><br>

                    <label for="prodSupplier">Supplier</label> <br>
                    <input type="text" name="prodSupplier" value=<?php echo $product[0]['supplierName']?> id="prodSupplier" required> <br>

                    <label for="prodDesc">Description</label> <br>
                    <input type="text" name="prodDesc" value=<?php echo $product[0]['productDescription']?> id="prodDesc" required><br>
                    
                    <label for="prodExpDate">Expiry Date</label> <br>
                    <input type="date" name="prodExpDate" value=<?php echo $product[0]['expirationDate']?> id="prodExpDate" required><br>
                    
                    <div class="action-buttons">
                        <input type="submit" value="Confirm" class="view-btn btn">
                        <a href="#" class="delete-btn btn">Cancel</a>
                    </div>
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