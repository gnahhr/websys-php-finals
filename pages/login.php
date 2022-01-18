<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/logreg.css">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poor+Story&family=Roboto:wght@300&family=Satisfy&display=swap" rel="stylesheet">
    
    <title>Escafe - Login</title>
</head>
<body>

    <!-- HEADER -->
    <?php include 'user-header.php' ?>
    
    <main>
        <div class="login-form">
            <form action="../connect/loginRouter.php" method="POST">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required> <br>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                <p>Don't have an account? <a href="./register.php">Sign Up</a></p>
                <input type="submit" name="Login" value="Login">
            </form>
        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2022</p>
    </footer>
</body>
</html>