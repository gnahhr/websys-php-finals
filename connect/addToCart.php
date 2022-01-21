<?php
    include './session.php';
    require_once './config.php';

    $productID = $_GET['productID'];

    $statement = $pdo -> prepare("SELECT * FROM products WHERE productID = :productID");
    $statement -> execute([
        'productID' => $_GET['productID']
    ]);
    $product = $statement -> fetch(0);

    if (isset($_POST['quantity'])){
        if(isset($_SESSION['orders']) && !checkDupes($product['productID'], $_SESSION['orders'])){
            array_push($_SESSION['orders'], array(
                'productID' => $product['productID'],
                'productName' => $product['productName'],
                'quantity' => $_POST['quantity'],
                'totalPrice' => $_POST['quantity'] * $product['productPrice']
            ));
        } else {
            foreach ($_SESSION['orders'] as $sessProduct) {
                if ($sessProduct['productID'] == $_GET['productID']) {
                    $totalQty = $sessProduct['quantity'] + $_POST['quantity'];
                    $sessProduct['quantity'] = $totalQty;
                }
            }
        }
    }

    Header('Location: ../pages\product-page.php?productID='.$productID);

    function checkDupes($productID, $prodArray) {
        foreach ($prodArray as $product) {
            if ($product['productID'] === $productID) {
                return true;
            }
        }

        return false;
    }
?>