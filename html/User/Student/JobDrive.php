<?php

$path = "../..";
$user = "Student";
include_once "$path/Function/Basic.php";
require_once "$path/Component/table.php";
startContainer($path, $user);
$th = new TableHelper();
$th->table("Users" , "select Id, Job_Profile, CTC, Internship, Bond, Eligible_Course from Jobs", 1, 1, 1);
endContainer($path);