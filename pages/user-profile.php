<?php
    include '../connect/config.php';

    session_start();
    $id = $_SESSION['id'];
    $profilePic = $_SESSION['profilePic'];
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
    $email = $_SESSION['email'];
    $address = $_SESSION['address'];
    $username = $_SESSION['username'];
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
        <form action="../connect/editUser.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data">

            <div class="user-img">
                <div class="user-img-content">
                    <img src='<?php echo '../connect/'.$profilePic?>' alt="Profile Pic">
                    <input type="file" name="userPic" id="userPic" class="btn change-btn"> <br>
                </div>
            </div>


            <label for="firstName">First name:</label><br>
            <input type="text" id="firstName" name="firstName" value=<?php echo $firstName?> required><br>

            <label for="lastName">Last name:</label><br>
            <input type="text" id="lastName" name="lastName" value=<?php echo $lastName?>  required><br>

            <label for="email">E-mail:</label><br>
            <input type="text" id="email" name="email" value=<?php echo $email?> required><br>

            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address" value='<?php echo $address?>'  required><br>

            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" value=<?php echo $username?> required><br>

            
            <!-- <label for="oldPassword">Old Password:</label><br>
            <input type="password" id="oldPassword" name="oldPassword" required><br>
            
            <label for="newPassword">New Password:</label><br>
            <input type="password" id="newPassword" name="newPassword"  required><br>  -->

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