<?php
include_once "../Function/Basic.php";
include_once "../Function/Database.php";
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
        OTP : <input type="text" name="Token" placeholder="Enter OTP"><br>
        <button type="submit" value="VerifyOTP">Verify OTP</button>
    </form>

    <form action="" method="post">
        Email : <input type="text" name="Email" placeholder="Enter Email"><br>
        <input type="hidden" name="submit" value="GetOTP">
        <button type="submit" value="GetOTP">Get OTP</button>
    </form>
    <?php
}
if(isset($_POST['submit'])){
    $submit = $_POST["submit"];
    if($submit == "GetOTP"){
        $Email = $_POST['Email'];
        $db->SentOTPEmail($Email);       
    }
    else if($submit == "VerifyOTP"){
        $Token = $_POST['Token'];
        
        $forget = $db->fetch("select Email from forgot where Pass = '$Token'");
        $user = $db->fetch("select Id from Users where Email = '$forget[Email]'");
        echo $_SESSION['TokenUserId'] = $user['Id'];
        header("location:ChangePassword.php");
    }
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
?>