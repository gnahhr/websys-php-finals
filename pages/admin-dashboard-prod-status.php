<?php
    include '../connect/session.php';
    require_once '../connect/config.php';

    $statement = $pdo -> prepare ("SELECT * FROM products ORDER BY expirationDate DESC");
    $statement -> execute();
    $products = $statement -> fetchAll(PDO::FETCH_ASSOC);
    // echo '<pre>';
    // var_dump($productsHolder);
    // echo '</pre>';
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
                <h1>PRODUCT</h1>
                <h2>STATUS</h2>
                
                <div class="table-rec">
                    <table>
                        <thead>
                            <tr>
                                <th>PRODUCT</th>
                                <th>EXPIRY DATE</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach($products as $products){ ?>
                                <tr>
                                    <td><?php echo $products['productName'] ?>  </td>
                                    <td><?php echo $products['expirationDate'] ?>  </td>
                                    <td>
                                        <a href="admin-dashboard-edit-prod.php?id=<?php echo $products['productID']?>" class="edit-btn btn">Edit</a>
                                        <a href="../connect/deleteProduct.php?id=<?php echo $products['productID']?>" class="delete-btn btn">Delete</a>
                                    </td>
                                </tr>
                            <?php }?>
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>


    <!-- FOOTER -->
    <footer>
        <p>&copy; 2022</p>
    </footer>
</body>
</html>