<?php
    include '../connect/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poor+Story&family=Roboto:wght@300&family=Satisfy&display=swap" rel="stylesheet">
    
    <title>Escafe</title>
</head>
<body>

    <!-- HEADER -->
    <?php include './user-header.php' ?>
    
    <main>
        <!-- HERO -->
        <div class="hero">
            <div class="backdrop">
                <div class="hero-content">
                    <h1><?php echo $siteName; ?></h1>
                    <p>Escape through your coffee.</p>
                    <a href="./shop.php">Shop Now!</a>
                </div>
            </div>
        </div>

        <!-- ABOUT -->
        <div class="about">
            <div class="about-backdrop">
                <div class="about-title">
                    <h1>About</h1>
                </div>
                <div class="about-content">
                    <p>At Escafé, we understand that everyone is different and strive to help each customer find the brew that suits him or her best. That&apos;s why we offer a variety of high-quality coffees that satisfy a wide range of tastes and preferences.</p>
                    <br>
                    <p>Our method is simple: choose the highest  quality coffee beans and match them with expert roasters and other skilled local workers who then perfectly roast them in exclusive blends.
                        This recipe has been the key to our success for over thirty years. We feature the region&apos;s best coffees, produced responsibly and roasted to perfection.</p>
                </div>
            </div>
        </div>

        <!-- BREWS -->
        <!-- BREWS are placeholders  -->
        <div class="brews">
            <h1>Brews</h1>
            <div class="brews-contents">
                <div class="coffee">
                    <div class="coffee-img">
                        <img src="../img/index/arabica.png" alt="arabica">
                    </div>
                    <div class="coffee-name">
                        <p class="name">Arabica</p>
                        <p class="latin">(Coffea arabica)</p>
                    </div>
                </div>
                <div class="coffee">
                    <div class="coffee-img">
                        <img src="../img/index/robusca.png" alt="robusca">
                    </div>
                    <div class="coffee-name">
                        <p class="name">Robusca</p>
                        <p class="latin">(Coffea caniphora)</p>
                    </div>
                </div>
                <div class="coffee">
                    <div class="coffee-img">
                        <img src="../img/index/exelsa.png" alt="exelsa">
                    </div>
                    <div class="coffee-name">
                        <p class="name">Excelsa</p>
                        <p class="latin">(Coffea excelsa)</p>
                    </div>
                </div>
                <div class="coffee">
                    <div class="coffee-img">
                        <img src="../img/index/liberica.png" alt="liberica">
                    </div>
                    <div class="coffee-name">
                        <p class="name">Liberica</p>
                        <p class="latin">(Coffea liberica)</p>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <?php include "./footer.php"; ?>
</body>
</html>