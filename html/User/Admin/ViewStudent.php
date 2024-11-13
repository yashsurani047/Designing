<?php
$path = "../..";
$user = "Admin";
require_once "$path/Function/Basic.php";
require_once "$path/Function/Database.php";
$db = new Database();
$students = $db->Execute_All("select * from studentprofile");

startContainer($path, $user);
$th = new TableHelper();
$th->table("Total Student" , "select First_Name, Last_Name, Father_Name, Stream, Phone_Number, Email, State from studentprofile", 0, 1, 1);
// $th->table("Users" , "select Id, Usertype,Email,Password,Created_at from Users", 1, 1, 1);
 endContainer($path); ?>