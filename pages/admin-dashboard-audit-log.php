<?php
    include '../connect/session.php';
    require_once '../connect/config.php';
    
    if(isset($_SESSION['access']) && ($_SESSION['access'] === "user") || !isset($_SESSION['access'])){
        Header("Location: ../pages/index.php");
    } else if ($_SESSION['access'] === "employee") {
        Header("Location: ../pages/admin-dashboard.php");
    }

    $statement = $pdo -> prepare ("SELECT * FROM userlog ORDER BY dateTime DESC");
    $statement -> execute();
    $logs = $statement -> fetchAll();

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
    
    <title>Escafe - Audit Log</title>
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
                <h1>AUDIT LOG</h1>
                <div class="table-rec">
                    <table>
                        <thead>
                            <tr>
                                <th>USER ID</th>
                                <th>USERNAME</th>
                                <th>ACTION</th>
                                <th>DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($logs as $log): ?>
                                <tr>
                                    <td><?php echo $log['id'] ?></td>
                                    <td><?php echo $log['username'] ?></td>
                                    <td><?php echo $log['action'] ?></td>
                                    <td><?php echo $log['dateTime'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </main>


    <!-- FOOTER -->
    <?php include "./footer.php"; ?>
</body>
</html>