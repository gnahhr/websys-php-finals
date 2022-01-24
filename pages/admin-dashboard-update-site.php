<?php
    include '../connect/session.php';
    include_once '../connect/config.php';
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
                <h1>UPDATE SITE</h1>
                

                <form action="../connect/updateSite.php>" method="POST" enctype="multipart/form-data">
                    <h3>SELECT NEW LOGO: </h3>
                    <div class="inv-pic">
                        <div class="inv-content">
                            <img src="../img/index/logo.png" alt="user pic">
                            <input type="file" name="siteImage" id="siteImage">
                        </div>
                    </div>

                    
                    <label for="siteName">CHANGE SITE NAME:</label> <br>
                    <input type="text" name="siteName" value="<?php echo $siteName; ?>" id="prodPrice" required><br>
                    <br>

                    <label for="balance">SET USER BALANCE:</label> <br>
                    <input type="number" name="balance" value=<?php echo $site['balance']?> id="prodQuantity" required><br>

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