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
    
            <div class="dashboard-main">
                <h1>DASHBOARD</h1>
    
                <!-- MAIN SALES -->
                <h2>SALES</h2>
                <div class="main-sales">
                    <div class="sales-cont total-income">
                        <h3>Total Income</h3>
                        <p>Php. 60,000.00</p>
                    </div>
                    <div class="sales-cont total-expenses">
                        <h3>Total Expenses</h3>
                        <p>Php. 30, 000.00</p>
                    </div>
                    <div class="sales-cont net-profit">
                        <h3>Net Profit</h3>
                        <p>Php. 30,000.00</p>
                    </div>
                    <div class="sales-cont balance">
                        <h3>Balance</h3>
                        <p>Php. 100,000.00</p>
                    </div>
                </div>
    
                <!-- INVENTORY SUMMARY -->
                <h2>INVENTORY SUMMARY</h2>
                <div class="inventory-summary">
                    <div class="current-stocks">
                        <h3>CURRENT STOCKS</h3>
                        <div class="table-round">
                            <table>
                                <tr>
                                    <th>Item</th>
                                    <th>Qty</th>
                                </tr>
                                <tr>
                                    <td>Something 1</td>
                                    <td>60</td>
                                </tr>
                                <tr>
                                    <td>Something 2</td>
                                    <td>9</td>
                                </tr>
                                <tr>
                                    <td>Something 3</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>Something 4</td>
                                    <td>20</td>
                                </tr>
                            </table>
                        </div>
                    </div>
    
                    <div class="arrival">
                        <h3>ARRIVAL OF GOODS</h3>
                        <div class="table-round">
                            <table>
                                <tr>
                                    <th>Item</th>
                                    <th>Supplier</th>
                                    <th>ETA</th>
                                </tr>
                                <tr>
                                    <td>Something 1</td>
                                    <td>Supplier 1</td>
                                    <td>January 20, 2022</td>
                                </tr>
                                <tr>
                                    <td>Something 2</td>
                                    <td>Supplier 2</td>
                                    <td>January 20, 2022</td>
                                </tr>
                                <tr>
                                    <td>Something 3</td>
                                    <td>Supplier 3</td>
                                    <td>January 20, 2022</td>
                                </tr>
                                <tr>
                                    <td>Something 4</td>
                                    <td>Supplier 4</td>
                                    <td>January 20, 2022</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
    
                <!-- ORDERS -->
                <h2>ORDERS</h2>
                <div class="main-orders">
                    <div class="preparing">
                        <h3>PREPARING</h3>
                        <div class="table-round">
                            <table>
                                <tr>
                                    <th>Item</th>
                                    <th>Qty</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>Something 1</td>
                                    <td>4</td>
                                    <td><button>Done</button><button>Cancel</button></td>
                                </tr>
                                <tr>
                                    <td>Something 2</td>
                                    <td>20</td>
                                    <td><button>Done</button><button>Cancel</button></td>
                                </tr>
                                <tr>
                                    <td>Something 3</td>
                                    <td>60</td>
                                    <td><button>Done</button><button>Cancel</button></td>
                                </tr>
                                <tr>
                                    <td>Something 4</td>
                                    <td>9</td>
                                    <td><button>Done</button><button>Cancel</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
    
                    <div class="on-return">
                        <h3>ON-RETURN</h3>
                        <div class="table-round">
                            <table>
                                <tr>
                                    <th>Item</th>
                                    <th>Reason</th>
                                    <th>ETA</th>
                                </tr>
                                <tr>
                                    <td>Something 1</td>
                                    <td>Ewan</td>
                                    <td>January 20, 2022</td>
                                </tr>
                                <tr>
                                    <td>Something 2</td>
                                    <td>Ewan</td>
                                    <td>January 20, 2022</td>
                                </tr>
                                <tr>
                                    <td>Something 3</td>
                                    <td>Ewan</td>
                                    <td>January 20, 2022</td>
                                </tr>
                                <tr>
                                    <td>Something 4</td>
                                    <td>Ewan</td>
                                    <td>January 20, 2022</td>
                                </tr>
                            </table>
                        </div>
                    </div>
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