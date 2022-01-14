<?php
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=mema','root','');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $statement = $pdo -> prepare ("INSERT INTO userInfo (firstName,lastName, email, address, username, password) VALUES(:firstName, :lastName, :email, :address, :username, :password)");

    $statement -> bindValue(':firstName', $firstName);
    $statement -> bindValue(':lastName', $lastName);
    $statement -> bindValue(':email', $email);
    $statement -> bindValue(':address', $address);
    $statement -> bindValue(':username', $username);
    $statement -> bindValue(':password', $password);
    $statement ->execute();

    header("Location: ../pages/login.php");
exit();
?>