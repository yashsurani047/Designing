<?php
$path = "../..";
$user = "Student";
include_once "$path/Function/Basic.php";
require_once "$path/Component/table.php";
if(!isset($_SESSION["Userid"])) $basic->alert("First Logined In",$path);
startContainer($path, $user);
$th = new TableHelper();
$query = "SELECT j.Id, j.Job_Profile, j.CTC, j.Internship, j.Bond, j.Eligible_Course FROM jobs j LEFT JOIN applied a ON a.Job_id = j.Id AND a.User_id = $_SESSION[Userid] WHERE a.Job_id IS NULL";
$th->table("jobs" , $query, 0,0,0,1);
endContainer($path);