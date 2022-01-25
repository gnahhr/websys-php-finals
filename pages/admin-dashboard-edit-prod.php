<?php
    include '../connect/session.php';
    include_once '../connect/config.php';

    if(isset($_SESSION['access']) && ($_SESSION['access'] === "user") || !isset($_SESSION['access'])){
        Header("Location: ../pages/index.php");
    }

    $id = $_GET['id'];

    $statement = $pdo -> prepare ("SELECT * FROM products WHERE productID = :id ");
    $statement ->bindValue(':id',$id);
    $statement -> execute();
    $product = $statement -> fetchAll(PDO::FETCH_ASSOC);

    $statement = $pdo -> prepare ("SELECT * FROM products");
    $statement -> execute();
    $products = $statement -> fetchAll(PDO::FETCH_ASSOC);

    $statement = $pdo -> prepare ("SELECT * FROM categories");
    $statement -> execute();
    $categories = $statement -> fetchAll(PDO::FETCH_ASSOC);

    $statement = $pdo -> prepare ("SELECT * FROM supplier");
    $statement -> execute();
    $suppliers = $statement -> fetchAll(PDO::FETCH_ASSOC);
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
    
    <title>Escafe - Edit Product</title>
</head>
<body>

    <!-- HEADER -->
    <?php include 'admin-header.php'; ?>

    <!-- MAIN CONTENTS -->
    <main>
        <div class="main-wrapper">
            <div class="user">  
                <div class="user-text">
                    <p>Hi, <?php echo $_SESSION['username']?></p>
                    <a href="logout.php">Logout</a>
                </div>
                <div class="user-image">
                    <img src='<?php
                                    if($pic != null)
                                        echo '../connect/'.$pic;
                                    else
                                        echo '../img/users/blank.png';
                                    
                              ?>' alt="Profile Pic">
                </div>
            </div>
    
            <div class="dashboard-sub">
                <h1>INVENTORY - <?php echo $product[0]['productName'];?></h1>
                <h2>EDIT</h2>
                
                <form action="../connect/editProduct.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
                    <div class="inv-pic">
                        <div class="inv-content">
                            <img src="<?php echo '../connect/'.$product[0]['productImage']?>" alt="user pic">
                            <input type="file" name="productImage" id="productImage">
                        </div>
                    </div>

                    <label for="prodName">Product Name</label> <br>
                    <input type="text" name="prodName" value="<?php echo $product[0]['productName']?>" id="prodName" required><br>

                    <label for="prodCat">Category </label> <br>
                    <select name="prodCat" id="prodCat">
                        <?php foreach ($categories as $category): ?>
                            <?php if (($category['categoryName'] == $product[0]['productCategory'])): ?>
                                <option value="<?php echo $category['categoryName']; ?>" selected><?php echo $category['categoryName']; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $category['categoryName']; ?>"><?php echo $category['categoryName']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select> <br>

                    <label for="prodPrice">Price</label> <br>
                    <input type="number" name="prodPrice" value=<?php echo $product[0]['productPrice']?> id="prodPrice" min="0" required><br>

                    <label for="discount">Discount</label> <br>
                    <input type="number" name="discount" value=<?php echo $product[0]['discount']?> id="discount" min="0" max="80" value="0" required><br>

                    <label for="bundledWith">Bundled with: </label> <br>
                    <select name="bundledWith" id="bundledWith">
                        <option value="NULL">NONE</option>
                        <?php foreach ($products as $optionProd): ?>
                            <?php if (isset($product[0]['bundledWith']) && ($optionProd['productID'] == $product[0]['bundledWith'])): ?>
                                <option value="<?php echo $optionProd['productID']; ?>>" selected><?php echo $optionProd['productName']; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $optionProd['productID']; ?>>"><?php echo $optionProd['productName']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select> <br>

                    <label for="prodQuantity">Qty</label> <br>
                    <input type="number" name="prodQuantity" value=<?php echo $product[0]['quantity']?> id="prodQuantity" required><br>
                    
                    <label for="prodSupplier">Supplier</label> <br>
                    <select name="prodSupplier" id="prodSupplier">
                        <?php foreach ($suppliers as $supplier): ?>
                            <option value="<?php echo $supplier['supplierName']; ?>" <?php if($product[0]['supplierName'] === $supplier['supplierName']) echo "selected"; ?>>
                                <?php echo $supplier['supplierName']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select> <br>

                    <label for="prodDesc">Description</label> <br>
                    <input type="text" name="prodDesc" value="<?php echo $product[0]['productDescription']?>" id="prodDesc" required><br>
                    
                    <label for="prodExpDate">Expiry Date</label> <br>
                    <input type="date" name="prodExpDate" value=<?php echo $product[0]['expirationDate']?> id="prodExpDate" ><br>
                    
                    <div class="action-buttons">
                        <input type="submit" value="Confirm" class="view-btn btn">
                        <a href="./admin-dashboard-inv-manage.php" class="delete-btn btn">Cancel</a>
                    </div>
                </form>
                
            </div>
        </div>
    </main>


    <!-- FOOTER -->
    <?php include './footer.php'; ?>
</body>
</html>