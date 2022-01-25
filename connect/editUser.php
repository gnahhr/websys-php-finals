<?php
    //hail shen shawty <3
    session_start();
    require_once './config.php';
    
    $id = $_SESSION['id'];
    $statement = $pdo -> prepare ("SELECT * FROM userInfo WHERE id = :id");
    $statement -> bindValue(':id', $id);
    $statement -> execute();
    $user = $statement -> fetchAll(PDO::FETCH_ASSOC);

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $username =$_POST['username'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'] ?? null;
    
    //If there is no new password, password is retained
    if($newPassword == null){
        $password = $currentPassword;
        $password = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));
    }
    else //New Password overwrites the old one
        $password = password_hash($newPassword, PASSWORD_BCRYPT, array("cost" => 12));

    //Check if the user knows their own password
    $validPassword = password_verify($currentPassword, $user[0]['password']);

    if ($validPassword){
        //Check if there's a conflicting email
        $checkerEmail= $pdo -> prepare("SELECT email FROM userInfo WHERE email = :email AND id != :id");
        $checkerEmail -> execute([
            ':email' => $email,
            ':id' => $id
        ]);

        //Check if there's a conflicting username
        $checkerUsername= $pdo -> prepare("SELECT username FROM userInfo WHERE username = :username AND id != :id");
        $checkerUsername -> execute([
            ':username' => $username,
            ':id' => $id
        ]);

        //Validate comparison
        if($checkerEmail -> rowCount() > 0 || $checkerUsername -> rowCount() > 0) {
            header('Location: ../pages/user-profile.php');
        }
        //If false proceed to editing the user info
        else {
            //create images folder if the folder does not exist. Bongga diba?
            if(!is_dir('images')){
                mkdir('images');
            }

            //basically if the current pic is not replaced, value that is passed from the form
            //is null so $imagepath will retain the current $productImage value.
            //Follow Shen Xiaoting for a better life. <3
            $userPic = $_FILES['userPic'] ?? null; 
            $imagePath = $user[0]['profilePic'];

            //this function will only run if there is a new image.
            if($userPic && $userPic['tmp_name']){
                //delete previous image
                if($user['profilePic']){
                    unlink($user['profilePic']);
                }
                //upload new image
                $imagePath = 'images/'.$userPic['name'];
                mkdir(dirname($imagePath));
                move_uploaded_file($userPic['tmp_name'],$imagePath);
            }
            
            $statement = $pdo -> prepare ("UPDATE userInfo SET
                profilePic = :profilePic,
                firstName = :firstName, 
                lastName = :lastName,
                email = :email, 
                address = :address,
                username = :username,
                password = :password
                WHERE id = :id
            ");
            
            $statement -> execute([
                ':profilePic' => $imagePath,
                ':firstName' => $firstName,
                ':lastName' => $lastName,
                ':email' => $email,
                ':address' => $address,
                ':username' => $username,
                ':password' => $password,
                ':id' => $id
            ]);

            $_SESSION['profilePic'] = $imagePath;
            $_SESSION['username'] = $username;
            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;
            $_SESSION['email'] = $email;
            $_SESSION['address'] = $address;

            header("Location: ../pages/user-profile.php");
        }
    }
    else{
        $_SESSION['message'] = "Wrong password.";
        header('Location: ../pages/user-profile.php');
    }
?>