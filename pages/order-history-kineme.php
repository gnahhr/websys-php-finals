<?php
    include '../connect/session.php';
    require_once '../connect/config.php';

    $statement = $pdo -> prepare("SELECT * FROM transactionLog WHERE buyerID = :id ORDER BY dateBought DESC");
    $statement -> execute([
        'id' => $_SESSION['id']
    ]);

    $orders = $statement -> fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>';
    echo var_dump($orders);
    echo '</pre>';
    
    $prod = $orders[0]['productsBought'];

    echo '<pre>';
    var_dump(explode('-,', $prod, -1));
    echo '</pre>';
?>

