<?php
    session_start();
    require_once '../connect/config.php';
    $product = $_SESSION['orders'];
    $totalPrice = 0;
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
        header("Location: ../pages/cart.php");
    }

    foreach ($product as $order) {
        $statement = $pdo -> prepare ("SELECT quantity FROM products WHERE productID = :productID");
        $statement -> execute([
            ':productID' => $order['productID']
        ]);
        $qty = $statement -> fetch(0);
        
        $totalPrice += $order['totalPrice'];
        
        $productsBought .= (string)$order['productID'] . '-' . (string)$order['productName'] . '-' . (string)$order['quantity'] . ',';
        $totalItems += $order['quantity'];

        $num = $qty['quantity'] - $order['quantity'];

        $statement = $pdo -> prepare ("UPDATE products SET quantity = :quantity WHERE productID = :productID");
        $statement -> execute([
            ':quantity' => $num,
            ':productID' => $order['productID']
        ]);   
    }

    // echo '<pre>';
    // echo var_dump($_SESSION['orders']);
    // echo '</pre>';
    // header("Location: ../pages/checkOut.php");

    $totalPrice += 50;
    $productsBought = substr_replace($productsBought ,"",-1);
    // echo $productsBought . '<br>';
    // echo $totalPrice . '<br>';
    // echo $totalItems . '<br>';
    // var_dump($productsBought);
  
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

    unset($_SESSION['orders']);

    Header("Location: ../pages/shop.php");
    
?>