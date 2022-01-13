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
    <header>
        <div class="logo-name">
            <div class="logo-head"><img src="../img/dashboard/logo-green-trim.png" alt="logo"></div>
            <div class="name-head"><p>escafé<p></div>
        </div>

        <h1>ADMIN</h1>

        <nav>
            <ul>
                <li>
                    <h2>INVENTORY</h2>
                    <ul>
                        <li> <a href="#">SUPPLIER</a></li>
                        <li> <a href="#">CATEGORIES</a></li>
                        <li> <a href="#">MANAGE</a></li>
                        <li> <a href="#">STOCKS</a></li>
                    </ul>
                </li>
                <li>
                    <h2>POINT OF SALE</h2>
                    <ul>
                        <li> <a href="#">ORDER ITEMS</a></li>
                        <li> <a href="#">PLACEHOLDER</a></li>
                        <li> <a href="#">PLACEHOLDER</a></li>
                        <li> <a href="#">PLACEHOLDER</a></li>
                    </ul>
                </li>
                <li>
                    <h2>REPORTS</h2>
                    <ul>
                        <li> <a href="#">SALES</a></li>
                        <li> <a href="#">PRODUCT</a></li>
                        <li> <a href="#">PLACEHOLDER</a></li>
                        <li> <a href="#">PLACEHOLDER</a></li>
                    </ul>
                </li>

                <li>
                    <h2>SYSTEM SETTINGS</h2>
                    <ul>
                        <li> <a href="#">SET BALANCE</a></li>
                        <li> <a href="#">UPDATE SITE</a></li>
                        <li> <a href="#">ADD POST</a></li>
                        <li> <a href="#">CONTENT</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <!-- MAIN CONTENTS -->
    <main>
        <div class="main-wrapper">
            <div class="user">  
                <div class="user-text">
                    <p>Hi, $user</p>
                    <a href="#">Logout</a>
                </div>
                <div class="user-image">
                    <img src="../img/users/blank.png" alt="user profile">
                </div>
            </div>
    
            <div class="dashboard-sub">
                <h1>INVENTORY</h1>
                <h2>MANAGE</h2>
                
                <div class="table-rec">
                    <table>
                        <thead>
                            <tr>
                                <th>PRODUCT ID</th>
                                <th>BARCODE</th>
                                <th>NAME</th>
                                <th>QTY</th>
                                <th>EXPIRY DATE</th>
                                <th>SUPPLIER</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr>
                               <td>42069</td>
                               <td>BARCODE</td>
                               <td>Arabica</td>
                               <td>69</td>
                               <td>January 23, 2022</td>
                               <td>FloraTech</td>
                               <td><a href="#" class="view-btn btn">View</a><a href="#" class="delete-btn btn">Delete</a></td>
                           </tr>
                           <tr>
                               <td>42070</td>
                               <td>BARCODE</td>
                               <td>Robusca</td>
                               <td>42</td>
                               <td>January 13, 2022</td>
                               <td>CoBeans Inc.</td>
                               <td><a href="#" class="view-btn btn">View</a><a href="#" class="delete-btn btn">Delete</a></td>
                           </tr>
                        </tbody>
                    </table>
                </div>

                <a href="#" class="view-btn btn add-prod">Add Product</a>
            </div>
        </div>
    </main>


    <!-- FOOTER -->
    <footer>
        <p>&copy; 2022</p>
    </footer>
</body>
</html>