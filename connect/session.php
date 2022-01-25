<?php
    session_start();
    

    if (isset($_SESSION['profilePic'])){
        $profilePic = $_SESSION['profilePic'];
        $pic = $_SESSION['profilePic'];
    } else {
        $_SESSION['profilePic'] = "\images\blank.png";
    }
   
    //Creates blank array for cart orders
    if (!isset($_SESSION['orders'])) {
        $_SESSION['orders'] = array();
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