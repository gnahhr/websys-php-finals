<?php
    session_start();
    require_once './config.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dateTime = date('Y-m-d H:i:s');

    $statement = $pdo -> prepare("SELECT * FROM userInfo WHERE username = :checker");
    
    $statement -> execute([
        'checker' => $username,
    ]);

    $user = $statement->fetch(PDO::FETCH_ASSOC);

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
        
        $validPassword = password_verify($password, $user['password']);
        
        if ($validPassword){
            if($user['accessLevel'] === "admin") {
                header("Location: ../pages/admin-dashboard.php");
            }

            // pass on user id for indentification on user profile
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