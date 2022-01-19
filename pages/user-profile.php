<?php
    include '../connect/session.php';
    echo 'pra'
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
    
    <title>Escafe - Login</title>
</head>
<body>

    <?php include 'user-header.php' ?>
    
    <main>
        <div class="login-form">
        <form action="../connect/editUser.php" method="post">

            <div class="user-img">
                <div class="user-img-content">
                    <img src="../img/users/blank.png" alt="Profile Pic">
                    <input type="file" name="userPic" id="userPic" class="btn change-btn"> <br>
                </div>
            </div>


            <label for="firstName">First name:</label><br>
            <input type="text" id="firstName" name="firstName"><br>

            <label for="lastName">Last name:</label><br>
            <input type="text" id="lastName" name="lastName"><br>

            <label for="email">E-mail:</label><br>
            <input type="text" id="email" name="email"><br>

            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address"><br>

            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br>

            <label for="password">Password:</label><br>
            <input type="text" id="password" name="password"><br>

            <div class="user-btn1">       
            <button type="submit"class="user-btn">Edit</button>
            
            </div>       

        </form>
        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2022</p>
    </footer>
</body>
</html>