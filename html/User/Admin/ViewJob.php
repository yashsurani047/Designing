<?php
$path = "../..";
$user = "Admin";
require_once "$path/Function/Basic.php";
require_once "$path/Function/Database.php";
$db = new Database();
startContainer($path, $user);
$th = new TableHelper();
$query = "select j.Id, j.Job_Profile, j.CTC, j.Internship, j.Bond, j.Eligible_Course from jobs j";
$th->table("All Jobs" , $query, 0, 1, 1, 1);
// $th->table("Users" , "select Id, Usertype,Email,Password,Created_at from Users", 1, 1, 1);
 endContainer($path); ?>