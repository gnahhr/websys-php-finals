<?php
    session_start();
    $product = $_SESSION['orders'];
    $totalShit = 0;
    $totalItems = 0;
    $productsBought='';

    // echo '<pre>';
    // echo var_dump($product);
    // echo $_SESSION['id'];
    // echo '</pre>';
    foreach ( $product as $order) {
        //echo $order['totalPrice'].'<br>';
        $totalShit += $order['totalPrice'];
        $productsBought .= (string)$order['productID'] . ' - ' . (string)$order['productName'] . ' - ' . (string)$order['quantity'] . ', ';
        $totalItems += $order['quantity'];
    }
    // echo $totalShit.'<br>';
    $totalShit += floatval($totalShit * 0.12) + 50;
    // echo $totalShit.'<br>';
    $productsBought = substr($productsBought,0,-2);
    //echo $productsBought;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user-profile.css">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poor+Story&family=Roboto:wght@300&family=Satisfy&display=swap" rel="stylesheet">
    
    <title>Escafe - Login</title>
</head>
<body>

    <?php include 'user-header.php' ?>
    
    <main>
        <div class="login-form">
        <form action="../connect\checkOutCartKineme.php" method="post">

            

            <label for="productsBought">productsBought:</label><br>
            <input type="text" id="productsBought" name="productsBought" value='<?php echo $productsBought?>'  readonly><br>

            <label for="totalItems">totalItems:</label><br>
            <input type="text" id="totalItems" name="totalItems" value=<?php echo  $totalItems?> readonly><br>
            <h4>Shipping fee: 50php</h4><br>
            <h4>VaT: 12%</h4><br>

            <label for="totalPrice">totalPrice:</label><br>
            <input type="text" id="totalPrice" name="totalPrice" value='<?php echo $totalShit?>'  readonly><br>


            <div class="user-btn1">       
            <button type="submit"class="user-btn">Confirm</button>
            <!-- lagay nalang ng cancel button dito, di ako marunong AHHAHAH -->
            </div>       

        </form>
        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2022</p>
    </footer>
</body>
</html>
