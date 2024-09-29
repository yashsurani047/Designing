<?php

include_once("$path/Component/container.php");
include_once("$path/Component/Alert.php");
include_once("$path/Component/table.php");


if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}

new Basic();
class Basic{    
    // public static $db = null;
    public function __construct($database = 0) {
        if(isset($_SESSION['Email'])){
            $this->redirect($this->getRoot()."/User//".$_SESSION['Usertype']);
        }
        else{
            // $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
            // $host = $_SERVER['HTTP_HOST'];
            // $filename = $_SERVER['SCRIPT_NAME'];
            // if($this->getRoot() !== $protocol.$host.$filename){
            //     // $this->redirect($this->getRoot());
            //     // return;
            // }
        }
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
    private function alertAndRedirect($message, $redirect) {
        // Escape the message for JavaScript
        $escapedMessage = addslashes($message);
        
        // Determine the redirect action
        if (is_numeric($redirect)) {
            $this->alert($escapedMessage);
            $this->back($redirect);
        } elseif ($redirect) {
            $this->alert($escapedMessage);
            $this->redirect($redirect);
        } else {
            echo "<script>alert('$escapedMessage');</script>";
        }
    }
    public function error($message, $redirect = "") {
        $_SESSION['tempdata']['error'] = $message;
        $this->setTempData("error", $message);
        $this->alertAndRedirect($message, $redirect);
    }
    public function success($message, $redirect = "") {
        $_SESSION['tempdata']['success'] = $message;
        $this->setTempData("success", $message);
        $this->alertAndRedirect($message, $redirect);
    }
    public function back($count = 1){
        // Determine the redirect action
        if (is_numeric($count)) {
            echo "<script>
                    window.history.go(-$count);
                  </script>";
        }else if($count != ""){
            $this->redirect($count);
        }
    }
    public function alert($message,$redirect = "") {
        $this->back($redirect);
        echo "<script>
                    alert('$message');
                  </script>";
    }
    public function redirect($url){
        echo "<script> window.location.href = '$url'; </script>";
    }
    public function getRoot(){
        $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $host = $_SERVER['HTTP_HOST']; // localhost, darshanraval.com
        $url = $protocol . $host . '/Designing/html';
        return $url;
    }
    public function isEmail($Email){
        return filter_var($Email, FILTER_VALIDATE_EMAIL) !== false;
    }
    public function partial($path,$filename){
        include_once "$path/Partial/$filename";
    }
}

