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
    ?>
    <form action="" method="post">
        Email : <input type="text" name="Email" placeholder="Enter Email"><br>
        OTP : <input type="text" name="OTP" placeholder="Enter OTP"><br>
        <input type="hidden" name="submit" value="OTP">
        <input type="submit" value="Verify OTP">
    </form>

    <form action="" method="post">
        Email : <input type="text" name="Email" placeholder="Enter Email"><br>
        <input type="hidden" name="submit" value="GetOTP">
        <input type="submit" value="Get OTP">
    </form>
    <?php
}
if(isset($_GET['OTP'])){
    $Email = $_POST['Email'];
    $OTP = $_POST['OTP'];
    $user = $db->fetch("select * from OTP where Email = '$Email' AND  OTP = '$OTP'");
    if($user){
        $verify = $db->Execute("update Users set verified = 1 ");
        $basic->success("Invalid OTP",$basic->getRoot()."/Authentication/Login.php");
    }
    else{
        $basic->error("Invalid OTP",2);
    }
}
if(isset($_POST['GetOTP'])){
    echo $Email = $_POST['Email'];
    $basic->SentOTPEmail($Email);
}
?>