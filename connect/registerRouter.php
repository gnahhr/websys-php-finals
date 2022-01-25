<?php
    require_once './config.php';

    //Assign POST data in variables
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $username =$_POST['username'];
    $password = $_POST['password'];

    //Encrypt of Password
    $password = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));

    //Check if the database has the same username
    $checkerUsername = $pdo -> prepare("SELECT username FROM userInfo WHERE username = :checker");
    $checkerUsername -> execute([
        'checker'=> $username,
    ]);

    //Check if the database has the same email
    $checkerEmail = $pdo -> prepare("SELECT email FROM userInfo WHERE email = :checker");
    $checkerEmail -> execute([
        'checker'=> $email,
    ]);

    //Check validity of the two
    if($checkerUsername -> rowCount() > 0 || $checkerEmail -> rowCount() > 0) {
        $_SESSION['message'] = "Username/Email already taken";
        //If taken redirect to register
        header("Location: ../pages/register.php ");
        exit();
    }
    else{
        //Insert values into database
        $statement = $pdo -> prepare ("INSERT INTO userInfo (firstName,lastName, email, address, username, password, accessLevel) VALUES(:firstName, :lastName, :email, :address, :username, :password, :userLevel)");
        $statement->execute([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'address' => $address,
            'username' => $username,
            'password' => $password,
            'userLevel' => "user"
        ]);

        header("Location: ../pages/login.php");
        exit();
    }
?>