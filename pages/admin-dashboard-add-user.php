<?php
    include '../connect/session.php';
    include_once '../connect/config.php';

    // $id = $_GET['id'];

    // $statement = $pdo -> prepare ("SELECT * FROM userinfo WHERE id = :id ");
    // $statement ->bindValue(':id',$id);
    // $statement -> execute();
    // $user = $statement -> fetch(0);
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
    
    <title>Escafe - Add User</title>
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
                    <img src="../img/users/blank.png" alt="user profile">
                </div>
            </div>
    
            <div class="dashboard-sub">
                <h1>ADD USER</h1>
                
                <form action="../connect\admin-addUser.php" method="POST" >

                    <label for="firstName">First Name:</label> <br>
                    <input type="text" name="firstName" id="firstName" required> <br>

                    <label for="lastName">Last Name:</label> <br>
                    <input type="text" name="lastName" id="lastName" required> <br>

                    <label for="email">E-mail:</label> <br>
                    <input type="text" name="email" id="email" required> <br>

                    <label for="address">Address:</label> <br>
                    <input type="text" name="address" id="address" required> <br>

                    <label for="username">Username:</label> <br> 
                    <input type="text" name="username" id="username" required> <br>

                    <label for="accessLevel">Access Level:</label> <br>
                    <select name="accessLevel" id="accessLevel" required>
                        <option value="user">User</option>
                        <option value="employee">Employee</option>
                        <option value="admin">Admin</option>
                    </select> <br>
                    
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