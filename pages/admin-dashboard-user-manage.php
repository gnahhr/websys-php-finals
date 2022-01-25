<?php
    include '../connect/session.php';
    require_once '../connect/config.php';

    if(isset($_SESSION['access']) && ($_SESSION['access'] === "user") || !isset($_SESSION['access'])){
        Header("Location: ../pages/index.php");
    } else if ($_SESSION['access'] === "employee") {
        Header("Location: ../pages/admin-dashboard.php");
    }

    $statement = $pdo -> prepare ("SELECT * FROM userinfo");
    $statement -> execute();
    $users = $statement -> fetchAll();
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
    
    <title>Escafe - Manage Users</title>
</head>
<body>

    <!-- HEADER -->
    <?php include './admin-header.php'; ?>

    <!-- MAIN CONTENTS -->
    <main>
        <div class="main-wrapper">
            <div class="user">  
                <div class="user-text">
                    <p>Hi, <?php echo $_SESSION['username']?></p>
                    <a href="../connect/logout.php">Logout</a>
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
                <h1>MANAGE USERS</h1>

                <div class="table-rec">
                    <table>
                        <thead>
                            <tr>
                                <th>USER ID</th>
                                <th>FIRST NAME</th>
                                <th>LAST NAME</th>
                                <th>EMAIL</th>
                                <th>ADDRESS</th>
                                <th>USERNAME</th>
                                <th>ACCESS LEVEL</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo $user['id'] ?></td>
                                    <td><?php echo $user['firstName'] ?></td>
                                    <td><?php echo $user['lastName'] ?></td>
                                    <td><?php echo $user['email'] ?></td>
                                    <td><?php echo $user['address'] ?></td>
                                    <td><?php echo $user['username'] ?></td>
                                    <td><?php echo $user['accessLevel'] ?></td>
                                    <td>
                                        <a href="admin-dashboard-edit-user.php?id=<?php echo $user['id']?>" class="btn edit-btn">EDIT</a>
                                        <a href="../connect\admin-deleteUser.php?id=<?php echo $user['id']?>"class="btn delete-btn">DELETE</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <a href="admin-dashboard-add-user.php" class="btn view-btn add-prod">ADD USER</a>
            </div>
        </div>
    </main>


    <!-- FOOTER -->
    <?php include "./footer.php"; ?>
</body>
</html>