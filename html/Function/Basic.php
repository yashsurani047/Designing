<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(empty($path)){
    $path = "..";
}
include_once("$path/Component/container.php");
include_once("$path/Component/Alert.php");
include_once("$path/Component/table.php");
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
$basic = new Basic();

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$filename = $_SERVER['SCRIPT_NAME'];
$url = $protocol . $host . $filename;

if(isset($_SESSION['Usertype'])){
    // Use strpos to check if the Usertype is in the URL
    if (strpos($url, "User/".$_SESSION['Usertype']."/") || strpos($url, "user/".$_SESSION['Usertype']."/") || strpos($url, "Function") || strpos($url, "Profile") || strpos($url, "Setting") || $_SESSION['Usertype'] == "Admin") {
        // Only Access in own User Type, Function(Basic, Submit), Admins
    }
    else{
        $basic->error("Dont try to Access Unauthorized Area!");
        $basic->redirect($basic->getRoot() . "/User//" . $_SESSION['Usertype']);
    }
}
if (!isset($_SESSION['Email'])) {
    if ($basic->getRoot()."/index.php" != $basic->getUrl()) {
        // $basic->redirect($basic->getRoot());
    }
} else {
    if ($basic->getRoot() . "/User//" . $_SESSION['Usertype'] === $protocol . $host . $filename) {
        $basic->redirect($basic->getRoot() . "/User//" . $_SESSION['Usertype']);
    }
}

class Basic{    
    // public static $db = null;
    public function __construct($database = 0) {
        /*
        if($database == 1){
            require 'Database.php'
            $db = new Database();
        }
        */
    }
    public function setTempData($key, $value) {
        $_SESSION['tempdata'][$key] = $value;
    }
    public function getTempData($key) {
        if (isset($_SESSION['tempdata'][$key])) {
            $value = $_SESSION['tempdata'][$key];
            unset($_SESSION['tempdata'][$key]); // Remove it after accessing
            return $value;
        }
        return null; // Or handle the absence of data
    }
    private function alertAndRedirect($message, $redirect, $alertType = '') {
        // Escape the message for JavaScript
        $escapedMessage = addslashes($message);
        
        // Prepare JavaScript alert based on alert type
        $alertScript = "<script>alert('$escapedMessage');</script>";
        
        // Redirect based on the redirect parameter
        if (is_numeric($redirect)) {
            echo $alertScript;
            $this->back($redirect);
        } elseif ($redirect) {
            echo $alertScript;
            $this->redirect($redirect);
        } else {
            echo $alertScript;
        }
    }
    
    public function error($message, $redirect = "") {
        $_SESSION['tempdata']['error'] = $message;
        $this->setTempData("error", $message);
        $this->alertAndRedirect($message, $redirect, 'error');
    }
    
    public function success($message, $redirect = "") {
        $_SESSION['tempdata']['success'] = $message;
        $this->setTempData("success", $message);
        $this->alertAndRedirect($message, $redirect, 'success');
    }
    
    public function warning($message, $redirect = "") {
        $_SESSION['tempdata']['warning'] = $message;
        $this->setTempData("warning", $message);
        $this->alertAndRedirect($message, $redirect, 'warning');
    }
    
    public function info($message, $redirect = "") {
        $_SESSION['tempdata']['info'] = $message;
        $this->setTempData("info", $message);
        $this->alertAndRedirect($message, $redirect, 'info');
    }
    
    public function back($count = 1) {
        if (is_numeric($count)) {
            echo "<script>window.history.go(-$count);</script>";
        } elseif ($count != "") {
            $this->redirect($count);
        }
    }
    
    public function alert($message, $redirect = "", $type = "") {
        if($type == "success"){
            echo "<script>alert('$message');</script>";
        }
        else if($type == "info"){
            echo "<script>alert('$message');</script>";
        }
        else if($type == "error"){
            echo "<script>alert('$message');</script>";
        }
        else if($type == "danger"){
            echo "<script>alert('$message');</script>";
        }
        else if($type == ""){
            echo "<script>alert('$message');</script>";
        }
        $this->back($redirect);
    }
    
    public function redirect($url) {
        echo "<script>window.location.href = '$url';</script>";
    }
    
    public function getRoot(){
        $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $host = $_SERVER['HTTP_HOST']; // localhost, darshanraval.com
        $url = $protocol . $host . '/Designing/html';
        return $url;
    }
    public function getUrl(){
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'];
        $filename = $_SERVER['SCRIPT_NAME'];
        $url = $protocol . $host . $filename;
        return $url;
    }
    public function isEmail($Email){
        return filter_var($Email, FILTER_VALIDATE_EMAIL) !== false;
    }
    public function partial($path,$filename){
        include_once "$path/Partial/$filename";
    }
    public function SentOTPEmail($Email, $first = 0){
        $db = new Database();
        $basic = new Basic();
        if($first == 0){
            $Email = $_POST['Email'];
        }
        $user = $db->Execute("select * from Users where Email = '$Email'; ");
        $Is_User = $Email == $user['Email']; //check its user or not
        if($Is_User){
            $Token = random_int(10000,99999);
            if($db->fetch("select Email from forgot where Email = '$Email'")){
                $data = $db->Execute("update forgot set Pass = '$Token'");
            }
            else{
                $data = $db->Execute("insert into forgot (Email, Pass) values ('$Email','$Token');");
            }
            // Configuration
            $smtpHost = 'smtp.gmail.com'; // SMTP server
            $smtpPort = 587; // SMTP port
            $smtpUser = 'facehidegaming@gmail.com'; // SMTP username
            $smtpPass = 'ctzmjwujvphcfubw'; // SMTP password
            $fromEmail = 'facehidegaming@gmail.com'; // Sender email
            $fromName = 'Placement Plus'; // Sender name

            // Recipient email and message details
            $toEmail = $Email; // Recipient email
            $subject = 'Verification Link for Change Password of Your Placement Plus Account'; // Email subject
            $message = $basic->getRoot()."/Authentication/verify.php?Token=".$Token; // Email message body

            // Create a new PHPMailer instance
            $mail = new PHPMailer(true);

            try {
                // Server settings
                $mail->isSMTP();                                        // Set mailer to use SMTP
                $mail->Host = $smtpHost;                               // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = $smtpUser;                          // SMTP username
                $mail->Password = $smtpPass;                          // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption
                $mail->Port = $smtpPort;                              // TCP port to connect to

                // Recipients
                $mail->setFrom($fromEmail, $fromName);
                $mail->addAddress($toEmail);                          // Add a recipient

                // Content
                $mail->isHTML(false);                                  // Set email format to plain text
                $mail->Subject = $subject;
                $mail->Body    = $message;

                $mail->send();
                $basic->error("Email sent successfully",$basic->getRoot()."/Authentication/Login.php");
            } catch (Exception $e) {
                $basic->error("Email sending failed: {$mail->ErrorInfo}",$basic->getRoot()."/Authentication/Login   .php");
            }
        }
        else{
            $basic->success("Email",$basic->getRoot()."/Authentication/Login.php");
            // $basic->error("Email not found",$basic->getRoot()."/Authentication/ForgetPassword.php");
        }
    }
}

