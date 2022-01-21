<?php
    require_once './config.php';

    //refer nalang sa mga comments ko sa editProduct, basta ang importang, We love Shen Xiaoting <3.
    $productName = $_POST['prodName'];
    $productPrice = $_POST['prodPrice'];
    $quantity = $_POST['prodQuantity'];
    $supplierName = $_POST['prodSupplier'];
    $productDescription	= $_POST['prodDesc'];
    $expirationDate	= $_POST['prodExpDate'];

    $checkerProdName = $pdo -> prepare("SELECT productName FROM products WHERE productName = :checker");
    $checkerProdName -> execute([
        ':checker' => $productName
    ]);

    if($checkerProdName -> rowCount() > 0 ) {
        echo "Existing";
        header("Location: ../pages/login.php");
        exit();
    }

    else{

        if(!is_dir('images')){
            mkdir('images');
        }
    
        $productImage = $_FILES['productImage'] ?? null;
        $imagePath='';
        if($productImage){
            $imagePath = 'images/'.$productImage['name'];
            mkdir(dirname($imagePath));
    
            move_uploaded_file($productImage['tmp_name'],$imagePath);
        }
    
        $statement = $pdo -> prepare ("INSERT INTO products (productImage,productName, productPrice, quantity, supplierName, productDescription, expirationDate) VALUES(:productImage, :productName, :productPrice, :quantity, :supplierName, :productDescription, :expirationDate)");
        
        $statement -> execute([
            ':productImage' => $imagePath,
            ':productName' => $productName,
            ':productPrice' => $productPrice,
            ':quantity' => $quantity,
            ':supplierName' => $supplierName,
            ':productDescription' => $productDescription,
            ':expirationDate' => $expirationDate
        ]);
        }

        header("Location: ../pages\admin-dashboard-inv-manage.php");
        exit();
        
    //     function randomString($n){
    //         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //         $str = '';
    
    //         for($i = 0; $i < $n; $i++){
    //             $index = rand(0, strlen($characters)-1);
    //             $str .= $characters[$index];
    //         }
    
    //         return $str;
    // }
?>