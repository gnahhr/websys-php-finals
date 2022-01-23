<?php
    session_start();
    require_once '../connect/config.php';
    $product = $_SESSION['orders'];
    $totalShit = 0;
    $totalItems = 0;
    $productsBought='';

    $proceed = true;

    foreach ($product as $key => $order) {//check if there is enough product quantity
        $statement = $pdo -> prepare ("SELECT quantity FROM products WHERE productID = :productID");
        $statement -> bindValue(':productID',$order['productID']);
        $statement -> execute();
        $qty = $statement -> fetchAll();

        if($order['quantity']<= $qty[0]['quantity']) 
            continue;

        else{
            unset($product[$key]);
            $proceed = false;
            break;
        }
    }

    if($proceed == false){
        $_SESSION['orders'] = $product;
        header("Location: ../pages/checkOut.php");
    }


    foreach ($product as $order) {
        $statement = $pdo -> prepare ("SELECT quantity FROM products WHERE productID = :productID");
        $statement -> bindValue(':productID',$order['productID']);
        $statement -> execute();
        $qty = $statement -> fetchAll();
            $totalShit += $order['totalPrice'];
            $productsBought .= (string)$order['productID'] . '-' . (string)$order['productName'] . '-' . (string)$order['quantity'] . ', ';
            $totalItems += $order['quantity'];
            $num = $qty[0]['quantity'] - $order['quantity'];
            $statement = $pdo -> prepare ("UPDATE products SET quantity = :quantity WHERE productID = :productID");
            $statement -> bindValue(':quantity',$num);
            $statement -> bindValue(':productID',$order['productID']);
            $statement -> execute();   
    }

    // echo '<pre>';
    // echo var_dump($_SESSION['orders']);
    // echo '</pre>';
    // header("Location: ../pages/checkOut.php");

    $totalShit += floatval($totalShit * 0.12) + 50;
    $productsBought = substr($productsBought,0,-2);
    // echo $productsBought . '<br>';
    // echo $totalShit . '<br>';
    // echo $totalItems . '<br>';

  
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
        ':totalPrice' => $totalShit,
        ':buyerID' => $_SESSION['id']
    ]);
    
    unset($_SESSION['orders']);

    Header("Location: ../pages/shop.php");
    
?>