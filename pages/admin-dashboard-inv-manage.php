<?php
    include '../connect/session.php';
    require_once '../connect/config.php';
    require '../vendor/autoload.php';

    if(isset($_SESSION['access']) && ($_SESSION['access'] === "user") || !isset($_SESSION['access'])){
        Header("Location: ../pages/index.php");
    }

    $statement = $pdo -> prepare ("SELECT * FROM products ORDER BY expirationDate DESC");
    $statement -> execute();
    $products = $statement -> fetchAll(PDO::FETCH_ASSOC);

    //Used to generate barcode
    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
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
    
    <title>Escafe - Inventory Management</title>
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
                    <img src='<?php
                                    if($pic != null)
                                        echo '../connect/'.$pic;
                                    else
                                        echo '../img/users/blank.png';
                                    
                              ?>' alt="Profile Pic">
                </div>
            </div>
    
            <div class="dashboard-sub">
                <h1>INVENTORY</h1>
                <h2>MANAGE</h2>
                
                <div class="table-rec">
                    <table>
                        <thead>
                            <tr>
                                <th>PRODUCT IMAGE</th>
                                <th>PRODUCT NAME</th>
                                <th>BARCODE</th>
                                <th>PRODUCT CATEGORY</th>
                                <th>PRODUCT PRICE</th>
                                <th>QTY</th>
                                <th>SUPPLIER</th>
                                <th>EXPIRY DATE</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($products as $products){ ?>
                                <tr>
                                    <td>
                                        <img src='<?php echo '../connect/'.$products['productImage']?>' class="inv-image">
                                    </td>
                                    <td><?php echo $products['productName'] ?></td>
                                    <td><?php echo $generator -> getBarcode($products['productID'], Picqer\Barcode\BarcodeGeneratorSVG::TYPE_UPC_A); ?></td>
                                    <td><?php echo $products['productCategory'] ?></td>
                                    <td><?php echo $products['productPrice'] ?></td>
                                    <td><?php echo $products['quantity'] ?></td>
                                    <td><?php echo $products['supplierName'] ?></td>
                                    <td><?php echo $products['expirationDate'] ?></td>
                                    <td class="actions-col">
                                        <a href="admin-dashboard-edit-prod.php?id=<?php echo $products['productID']?>" class="edit-btn btn">Edit</a>
                                        <a href="../connect/deleteProduct.php?id=<?php echo $products['productID']?>" class="delete-btn btn">Delete</a>
                                        <a href="../connect/saveBarcode.php?id=<?php echo $products['productID']?>&name=<?php echo $products['productName']; ?>" class="view-btn btn">Save Barcode</a>
                                    </td>
                                </tr>
                            <?php }?>
                            
                        </tbody>
                    </table>
                </div>

                <a href="./admin-dashboard-add-prod.php" class="view-btn btn add-prod">Add Product</a>
            </div>
        </div>
    </main>


    <!-- FOOTER -->
    <?php include "./footer.php"; ?>
</body>
</html>
