<?php
new Submit();
class Submit
{
    public static $path = "..";
    public static $basic;
    public static $db;
    public function __construct()
    {
        require_once self::$path."/Function/Basic.php";
        require_once self::$path."/Function/Database.php";
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        self::$basic = new Basic();
        self::$db = new Database();

        if (!isset($_POST['submit'])) {
            if(!isset($_GET['submit'])){
                self::$basic->alert("Something Went Wrong! (Action Not Performing)",1);
            }
            else{
                $this->programGet();
            }
        } else {
            $this->programPost();
        }
    }
    function programPost()
    {
        if ($_POST["submit"] == "Register") $this->Register();
        elseif ($_POST["submit"] == "Login") $this->Login(); 
        elseif($_POST['submit'] == "Logout") $this->Logout();
        exit();
    }
    function programGet(){
        if($_GET['submit'] == "Logout") $this->Logout();
        exit();
    }
    function Register()
    {
        $Email = $_POST['Email'] ?? null; if (!$Email) { self::$basic->alert("Please Provide Email!", 1); return; }
        $Usertype = $_POST['Usertype'] ?? null; if (!$Usertype) { self::$basic->alert("Please Select User Type!", 1); return; }
        $Password1 = $_POST['Password1'] ?? null; if (!$Password1) { self::$basic->alert("Please Provide Password!", 1); return; }
        $Password2 = $_POST['Password2'] ?? null; if (!$Password2) { self::$basic->alert("Please Provide Confirm Password!", 1); return; }
        
        if ($Password1 == $Password2) {
            if (self::$db->CheckUser($Email) == false) {
                if(self::$db->insert("insert into Users (Usertype,Email,Password) values('$Usertype','$Email','$Password1')")){
                    self::$basic->success("User Registered Successfully",self::$basic->getRoot()."/Authentication");
                }
                else{
                    self::$basic->error("User Registration Error ",1);
                }
            } else {
                self::$basic->error("Email or Username Already Exist!", 1);
            }
        } else {
            self::$basic->alert("Password Not Matched", 1);
        }
    }
    function Login(){
        echo "w";
        $Email = $_POST['Email'] ?? null; if (!$Email) { self::$basic->alert("Please Provide Email!", 1); return; }
        $Password = $_POST['Password'] ?? null; if (!$Password) { self::$basic->alert("Please Provide Password!", 1); return; }

        $result = self::$db->CheckUser($Email, $Password);
        if ($result == true) {
            if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                $UserDB = self::$db->fetch("select * from Users where Email = '$Email'; ");
                $Username = $UserDB["Username"];
            } else {
                $Username = $Email;
                $UserDB = self::$db->fetch("select * from Users where Username = '$Email'; ");
                $Email = $UserDB["Email"];
            }
            $Usertype = $UserDB["Usertype"];
            if (session_status() !== PHP_SESSION_ACTIVE)
                session_start();
            $_SESSION['Usertype'] = $UserDB['Usertype'];
            $_SESSION['Username'] = $UserDB['Username'];
            $_SESSION['Email'] = $UserDB['Email'];
            echo "logined<br><br>";
            echo "<br>User Type : " . $_SESSION['Usertype'];
            echo "<br>User Name : " . $_SESSION['Username'];
            echo "<br>Email : " . $_SESSION['Email'];
            $path = self::$path;
            $redirect = "$path/User/$Usertype";
            self::$basic->success("You Have Successfully Login", $redirect);
        }
        else{
            self::$basic->alert("User Not Found", 1);
        }
    }
    function Logout()
    {
        if ($_GET['submit'] == "Logout") {
            session_destroy();

            self::$basic->success("You Have Successfully Logout",self::$basic->getRoot());
            exit();
        }
        if ($_POST['submit'] == "Logout") {
            session_destroy();
            self::$basic->success("You Have Successfully Logout");
            self::$basic->redirect(self::$basic->getRoot());
            exit();
        }
    }
}

