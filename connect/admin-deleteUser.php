<?php
    require_once './config.php';

    $id = $_GET['id'];

    $statement = $pdo -> prepare ("DELETE FROM userInfo WHERE id = :id");
    $statement -> execute([
        ':id' => $id
    ]);

    Header('Location: ..\pages\admin-dashboard-user-manage.php');
?>