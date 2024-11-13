<?php

$path = "../..";
$user = "Student";
include_once "$path/Function/Basic.php";
require_once "$path/Component/table.php";
startContainer($path, $user);
$th = new TableHelper();
$query = "select j.Id, Job_Profile, CTC, Internship, Bond, Eligible_Course from Jobs j inner join applied a ON a.Job_id = j.Id where a.User_id = $_SESSION[Userid]";
$th->table("Users" , $query, 1, 1, 1, 1);

endContainer($path);