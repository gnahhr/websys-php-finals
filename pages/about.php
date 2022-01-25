<?php
    session_start();
    include '../connect/config.php';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user-profile.css">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poor+Story&family=Roboto:wght@300&family=Satisfy&display=swap" rel="stylesheet">
    
    <title>Escafe - User Profile</title>
</head>
<body>

    <?php include 'user-header.php' ?>
    
    <main>
        <h1> ABOUT US </h1>

        <div class="login-form">
        <form action="../connect/editUser.php" method="post" enctype="multipart/form-data">
            <p>We are Group 2 of Bachelor of Science in Computer Science 3A this Website is made for educational purposes only. </p> <br>

            <P> Group Members: <br><br>
                Domingo, Matt Gabriel <br>
                Ocampo, Joshua kyle <br>
                Capati, Patrick Jan <br>
                Magat, Kimberly joy <br>
                Aton, Kristine kelly <br>
                Intal, Khaye <br><br>

            <p>Reference: <br><br>
                https://goodcup.ph/collections/brewing-gear <br>
                https://stoutcoffeeph.com/product-category/brew-gear/ <br>
                https://stoutcoffeeph.com/product-category/local-coffee-beans/
            </p>
        </form>
        </div>
    </main>

    <!-- FOOTER -->
    <?php include "./footer.php"; ?>
</body>
</html>