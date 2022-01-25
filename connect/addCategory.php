<?php
    require_once './config.php';

    $statement = $pdo -> prepare("INSERT INTO categories(categoryName) VALUES(:categoryName)");
    $statement -> execute([':categoryName' => $_POST['categoryName']]);

    Header("Location: ../pages/admin-dashboard-inv-category.php");
?>