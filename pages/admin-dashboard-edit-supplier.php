<?php

    include '../connect/session.php';
    require_once '../connect/config.php';

    if(isset($_SESSION['access']) && ($_SESSION['access'] === "user") || !isset($_SESSION['access'])){
        Header("Location: ../pages/index.php");
    } else if ($_SESSION['access'] === "employee") {
        Header("Location: ../pages/admin-dashboard.php");
    }

    //Get supplier with the id of the passed supplierID
    $statement = $pdo -> prepare("SELECT * FROM supplier WHERE supplierID = :id");
    $statement -> execute([
        ':id' => $_GET['supplierID']
    ]);
    $supplier = $statement -> fetch(0);
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
    
    <title>Escafe - Edit Supplier</title>
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
                <h2>EDIT SUPPLIER</h2>
                
                <form action="../connect/editSupplier.php?supplierID=<?php echo $supplier['supplierID'] ?>" method="post">

                    <label for="supplierName">Supplier Name</label> <br>
                    <input type="text" name="supplierName" id="supplierName" value="<?php echo $supplier['supplierName']; ?>"> <br>
                    <label for="itemSupplied">Item Supplied</label> <br>
                    <input type="text" name="itemSupplied" id="itemSupplied" value="<?php echo $supplier['itemSupplied']; ?>"><br>
                    <label for="location">Location</label> <br>
                    <input type="text" name="location" id="location" value="<?php echo $supplier['location']; ?>"> <br>
                    <label for="contactNumber">Contact Number</label> <br>
                    <input type="text" name="contactNumber" id="contactNumber" value="<?php echo $supplier['contactNumber']; ?>"><br>
                    
                    <div class="action-buttons">
                        <input type="submit" value="Confirm" class="view-btn btn">
                        <a href="./admin-dashboard-inv-supplier.php" class="delete-btn btn">Cancel</a>
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