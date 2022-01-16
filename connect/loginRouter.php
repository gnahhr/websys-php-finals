<?php
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=escafe','root','');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dateTime = date('Y-m-d H:i:s');

    $statement = $pdo -> prepare("SELECT username,password,id FROM userInfo WHERE username = :checker");
    $statement -> bindValue(':checker',$username);
    $statement -> execute();

    $user = $statement -> fetch(PDO::FETCH_ASSOC);

    if ($user === false) 
        header("Location: ../pages/login.php");
    

    else {
        $validPassword = password_verify($password, $user['password']);
        if ($validPassword){
            // $_SESSION['userInfo'] = $username;
            $statement = $pdo -> prepare ("INSERT INTO userLog (id, username, dateTime) VALUES(:id, :username,:logDateAndTime)");
            $statement -> bindValue(':id', $user['id']);
            $statement -> bindValue(':username', $user['username']);
            $statement -> bindValue(':logDateAndTime',$dateTime);
            $statement -> execute();
            header("Location: ../index.php");
            exit();
        }
        
        else{
        header("Location: ../pages/login.php");
        exit();
        }
    }


?>