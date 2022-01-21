<?php
    require_once './config.php';

    $id = $_GET['id'];

    $statement = $pdo -> prepare ("DELETE FROM products WHERE productID = :productID");
    $statement -> execute([
        ':productID' => $id
    ]);

    Header('Location: ..\pages\admin-dashboard-inv-manage.php');
?>