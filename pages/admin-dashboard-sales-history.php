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
                <h1>SALES HISTORY</h1>
                
                <form action="POST">
                    <input type="radio" name="salesHist" id="perTransaction" value="perTransaction">
                    <label for="perTransaction">Per Transaction</label>
                    <input type="radio" name="salesHist" id="perDay" value="perDay">
                    <label for="perTransaction">Per Day</label>
                    <input type="radio" name="salesHist" id="perWeek" value="perWeek">
                    <label for="perTransaction">Per Week</label>
                    <input type="radio" name="salesHist" id="perMonth" value="perMonth">
                    <label for="perTransaction">Per Month</label>
                    <input type="radio" name="salesHist" id="perYear" value="perYear">
                    <label for="perTransaction">Per Year</label>

                    <input type="submit" value="Sort">
                </form>

                <div class="table-rec">
                    <table>
                        <thead>
                            <tr>
                                <th>ORDER ID</th>
                                <th>USERNAME</th>
                                <th>PRODUCTS</th>
                                <th>TOTAL PRICE</th>
                                <th>DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr>
                               <td>42069</td>
                               <td>BARCODE</td>
                               <td>Arabica</td>
                               <td>69</td>
                               <td>January 23, 2022</td>
                           </tr>
                           <tr>
                               <td>42070</td>
                               <td>BARCODE</td>
                               <td>Robusca</td>
                               <td>42</td>
                               <td>January 13, 2022</td>
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