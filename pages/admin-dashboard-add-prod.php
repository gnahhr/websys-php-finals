<?php
    include '../connect/session.php';
    require_once '../connect/config.php';

    $statement = $pdo -> prepare ("SELECT * FROM categories");
    $statement -> execute();
    $categories = $statement -> fetchAll(PDO::FETCH_ASSOC);
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
    
    <title>Escafe - Add Product</title>
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
    
            <div class="dashboard-sub">
                <h1>INVENTORY</h1>
                <h2>ADD PRODUCT</h2>
                
                <form action="../connect/inputProduct.php" method="POST" enctype="multipart/form-data">
                <div class="inv-pic">
                        <div class="inv-content">
                            <img src="../connect/images/blank.png" alt="product pic">
                            <input type="file" name="productImage" id="productImage" class="btn change-btn">
                        </div>
                    </div>

                    <label for="prodName">Product Name</label> <br>
                    <input type="text" name="prodName" id="prodName" required> <br>

                    <label for="prodPrice">Price</label> <br>
                    <input type="number" name="prodPrice" id="prodPrice" required><br>

                    <label for="prodQuantity">Quantity</label> <br>
                    <input type="number" name="prodQuantity" id="prodQuantity" required><br>

                    <label for="prodCategory">Category </label> <br>
                    <select name="prodCategory" id="prodCategory">
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['categoryName']; ?>"><?php echo $category['categoryName']; ?></option>
                        <?php endforeach; ?>
                    </select> <br>

                    <label for="prodSupplier">Supplier</label> <br>
                    <input type="text" name="prodSupplier" id="prodSupplier" required><br>

                    <label for="prodDesc">Description</label> <br>
                    <input type="text" name="prodDesc" id="prodDesc" required><br>

                    <label for="prodExpDate">Expiry Date</label> <br>
                    <input type="date" name="prodExpDate" id="prodExpDate" required><br>
                    
                    <div class="action-buttons">
                        <input type="submit" value="Confirm" class="view-btn btn">
                        <a href="./admin-dashboard-inv-manage.php" class="delete-btn btn">Cancel</a>
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