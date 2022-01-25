<?php
    session_start();
    require_once '../connect/config.php';
    $product = $_SESSION['orders'];
    $totalPrice = 0;
    $totalItems = 0;
    $productsBought='';

    $proceed = true;

    //Check if there is enough product quantity
    foreach ($product as $key => $order) {
        //Select products from the database based on the order session
        $statement = $pdo -> prepare ("SELECT quantity FROM products WHERE productID = :productID");
        $statement -> bindValue(':productID', $order['productID']);
        $statement -> execute();

        $qty = $statement -> fetchAll();

        //Check if stocks are within the quantity in the cart
        if($order['quantity']<= $qty[0]['quantity']) 
            continue;
        else{
            //Delete product from the cart if the stock is too low
            unset($product[$key]);
            $proceed = false;
            break;
        }
    }

    //If there is a product that is low on stock, update the cart items, and redirect to cart
    if($proceed == false){
        $_SESSION['orders'] = $product;
        header("Location: ../pages/cart.php");
    }

    //If there are enough stocks proceed
    foreach ($product as $order) {
        //Select the quantity of the products in the database
        $statement = $pdo -> prepare ("SELECT quantity FROM products WHERE productID = :productID");
        $statement -> execute([
            ':productID' => $order['productID']
        ]);
        $qty = $statement -> fetch(0);
        
        //Summation of the price within the cart items
        $totalPrice += $order['totalPrice'];
        
        //Format the string of the ordered products to be sent into the database
        $productsBought .= (string)$order['productID'] . '-' . (string)$order['productName'] . '-' . (string)$order['quantity'] . ',';
        
        //Summation of the quantity
        $totalItems += $order['quantity'];

        //Subtract quantity from the database
        $num = $qty['quantity'] - $order['quantity'];

        //Update database by decreasing the stock
        $statement = $pdo -> prepare ("UPDATE products SET quantity = :quantity WHERE productID = :productID");
        $statement -> execute([
            ':quantity' => $num,
            ':productID' => $order['productID']
        ]);   
    }

    //Add Shipping Fee
    $totalPrice += 50;

    //Remove the last comma in the formatted string
    $productsBought = substr_replace($productsBought ,"",-1);
    
    //Insert sales into the transactionLog
    $statement = $pdo -> prepare ("INSERT INTO transactionLog(productsBought, totalItems, totalPrice, dateBought, buyerID, status)
     VALUES (
        :productsBought,
        :totalItems,
        :totalPrice,
        current_timestamp(),
        :buyerID,
        'Shipping'
    )");

    $statement -> execute([
        ':productsBought' => $productsBought,
        ':totalItems' => $totalItems,
        ':totalPrice' => $totalPrice,
        ':buyerID' => $_SESSION['id']
    ]);

    //Add sales into the balance
    //Get the current balance
    $statement = $pdo -> prepare ("SELECT balance FROM sitesettings");
    $statement -> execute([]);
    $balance = $statement -> fetch(0);

    //Update the balance
    $statement = $pdo -> prepare ("UPDATE sitesettings SET balance = :newBalance");
    $statement -> execute([
        ':newBalance' => $totalPrice + $balance['balance']
    ]);

    //After the checkout, clear orders
    unset($_SESSION['orders']);

    Header("Location: ../pages/shop.php");
?>