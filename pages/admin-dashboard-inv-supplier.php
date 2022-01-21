<?php include '../connect/session.php'; ?>

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
    
    <title>Escafe - Admin Dashboard</title>
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
                    <img src="../img/users/blank.png" alt="user profile">
                </div>
            </div>
    
            <div class="dashboard-sub">
                <h1>INVENTORY</h1>
                <h2>SUPPLIER</h2>
                
                <div class="table-rec">
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    Supplier Name
                                </th>
                                <th>
                                    Item Supplied
                                </th>
                                <th>
                                    Location
                                </th>
                                <th>
                                    Contact Number
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    FloraTech
                                </td>
                                <td>
                                    Arabica
                                </td>
                                <td>
                                    Laguna
                                </td>
                                <td>
                                    +639223461578
                                </td>
                                <td>
                                    <a href="#" class="edit-btn btn">Edit</a>
                                    <a href="#" class="delete-btn btn">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    CoBeans Inc.
                                </td>
                                <td>
                                    Robusca
                                </td>
                                <td>
                                    Bicol
                                </td>
                                <td>
                                    +639223213478
                                </td>
                                <td>
                                    <a href="#" class="edit-btn btn">Edit</a>
                                    <a href="#" class="delete-btn btn">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                
            </div>
        </div>
    </main>


    <!-- FOOTER -->
    <footer>
        <p>&copy; 2022</p>
    </footer>
</body>
</html>