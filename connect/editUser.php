<?php
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=escafe','root','');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $username =$_POST['username'];
    $password = $_POST['password'];
    
?>