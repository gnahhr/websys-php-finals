<?php
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=mema','root','');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $statement = $pdo -> prepare("SELECT username,password FROM userInfo WHERE username = :checker");
    $statement -> bindValue(':checker',$username);
    $statement -> execute();

    $user = $statement -> fetch(PDO::FETCH_ASSOC);

    if ($user === false) 
        header("Location: ../pages/login.php");
    

    else {
        $validPassword = password_verify($password, $user['password']);
        if ($validPassword){
            // $_SESSION['userInfo'] = $username;
            header("Location: ../index.php");
            exit();
        }
        
        else
        header("Location: ../pages/login.php");
    }


?>