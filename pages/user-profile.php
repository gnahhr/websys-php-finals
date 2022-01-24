<?php
    session_start();
    include '../connect/config.php';
    
    $id = $_SESSION['id'];
    $profilePic = $_SESSION['profilePic'] ?? null;
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
    $email = $_SESSION['email'];
    $address = $_SESSION['address'];
    $username = $_SESSION['username'];

    $statement = $pdo -> prepare ("SELECT * FROM userInfo WHERE username = :username");
    $statement -> execute([':username' => $username]);
    $user = $statement -> fetchAll(PDO::FETCH_ASSOC);
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
        <form action="../connect/editUser.php" method="post" enctype="multipart/form-data">

            <div class="user-img">
                <div class="user-img-content">
                    <img src='<?php
                                    if($pic != null)
                                        echo '../connect/'.$pic;
                                    else
                                        echo '../img/users/blank.png';
                                    
                              ?>' alt="Profile Pic">
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

            
            <label for="currentPassword">Current Password:</label><br>
            <input type="password" id="currentPassword" name="currentPassword" required><br>
            
            <label for="newPassword">New Password:</label><br>
            <input type="password" id="newPassword" name="newPassword"  ><br> 

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