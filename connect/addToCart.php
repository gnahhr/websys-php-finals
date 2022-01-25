<?php
    include './session.php';
    require_once './config.php';

    $productID = $_GET['productID'];

    //Select product
    $statement = $pdo -> prepare("SELECT * FROM products WHERE productID = :productID");
    $statement -> execute([
        'productID' => $_GET['productID']
    ]);
    $product = $statement -> fetch(0);
    
    //If quantity is inputted, proceed to adding it to cart
    if (isset($_POST['quantity'])){
        //If there is an existing cart item and there are no dupes proceed with the first condition
        if(isset($_SESSION['orders']) && !checkDupes($product['productID'], $_SESSION['orders'])){
            //Check if there is a product bundled with the selected product
            if ($product['bundledWith'] > 0 || $product['bundledWith'] != NULL){
                //Get the info of the bundled product
                $bundled = getBundled($product['bundledWith'], $pdo);
                //If the qty of the bundled product is within the stocks, add it with the product
                if($bundled['quantity'] >= (int)$_POST['quantity']){
                    //Array used for the cart items
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
                }
                //If the bundled product doesn't have enough stock, just add the selected product
                else {
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
                
            }
            //Add the selected product, without a bundle
            else {
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
            
        }
        //If there are duplicate items in the cart items
        else {
            foreach ($_SESSION['orders'] as &$sessProduct) {
                if ($sessProduct['productID'] == $_GET['productID']) {
                    $sessProduct['quantity'] = (int)$sessProduct['quantity'] + (int)$_POST['quantity'];
                    $sessProduct['totalPrice'] = (int)$sessProduct['totalPrice'] + ((int)$_POST['quantity'] * floatval($product['productPrice']));
                }
            }
        }
    }

    Header('Location: ../pages\shop.php');

    //Function to check if there are duplicate cart item
    function checkDupes($productID, $prodArray) {
        foreach ($prodArray as $product) {
            if ($product['productID'] === $productID) {
                return true;
            }
        }

        return false;
    }

    //Function to get the info of bundled product
    function getBundled($productID, $pdo){

        $stmt = $pdo -> prepare("SELECT * FROM products WHERE productID = :productID");
        $stmt -> execute([
            ':productID' => $productID,
        ]);
        return $stmt->fetch(0);
    }

    //Compute the total amount of the product along with the bundled product
    function computeTotal($prodPrice, $prodDiscount, $qty, $bundlePrice){
        //Compute total price of the product along with the discount
        $totalProdPrice = ($prodPrice - ($prodPrice * ($prodDiscount/100))) * $qty;
        //Compute total price of the bundled product with a constant 10% off
        $totalBundlePrice = ($bundlePrice - ($bundlePrice * .1)) * $qty;
        return $totalProdPrice + $totalBundlePrice;
    }
?>