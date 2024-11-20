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
    if (strpos($url, "User/".$_SESSION['Usertype']."/") || strpos($url, "user/".$_SESSION['Usertype']."/") || strpos($url, "Function") || strpos($url, "Profile") || strpos($url, "Setting") || strpos($url, "Component") || $_SESSION['Usertype'] == "Admin") {
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
}

