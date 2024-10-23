<?php
include "../Function/Basic.php";
include "../Function/Database.php";
$db = new Database();
if(isset($_GET['Token'])){
    $Token = $_GET['Token'];
    
    $forget = $db->fetch("select Email from forgot where Pass = '$Token'");
    $user = $db->fetch("select Id from Users where Email = '$forget[Email]'");
    echo $_SESSION['TokenUserId'] = $user['Id'];
    header("location:ChangePassword.php");
}
else{
    header("location:../");
}
?>