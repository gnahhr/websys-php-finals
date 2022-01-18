<?php
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=escafe','root','');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $username =$_POST['username'];
    $password = $_POST['password'];

    $password = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));

    $checkerUsername = $pdo -> prepare("SELECT username FROM userInfo WHERE username = :checker");
    $checkerUsername -> bindValue(':checker',$username);
    $checkerUsername -> execute();

    $checkerEmail = $pdo -> prepare("SELECT email FROM userInfo WHERE email = :checker");
    $checkerEmail -> bindValue(':checker',$email);
    $checkerEmail -> execute();

    if($checkerUsername -> rowCount() > 0 || $checkerEmail -> rowCount() > 0) {
        echo "Existing";
        header("Location: ../pages/register.php");
        exit();
    }

    else{
        $statement = $pdo -> prepare ("INSERT INTO userInfo (firstName,lastName, email, address, username, password) VALUES(:firstName, :lastName, :email, :address, :username, :password)");
        $statement->execute([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'address' => $address,
            'username' => $username,
            'password' => $password
        ]);

        // $statement -> bindValue(':firstName', $firstName);
        // $statement -> bindValue(':lastName', $lastName);
        // $statement -> bindValue(':email', $email);
        // $statement -> bindValue(':address', $address);
        // $statement -> bindValue(':username', $username);
        // $statement -> bindValue(':password', $password);
        // $statement ->execute();

        header("Location: ../pages/login.php");
        exit();
    }
?>