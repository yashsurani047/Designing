<?php

$path = "..";
$user = "Student";
include_once "$path/Function/Basic.php";
require_once "./table.php";
startContainer($path, $user);
$th = new TableHelper();
$th->table("Users" , "select Id, Usertype,Email,Password,Created_at from Users", 1, 1, 1);
endContainer($path, 1);