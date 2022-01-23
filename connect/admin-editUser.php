<?php
    include './config.php';
    $id = $_GET['id'];
    $statement = $pdo -> prepare ("SELECT * FROM userInfo WHERE id = :id");
    $statement -> bindValue(':id', $id);
    $statement -> execute();
    $user = $statement -> fetchAll(PDO::FETCH_ASSOC);

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $username =$_POST['username'];
    $accessLevel =$_POST['accessLevel'];

    

    $checkerEmail= $pdo -> prepare("SELECT email FROM userInfo WHERE email = :email AND id != :id");
    $checkerEmail -> execute([
        ':email' => $email,
        ':id' => $id
    ]);

    $checkerUsername= $pdo -> prepare("SELECT username FROM userInfo WHERE username = :username AND id != :id");
    $checkerUsername -> execute([
        ':username' => $username,
        ':id' => $id
    ]);

    if($checkerEmail -> rowCount() > 0 || $checkerUsername -> rowCount() > 0) {
        header('Location: ../pages/admin-dashboard-edit-user.php?id='.$id);
        exit();
    }

    else {
        //create images folder if the folder does not exist. Bongga diba?
        if(!is_dir('images')){
            mkdir('images');
        }

        //basically if the current pic is not replaced, value that is passed from the form is null so $imagepath will retain the current $productImage value. Follow Shen Xiaoting for a better life.
        $userPic = $_FILES['profilePic'] ?? null; 
        $imagePath=$user[0]['profilePic'];

        //this function will only run if there is a new image.
        if($userPic && $userPic['tmp_name']){
            //delete previous image
            if($user['profilePic']){
                unlink($user['profilePic']);
            }
            //input shit.
            $imagePath = 'images/'.$userPic['name'];
            mkdir(dirname($imagePath));
            move_uploaded_file($userPic['tmp_name'],$imagePath);
        }
    
        $statement = $pdo -> prepare ("UPDATE userInfo SET profilePic = :profilePic,
        firstName = :firstName, 
        lastName = :lastName, 
        email = :email ,
        address = :address, 
        username = :username,
        accessLevel = :accessLevel WHERE id = :id");
        
        $statement -> execute([
            ':profilePic' => $imagePath,
            ':firstName' => $firstName,
            ':lastName' => $lastName,
            ':email' => $email,
            ':address' => $address,
            ':username' => $username,
            ':accessLevel' => $accessLevel,
            ':id' => $id
        ]);
        header("Location: ../pages\admin-dashboard-user-manage.php");
    }
?>