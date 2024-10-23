<form action="" method="post">
    Enter Old Password: <input type="text" name="oldPass"><br>
    Enter New Password: <input type="text" name="newPass1"><br>
    Confirm New Password: <input type="text" name="newPass2"><br>
    <input type="hidden" name="submit" value="ChangePass">
    <input type="submit" value="Change Password">
</form>

<?php
if(isset($_POST['submit'])){
    include "../Function/Basic.php";
include "../Function/Database.php";
$db = new Database();

$user = $db->fetch("select * from Users where Id = '$_SESSION[Userid]'");
var_dump($user);

$oldPass = $_POST['oldPass'];
$newPass = $_POST['newPass1'];
$newPass2 = $_POST['newPass2'];

$Is_Confirmed = $newPass == $newPass2;
if($Is_Confirmed){
    if($oldPass == $user['Password']){
        $db->Execute("update users set Password ='$newPass' where Id = $_SESSION[Userid]");
        $basic->success("Password Updated Successfully",$basic->getRoot(). "/User//" . $_SESSION['Usertype']        );       
    }
    else{
        $basic->error("Password Not Matched");        
    }
}
else{
    $basic->error("confirm Password Mismatched");
}

}

?>