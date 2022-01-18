<?php
    require_once './config.php';

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $username =$_POST['username'];
    $password = $_POST['password'];

    $password = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));

    $checkerUsername = $pdo -> prepare("SELECT username FROM userInfo WHERE username = :checker");
    $checkerUsername -> execute([
        'checker'=> $username,
    ]);

    $checkerEmail = $pdo -> prepare("SELECT email FROM userInfo WHERE email = :checker");
    $checkerEmail -> execute([
        'checker'=> $email,
    ]);

    if($checkerUsername -> rowCount() > 0 || $checkerEmail -> rowCount() > 0) {
        $_SESSION['message'] = "Username/Email already taken";
        header("Location: ../pages/register.php ");
        exit();
    }

    else{
        $statement = $pdo -> prepare ("INSERT INTO userInfo (firstName,lastName, email, address, username, password, user) VALUES(:firstName, :lastName, :email, :address, :username, :password, :userLevel)");
        $statement->execute([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'address' => $address,
            'username' => $username,
            'password' => $password,
            'userLevel' => "user"
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