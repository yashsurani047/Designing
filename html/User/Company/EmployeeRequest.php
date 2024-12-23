<?php

$path = "../..";
$user = "Company";
include_once "$path/Function/Basic.php";
require_once "$path/Component/table.php";
if(!isset($_SESSION["Userid"])) $basic->alert("First Logined In",$path);
startContainer($path, $user);
$th = new TableHelper();
$query = "SELECT 
    s.User_Id, 
    CONCAT(s.First_Name, ' ', s.Last_Name) AS Student_Name,
    s.Phone_Number AS Student_Phone,
    s.Email AS Student_Email,
    s.Stream AS Student_Stream,
    s.Parent_Number AS Guardian_Contact,
    j.Job_Profile
FROM 
    applied a
INNER JOIN 
    studentprofile s ON s.User_Id = a.User_Id
INNER JOIN 
    Jobs j ON j.Id = a.Job_Id
WHERE 
    j.User_Id = ".$_SESSION['Userid']." 
    AND NOT EXISTS (
        SELECT 1 FROM hiring h WHERE h.User_Id = s.User_Id AND h.Job_Id = j.Id
    )
";


$th->table("Employee Request" , $query, 0,0,1,1);
endContainer($path);