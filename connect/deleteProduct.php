<?php
    require_once './config.php';

    $id = $_GET['id'];

    //If there is a product bundled with the selected product. Remove the bundle
    $statement = $pdo -> prepare ("UPDATE products SET bundledWith = 0 WHERE bundledWith = :id");
    $statement -> execute([
        ':id' => $id
    ]);

    //Delete product from the database
    $statement = $pdo -> prepare ("DELETE FROM products WHERE productID = :productID");
    $statement -> execute([
        ':productID' => $id
    ]);

    Header('Location: ..\pages\admin-dashboard-inv-manage.php');
?>