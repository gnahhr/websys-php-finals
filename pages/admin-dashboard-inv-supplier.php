<?php
    include '../connect/session.php';
    require_once '../connect/config.php';

    if(isset($_SESSION['access']) && ($_SESSION['access'] === "user") || !isset($_SESSION['access'])){
        Header("Location: ../pages/index.php");
    } else if ($_SESSION['access'] === "employee") {
        Header("Location: ../pages/admin-dashboard.php");
    }

    //Get all data from supplier
    $statement = $pdo -> prepare ("SELECT * FROM supplier");
    $statement -> execute();
    $suppliers = $statement -> fetchAll();
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
    
    <title>Escafe - Supplier Management</title>
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
                <h2>SUPPLIER</h2>
                
                <div class="table-rec">
                    <table>
                        <thead>
                            <tr>
                                <th>Supplier Name</th>
                                <th>Item Supplied</th>
                                <th>Location</th>
                                <th>Contact Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($suppliers as $supplier): ?>
                                <tr>
                                    <td><?php echo $supplier['supplierName']; ?></td>
                                    <td><?php echo $supplier['itemSupplied']; ?></td>
                                    <td><?php echo $supplier['location']; ?></td>
                                    <td><?php echo $supplier['contactNumber']; ?></td>
                                    <td>
                                        <a href="./admin-dashboard-edit-supplier.php?supplierID=<?php echo $supplier['supplierID']; ?>" class="edit-btn btn">Edit</a>
                                        <a href="../connect/deleteSupplier.php?supplierID=<?php echo $supplier['supplierID']; ?>" class="delete-btn btn">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <a href="./admin-dashboard-add-supplier.php" class="view-btn btn add-prod">Add Supplier</a>
            </div>
        </div>
    </main>


    <!-- FOOTER -->
    <?php include "./footer.php"; ?>
</body>
</html>