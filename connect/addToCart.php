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
            if ($product['bundledWith'] > 0 || $product['bundledWith'] != NULL){
                $bundled = getBundled($product['bundledWith'], $pdo);
                if($bundled['quantity'] >= (int)$_POST['quantity']){
                    array_push($_SESSION['orders'], array(
                        // Initial
                        'productImage' => $product['productImage'],
                        'productID' => $product['productID'],
                        'productName' => $product['productName'],
                        'productPrice' => $product['productPrice'],
                        'discount' => $product['discount'],
                        // Bundled
                        'bundledWith' => $product['bundledWith'],
                        'bundledImage' => $bundled['productImage'],
                        'bundledName' => $bundled['productName'],
                        'bundledPrice' => $bundled['productPrice'],
                        'quantity' => (int)$_POST['quantity'],
                        'totalPrice' => computeTotal($product['productPrice'], $product['discount'], $_POST['quantity'], $bundled['productPrice'])
                    ));
                } else {
                    array_push($_SESSION['orders'], array(
                        // Initial
                        'productImage' => $product['productImage'],
                        'productID' => $product['productID'],
                        'productName' => $product['productName'],
                        'productPrice' => $product['productPrice'],
                        'bundledWith' => 0,
                        'discount' => $product['discount'],
                        'quantity' => (int)$_POST['quantity'],
                        'totalPrice' => ($product['productPrice'] - ($product['productPrice'] * ($product['discount']/100))) * (int)$_POST['quantity']
                    ));
                }
                
            } else {
                array_push($_SESSION['orders'], array(
                    // Initial
                    'productImage' => $product['productImage'],
                    'productID' => $product['productID'],
                    'productName' => $product['productName'],
                    'productPrice' => $product['productPrice'],
                    'bundledWith' => $product['bundledWith'],
                    'discount' => $product['discount'],
                    'quantity' => (int)$_POST['quantity'],
                    'totalPrice' => ($product['productPrice'] - ($product['productPrice'] * ($product['discount']/100))) * (int)$_POST['quantity']
                ));
            }
            
        } else {
            foreach ($_SESSION['orders'] as &$sessProduct) {
                if ($sessProduct['productID'] == $_GET['productID']) {
                    $sessProduct['quantity'] = (int)$sessProduct['quantity'] + (int)$_POST['quantity'];
                    $sessProduct['totalPrice'] = (int)$sessProduct['totalPrice'] + ((int)$_POST['quantity'] * floatval($product['productPrice']));
                }
            }
        }
    }

    Header('Location: ../pages\shop.php');

    function checkDupes($productID, $prodArray) {
        foreach ($prodArray as $product) {
            if ($product['productID'] === $productID) {
                return true;
            }
        }

        return false;
    }

    function getBundled($productID, $pdo){

        $stmt = $pdo -> prepare("SELECT * FROM products WHERE productID = :productID");
        $stmt -> execute([
            ':productID' => $productID,
        ]);
        return $stmt->fetch(0);
    }

    function computeTotal($prodPrice, $prodDiscount, $qty, $bundlePrice){
        $totalProdPrice = ($prodPrice - ($prodPrice * ($prodDiscount/100))) * $qty;
        $totalBundlePrice = ($bundlePrice - ($bundlePrice * .1)) * $qty;
        return $totalProdPrice + $totalBundlePrice;
    }
?>