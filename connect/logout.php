<?php
    session_start();
    require_once './config.php';
    $dateTime = date('Y-m-d H:i:s');

    $statement = $pdo -> prepare ("INSERT INTO userLog (id, username, action, dateTime) VALUES(:id, :username, :action,:logDateAndTime)");
    $statement -> execute([
        'id' => $_SESSION['id'],
        'username' => $_SESSION['username'],
        'action' => 'Logged out',
        'logDateAndTime' => $dateTime,
    ]);

    session_unset();
    session_destroy();
    header("Location: ../pages/index.php");
?>