<?php
    require_once './config.php';

    $id = $_GET['id'];

    $statement = $pdo -> prepare ("DELETE FROM categories WHERE categoryID = :productID");
    $statement -> execute([
        ':productID' => $id
    ]);

    Header('Location: ..\pages\admin-dashboard-inv-category.php');
?>