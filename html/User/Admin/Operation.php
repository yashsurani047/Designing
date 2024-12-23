<?php 
$path = "../..";
include "$path/Function/Basic.php";
include "$path/Function/Database.php";

$basic = new Basic();
$db = new Database();

if(isset($_GET['Com_Id'])){
    try{
        $JobId = $db->Execute("select applied.Id from applied inner join jobs on applied.Job_Id = Jobs.Id where Jobs.User_Id = $_GET[Com_Id]");
        foreach($JobId as $id){
            $db->Execute("delete from applied where Id =$id");
        }
        $db->Execute("delete from jobs where User_Id = ".$_GET['Com_Id']);
        $db->Execute("delete from companyprofile2 where User_Id = ".$_GET['Com_Id']);
        $db->Execute("delete from companyprofile where User_Id = ".$_GET['Com_Id']);
        $db->Execute("delete from user where Id = ".$_GET['Com_Id']);
    }
    catch(Exception $e){
        $basic->error("somewhere Deletion error : ".$e,2);
    }
}


