<?php
    include '../connect/session.php';
    include_once '../connect/config.php';

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
    // echo '<pre>';
    // var_dump($product[0]['bundledWith']);
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
                <h1>ADD POST</h1>
                


                <label for="prodName">SELECT PHOTO: </label>

                <form action="../connect/editProduct.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
                    <div class="inv-pic">
                        <div class="inv-content">
                            <img src=<?php echo '../connect/'.$product[0]['productImage']?> alt="user pic">
                            <input type="file" name="productImage" id="productImage">
                        </div>
                    </div>

                    
                    <label for="prodPrice">POST TITLE:</label> <br>
                    <input type="number" name="prodPrice" value=<?php echo $product[0]['productPrice']?> id="prodPrice" required><br>
                    <br>

                    <label for="prodQuantity">POST DESCRIPTION:</label> <br>
                    <input type="number" name="prodQuantity" value=<?php echo $product[0]['quantity']?> id="prodQuantity" required><br>

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