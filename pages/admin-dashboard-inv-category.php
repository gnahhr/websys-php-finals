<?php
    include '../connect/session.php';
    require_once '../connect/config.php';

    $statement = $pdo -> prepare ("SELECT * FROM categories");
    $statement -> execute();
    $categories = $statement -> fetchAll(PDO::FETCH_ASSOC);
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
                <h1>INVENTORY</h1>
                <h2>MANAGE</h2>
                
                <div class="table-rec">
                    <table>
                        <thead>
                            <tr>
                                <th>CATEGORY ID</th>
                                <th>CATEGORY NAME</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach($categories as $category){ ?>
                                <tr>
                                    <td><?php echo $category['categoryID'] ?></td>
                                    <td><?php echo $category['categoryName'] ?></td>
                                    <td>
                                        <a href="../connect/deleteCategory.php?id=<?php echo $category['categoryID']?>" class="delete-btn btn">Delete</a>
                                    </td>
                                </tr>
                            <?php }?>
                            
                        </tbody>
                    </table>
                </div>
                
                <form action="../connect/addCategory.php" method="post">
                    <label for="categoryName">Category Name: </label><br>
                    <input type="text" name="categoryName" id="categoryName">
                    <input type="submit" value="Add Category" class="btn view-btn add-prod">
                </form>
                <!-- <a href="./admin-dashboard-add-prod.php" class="view-btn btn add-prod">Add Category</a> -->
            </div>
        </div>
    </main>


    <!-- FOOTER -->
    <footer>
        <p>&copy; 2022</p>
    </footer>
</body>
</html>
