<?php
    session_start();
    require_once './config.php';
    
    //Store Variables
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dateTime = date('Y-m-d H:i:s');

    //Start MySQL
    $statement = $pdo -> prepare("SELECT * FROM userInfo WHERE username = :checker");
    
    //Execute Query
    $statement -> execute([
        'checker' => $username,
    ]);

    //Get the first index of the query
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    //Check if user exists
    if ($user === false) {
        $_SESSION['message'] = "User not found.";
        header("Location: ../pages/login.php");
    } 
    else {
        // Get data for SESSION
        $_SESSION['id'] = $user['id'];
        $_SESSION['profilePic'] = $user['profilePic'] ?? null;
        $_SESSION['username'] = $user['username'];
        $_SESSION['password'] = $user['password'];
        $_SESSION['firstName'] = $user['firstName'];
        $_SESSION['lastName'] = $user['lastName'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['address'] = $user['address'];
        $_SESSION['access'] = $user['accessLevel'];
        
        //Very hashed password
        $validPassword = password_verify($password, $user['password']);
        
        if ($validPassword){
            //If Admin redirect to dashboard
            if($user['accessLevel'] === "admin") {
                header("Location: ../pages/admin-dashboard.php");
            }

            //If User redirect to shop
            else if ($user['accessLevel'] === 'user'){
                header('Location: ../pages/shop.php');
            }

            $statement = $pdo -> prepare ("INSERT INTO userLog (id, username, action, dateTime) VALUES(:id, :username, :action,:logDateAndTime)");
            $statement -> execute([
                'id' => $user['id'],
                'username' => $user['username'],
                'action' => 'Logged in',
                'logDateAndTime' => $dateTime,
            ]);
        }
        else{
            $_SESSION['message'] = "Wrong password.";
            header("Location: ../pages/login.php");
        }
    }
?>