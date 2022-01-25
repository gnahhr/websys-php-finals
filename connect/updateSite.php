<?php
    include '../connect/config.php';
    $statement = $pdo -> prepare ("SELECT * FROM sitesettings");
    $statement->execute();
    $site = $statement -> fetchAll(PDO::FETCH_ASSOC);


    $siteName = $_POST['siteName'];
    $balance = $_POST['balance'];

    $siteLogo = $_FILES['siteImage'] ?? null; 
    $imagePath=$site[0]['siteLogo'];

    //this function will only run if there is a new image.
    if($siteLogo && $siteLogo['tmp_name']){
         //delete previous image
        if($user['profilePic']){
            unlink($user['profilePic']);
        }
        //input image
        $imagePath = '../img/index/'.$siteLogo['name'];
        mkdir(dirname($imagePath));
        move_uploaded_file($siteLogo['tmp_name'],$imagePath);
    }
    $statement = $pdo -> prepare ("UPDATE sitesettings SET
        siteName = :siteName,
        siteLogo = :siteLogo, 
        balance = :beginningBalance");
            
    $statement -> execute([
            ':siteName' => $siteName,
            ':siteLogo' => $imagePath,
            ':beginningBalance' => $balance
    ]);
    
    header("Location: ../pages/admin-dashboard-update-site.php")
?>