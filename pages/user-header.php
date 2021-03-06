<!-- HEADER -->
<?php
    include '../connect/config.php';
    $profilePic = $_SESSION['profilePic'] ?? null;
?>
<header>
    <!-- escafé -->
    <div class="logo-name">
        <div class="logo-head"><img src='<?php echo $siteLogo ?>' alt="logo"></div>
        <div class="name-head"><p><?php echo $siteName ?><p></div>
    </div>


    <nav>
        <?php if (isset($_SESSION['username'])): ?>
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./shop.php">Shop</a></li>
                <li><a href="./cart.php">Cart</a></li>
                <li><a href="./order-history.php">Orders</a></li>
                <li><a href="./user-profile.php">Profile</a></li>
            </ul>

            <div class="user">  
                <div class="user-text">
                    <p>Hi, <?php echo $_SESSION['username'] ?> </p>
                    <a href="../connect/logout.php">Logout</a>
                </div>
                <div class="user-image">
                    <img src='<?php
                                    if($profilePic != null)
                                        echo '../connect/'.$profilePic;
                                    else
                                        echo '../img/users/blank.png';
                                    
                              ?>' alt="Profile Pic">
                </div>
            </div>

        <?php else: ?>
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./login.php">Login</a></li>
                <li><a href="./register.php">Register</a></li>
                <li><a href="./shop.php">Shop</a></li>
            </ul>
        <?php endif; ?>
    </nav>
</header>