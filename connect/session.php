<?php
    session_start();
    
    if (isset($_SESSION['image'])){
        $image = $_SESSION['image'];
    } else {
        $image = "../img/users/blank.png";
    }
    
    // $username = $_SESSION['username'];
    // $password = $_SESSION['password'];
    // $fname = $_SESSION['firstName'];
    // $lname = $_SESSION['lastName'];
    // $email = $_SESSION['email'];
    // $userlevel = $_SESSION['access'];
    // $address = $_SESSION['address'];
    $_SESSION['message'] = NULL;
?>