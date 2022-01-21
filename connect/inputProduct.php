<?php
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=escafe','root','');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //refer nalang sa mga comments ko sa editProduct, basta ang importang, We love Shen Xiaoting <3.
    $productName = $_POST['prodName'];
    $productPrice = $_POST['prodPrice'];
    $quantity = $_POST['prodQuantity'];
    $supplierName = $_POST['prodSupplier'];
    $productDescription	= $_POST['prodDesc'];
    $expirationDate	= $_POST['prodExpDate'];

    $checkerProdName = $pdo -> prepare("SELECT productName FROM products WHERE productName = :checker");
    $checkerProdName -> bindValue(':checker',$productName);
    $checkerProdName -> execute();

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
    
        $statement -> bindValue(':productImage', $imagePath);
        $statement -> bindValue(':productName', $productName);
        $statement -> bindValue(':productPrice', $productPrice);
        $statement -> bindValue(':quantity', $quantity);
        $statement -> bindValue(':supplierName', $supplierName);
        $statement -> bindValue(':productDescription', $productDescription);
        $statement -> bindValue(':expirationDate', $expirationDate);
        $statement ->execute();
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