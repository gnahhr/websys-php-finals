<?php
    require_once './config.php';

    //get the id of current prodcut passed by the edi button
    $id = $_GET['id'];
    $statement = $pdo -> prepare ("SELECT * FROM products WHERE productID = :id");
    $statement -> bindValue(':id', $id);
    $statement -> execute();
    $product = $statement -> fetchAll(PDO::FETCH_ASSOC);

    $productName = $_POST['prodName'];
    $productPrice = $_POST['prodPrice'];
    $quantity = $_POST['prodQuantity'];
    $supplierName = $_POST['prodSupplier'];
    $productCategory	= $_POST['prodCat'];
    $productDescription	= $_POST['prodDesc'];
    $expirationDate	= $_POST['prodExpDate'];
    $discount	= $_POST['discount'];

    if ($_POST['bundledWith'] == 0){
        $bundledWith	= NULL;
    } else {
        $bundledWith	= $_POST['bundledWith'];
    }

    //select all product name excepet the current product name
    $checkerProdName = $pdo -> prepare("SELECT productName FROM products WHERE productName = :checker AND productID != :id");
    $checkerProdName -> execute([
        ':checker' => $productName,
        ':id' => $id
    ]);

  //refresh current page kapag yung bagong product name may kapareho, nyeta naubusan ako ng ingles HHAHAHA
    //Shen Xioating <3
    if($checkerProdName -> rowCount() > 0 ) {
        echo "Existing";
        header('Location: ../pages\admin-dashboard-edit-prod.php?id='.$id);
        exit();
    }

    else{

        //create images folder if the folder does not exist. Bongga diba?
        if(!is_dir('images')){
            mkdir('images');
        }

        //basically if the current pic is not replaced, value that is passed from the form is null so $imagepath will retain the current $productImage value. Follow Shen Xiaoting for a better life.
        $productImage = $_FILES['productImage'] ?? null; 
        $imagePath=$product[0]['productImage'];

        //this function will only run if there is a new image.
        if($productImage && $productImage['tmp_name']){
            //delete previous image
            if($product['productImage']){
                unlink($product['productImage']);
            }
            //input shit.
            $imagePath = 'images/'.$productImage['name'];
            mkdir(dirname($imagePath));
            move_uploaded_file($productImage['tmp_name'],$imagePath);
        }
    
        $statement = $pdo -> prepare ("UPDATE products SET
            productImage = :productImage,
            productName = :productName, 
            productCategory = :productCategory,
            productPrice = :productPrice, 
            quantity = :quantity,
            bundledWith = :bundledWith,
            discount = :discount,
            supplierName = :supplierName, 
            productDescription = :productDescription, 
            expirationDate = :expirationDate WHERE productID = :id");

        $statement -> execute([
            ':productImage' => $imagePath,
            ':productName' => $productName,
            ':productCategory' => $productCategory,
            ':productPrice' => $productPrice,
            ':quantity' => $quantity,
            ':bundledWith' => $bundledWith,
            ':discount' => $discount,
            ':supplierName' => $supplierName,
            ':productDescription' => $productDescription,
            ':expirationDate' => $expirationDate,
            ':id' => $id
        ]);

        header("Location: ../pages/admin-dashboard-inv-manage.php");
        exit();
        }
        //I love Shen Xiaoting, sana ikaw din.
        
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