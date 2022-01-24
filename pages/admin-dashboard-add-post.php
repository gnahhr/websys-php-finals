<?php
    include '../connect/session.php';
    include_once '../connect/config.php';

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
    
    <title>Escafe - Add Post</title>
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

                <form action="../connect/addPost.php" method="POST" enctype="multipart/form-data" id="add-post">
                    <h3>SELECT PHOTO:</h3>
                    <div class="inv-pic">
                        <div class="inv-content">
                            <input type="file" name="productImage" id="productImage">
                        </div>
                    </div>

                    
                    <label for="postTitle">POST TITLE:</label> <br>
                    <input type="text" name="postTitle" id="postTitle" required><br>
                    <br>

                    <label for="postContent">POST DESCRIPTION:</label> <br>
                    <textarea name="postContent" id="postContent" rows="10" class="post-Content" form="add-post" required></textarea>
                    <div class="action-buttons">
                        <input type="submit" value="Confirm" class="view-btn btn">
                        <a href="./admin-dashboard.php" class="delete-btn btn">Cancel</a>
                    </div>
                </form>
                
            </div>
        </div>
    </main>


    <!-- FOOTER -->
    <?php include './footer.php'; ?>
</body>
</html>