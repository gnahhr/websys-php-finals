<?php
    include '../connect/session.php';
    include_once '../connect/config.php';

    $id = $_GET['id'];

    $statement = $pdo -> prepare ("SELECT * FROM userinfo WHERE id = :id ");
    $statement ->bindValue(':id',$id);
    $statement -> execute();
    $user = $statement -> fetchAll(PDO::FETCH_ASSOC);
    // echo '<pre>';
    // var_dump($user);
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
    
    <title>Escafe - Edit Users</title>
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
                    <a href="../connect/logout.php">Logout</a>
                </div>
                <div class="user-image">
                    <img src="../img/users/blank.png" alt="user profile">
                </div>
            </div>
    
            <div class="dashboard-sub">
                <h1>EDIT USER</h1>
                
                <form action="../connect/admin-editUser.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
                    <div class="inv-pic">
                        <div class="inv-content">
                            <img src='<?php
                                    if($user[0]['profilePic'] != null)
                                        echo '../connect/'.$user[0]['profilePic'];
                                    else
                                        echo '../img/users/blank.png';
                              ?>' alt="user pic">
                            <input type="file" name="profilePic" id="profilePic">
                        </div>
                    </div>

                    <label for="firstName">First Name:</label> <br>
                    <input type="text" name="firstName" id="firstName" value ="<?php echo $user[0]['firstName']; ?>" required> <br>

                    <label for="lastName">Last Name:</label> <br>
                    <input type="text" name="lastName" id="lastName" value ="<?php echo $user[0]['lastName']; ?>" required> <br>

                    <label for="email">E-mail:</label> <br>
                    <input type="text" name="email" id="email" value ="<?php echo $user[0]['email']; ?>" required> <br>

                    <label for="address">Address:</label> <br>
                    <input type="text" name="address" id="address" value ="<?php echo $user[0]['address']; ?>" required> <br>

                    <label for="username">Username:</label> <br> 
                    <input type="text" name="username" id="username" value ="<?php echo $user[0]['username']; ?>" required> <br>

                    <label for="accessLevel">Access Level:</label> <br>
                    <select name="accessLevel" id="accessLevel">
                        <option value="user">User</option>
                        <option value="employee">Employee</option>
                        <option value="admin">Admin</option>
                    </select> <br>
                    
                    <div class="action-buttons">
                        <input type="submit" value="Confirm" class="view-btn btn">
                        <a href="admin-dashboard-user-manage.php" class="delete-btn btn">Cancel</a>
                    </div>
                </form>
                
            </div>
        </div>
    </main>


    <!-- FOOTER -->
    <?php include './footer.php'; ?>
</body>
</html>