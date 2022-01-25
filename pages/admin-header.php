<header>
        <div class="logo-name">
            <div class="logo-head"><img src="../img/dashboard/logo-green-trim.png" alt="logo"></div>
            <div class="name-head"><p><?php echo $siteName ?><p><p></div>
        </div>

        <h1>ADMIN</h1>

        <nav>
            <ul>
                <h2><a href="./admin-dashboard.php">HOME</a></h2>
                <li>
                    <h2>MANAGE</h2>
                    <ul>
                        <?php if ($_SESSION['access'] === "admin"): ?>
                            <li><a href="./admin-dashboard-inv-supplier.php">SUPPLIER</a></li>
                            <li><a href="./admin-dashboard-inv-category.php">CATEGORY</a></li>
                        <?php endif; ?>
                        <li><a href="./admin-dashboard-inv-manage.php">INVENTORY</a></li>
                        <li><a href="./admin-dashboard-prod-status.php">PRODUCT STATUS</a></li>

                    </ul>
                </li>
                <li>
                    <h2>POINT OF SALE</h2>
                    <ul>
                        <?php if ($_SESSION['access'] === "admin"): ?>
                            <li> <a href="./admin-dashboard-order-status.php">ORDERS</a></li>
                        <?php endif; ?>
                        <li> <a href="./admin-dashboard-payments.php">PAYMENTS</a></li>
                    </ul>
                </li>
                <?php if ($_SESSION['access'] === "admin"): ?>
                <li>
                    <h2>REPORTS</h2>
                    <ul>
                        <li> <a href="./admin-dashboard-sales-history.php">SALES HISTORY</a></li>
                        <li> <a href="../connect/exportSales.php">EXPORT SALES</a></li>
                        <li> <a href="../connect/exportPayments.php">EXPORT PAYMENTS</a></li>
                        <li> <a href="../connect/exportAuditTrail.php">EXPORT LOGS</a></li>
                    </ul>
                </li>
                <li>
                    <h2>SYSTEM SETTINGS</h2>
                    <ul>
                        <li> <a href="./admin-dashboard-update-site.php">UPDATE SITE</a></li>
                        <li> <a href="./admin-dashboard-user-manage.php">MANAGE USERS</a></li>
                        <li> <a href="./admin-dashboard-audit-log.php">AUDIT LOG</a></li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>