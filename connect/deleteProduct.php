<?php
    require_once './config.php';

    $id = $_GET['id'];

    $statement = $pdo -> prepare ("UPDATE products SET bundledWith = 0 WHERE bundledWith = :id");
    $statement -> execute([
        ':id' => $id
    ]);

    $statement = $pdo -> prepare ("DELETE FROM products WHERE productID = :productID");
    $statement -> execute([
        ':productID' => $id
    ]);

    Header('Location: ..\pages\admin-dashboard-inv-manage.php');
?>