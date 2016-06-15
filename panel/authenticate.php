<?php

session_start();

if (!empty($_POST['username']) && !empty($_POST['password']))
{
    // Grab User submitted information
    $username = $_POST["username"];
    $pass = $_POST["password"];
       
    include('models/adminModel.php');
    $db = new AdminModel();
    $db->connect();
    $_SESSION["username"] = $username;
    if($db->validatePassword($username,$pass)){
        header("Location:panel/index.php");
    }else{
        // Records an error and goes back to loginAdmin.php
         $_SESSION["error"] = "Wrong Username or Password";
         header("Location:loginAdmin.php");
    }
}else{
    $_SESSION["error"] = "Please use all fields";
    header("Location:loginAdmin.php");
}
?>