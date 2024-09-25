<?php
$path = "..";
include_once "$path/Database/function.php";
include_once "$path/functions/basic.php";

session_start();

if(isset($_GET["submit"])){

    echo "h";
    $usertype = $_GET['Usertype'];
    $username = $_GET['Username'];
    $Email = $_GET['Email'];
    $Password1 = $_GET['Password1'];
    $Password2 = $_GET['Password2'];

    if($Password1 != $Password2){
        $_SESSION['tempdata']['status'] = "Password Not Matched";
        //back();
    }
}
if(isset($_GET["Login"])){
    $usertype = $_GET['Usertype'];
    $username = $_GET['Username'] ?? "";
    $Email = $_GET['Email'] ?? "";
    $Password = $_GET['Password'];


    if(isset($username) || isset($Email)){
    }
}

