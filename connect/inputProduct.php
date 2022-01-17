<?php
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=escafe','root','');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $quantity = $_POST['quantity'];
    $supplierName = $_POST['supplierName'];
    $productDescription	= $_POST['productDescription'];
    $expirationDate	= $_POST['expirationDate'];

    $productImage = $_FILES['productImage'] ?? null;

    if($productImage){
        move_uploaded_file($productImage['tmp_name'],$productName);
    }

?>