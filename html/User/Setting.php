<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            color: #555;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .form-group input[type="text"]:focus {
            outline: none;
            border-color: #007bff;
        }

        .form-group input[type="submit"]:focus {
            outline: none;
        }
        
        .form-footer {
            text-align: center;
            margin-top: 20px;
        }
        
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Change Password</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="oldPass">Enter Old Password:</label>
                <input type="text" id="oldPass" name="oldPass" required>
            </div>
            <div class="form-group">
                <label for="newPass1">Enter New Password:</label>
                <input type="text" id="newPass1" name="newPass1" required>
            </div>
            <div class="form-group">
                <label for="newPass2">Confirm New Password:</label>
                <input type="text" id="newPass2" name="newPass2" required>
            </div>
            <input type="hidden" name="submit" value="ChangePass">
            <div class="form-group">
                <input type="submit" value="Change Password">
            </div>
        </form>
    </div>

</body>
</html>

<?php
if(isset($_POST['submit'])){
include "../Function/Database.php";
$basic = new Basic();
if(!isset($_SESSION["Userid"])) $basic->alert("First Logined In", "..");
$db = new Database();
$user = $db->fetch("select * from Users where Id = '$_SESSION[Userid]'");
// var_dump($user);

$oldPass = $_POST['oldPass'];
$newPass = $_POST['newPass1'];
$newPass2 = $_POST['newPass2'];

$Is_Confirmed = $newPass == $newPass2;
if($Is_Confirmed){
    if($oldPass == $user['Password']){
        $db->update("update users set Password ='$newPass' where Id = $_SESSION[Userid]");
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