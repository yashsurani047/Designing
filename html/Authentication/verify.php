<?php
$path = "..";
$user = "Guest";
include_once "$path/Function/Basic.php";
include_once "$path/Function/Database.php";
$db = new Basic();
$db = new Database();
startContainer($path, $user);
if(isset($_POST['submit'])){
    $submit = $_POST["submit"];
    if($submit == "GetOTP"){
        $Email = $_POST['Email'];
        if($db->fetch("select * from Users where Email = '$Email'") != null){
            $db->SentOTPEmail($Email);
            echo "<script>window.location.href = window.location.href;</script>";
        }
        else{
            echo "Email not found
                <a href=''>Try Again</a>";
        }
    }
    else if($submit == "VerifyOTP"){
        $Token = $_POST['Token'];
        $Email = $_POST['Email'];
        
        $otp = $db->fetch("select * from otp where Email ='$Email'");
        if(isset($otp['Email'])){
            if($otp["Pass"] == $Token){
                $basic->alert("Token Matched");
                $db->delete("delete from otp where Email = '$otp[Email]'");
                $user = $db->fetch("select Id from Users where Email = '$otp[Email]'");
                $_SESSION['TokenUserId'] = $user['Id'];
                $_SESSION['TokenTimestamp'] = time();
                $db->update("update Users set verified = 1 where Id = '$user[Id]'");
                ?>
                    <a href="Login.php">GOTO LOGIN PAGE</a><br><br>
                    <a href="ChangePassword.php">Change Password</a>
                <?php
            }
            else{
                echo "Token Not Matched
                <a href=''>Try Again</a>";
            }
        }
        else{
            echo "OTP/Email Not Found, Please Register or Verify
                <a href=''>Try Again</a>";
        }
        
        // header("location:ChangePassword.php");
    }
}
else{
    ?>
    <form action="" method="post">
        Email : <input type="text" name="Email" placeholder="Enter Email"><br>
        OTP : <input type="text" name="Token" placeholder="Enter OTP">
        <input type="hidden" name="submit" value="VerifyOTP">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn btn-primary" type="submit" value="VerifyOTP">Verify OTP</button>
    </form>
<br><br>
    <form action="" method="post">
        Email : <input type="text" name="Email" placeholder="Enter Email">
        <input type="hidden" name="submit" value="GetOTP">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn btn-primary" type="submit"value="GetOTP">Get OTP</button>
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
?>