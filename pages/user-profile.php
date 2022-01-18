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
        <form action="../connect/editUser.php" method="post">
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
            <button type="submit"class="user-btn">edit</button>
            <!-- <button class="user-btn">save</button> -->
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