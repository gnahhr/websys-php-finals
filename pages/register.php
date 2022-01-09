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
    
    <title>Escafe - Register</title>
</head>
<body>

    <!-- HEADER -->
    <header>
        <div class="logo-name">
            <div class="logo-head"><img src="../img/index/logo.png" alt="logo"></div>
            <div class="name-head"><p>escafé<p></div>
        </div>
        <nav>
            <ul>
                <li><a href="#">Login</a></li>
                <li><a href="#">Register</a></li>
            </ul>
        </nav>
    </header>

    
    <main>
        <div class="login-form">
            <form action="#" method="post">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" id="firstName" required> <br>
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" id="lastName" required> <br>
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" required> <br>
                <label for="address">Address</label>
                <input type="text" name="address" id="address" required> <br>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required> <br>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required> <br>
                <p>Already have an account? <a href="./login.php">Login</a></p>
                <input type="submit" name="Register" value="Register">
            </form>
        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2022</p>
    </footer>
</body>
</html>