<?php

class Database{
    private $conn = null;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "PlacementPlsu";

    public function __construct() {
        try{
            $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
            if($conn->connect_error){
                die("Database Connection Error : ". $conn->connect_error);
            }
            else{
                $this->conn = $conn;
            }
        } catch(Exception $e){
            echo "Exception Error : $e";
        }
    }
    public function __destruct(){
        mysqli_close($this->conn);
    }
    public function GetConn(){
        return $this->conn;
    }

    public function insert($sql){
        $data = mysqli_query($this->conn, $sql);
        if($data){
            return mysqli_insert_id($this->conn);
            // return true;
        }
        else{
            return false;
        }
    }
    public function update($sql){
        $data = mysqli_query($this->conn, $sql);
        if($data){
            // return mysqli_insert_id($this->conn);
            return true;
        }
        else{
            return false;
        }
    }
    public function delete($sql){
        $data = mysqli_query($this->conn, $sql);
        if($data){
            // return mysqli_insert_id($this->conn);
            return true;
        }
        else{
            return false;
        }
    }
    public function fetch($sql){
        $data = mysqli_query($this->conn, $sql);
        if($data){
            $result = mysqli_fetch_array($this->conn, $sql);
            return $result;
        }
        else{
            return false;
        }
    }

    public function CheckUser($username, $password) {
        // Prepare the SQL statement to prevent SQL injection
        $stmt = $this->conn->prepare("SELECT * FROM Users WHERE Username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Check if a user was found
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            // Verify the password (consider using password hashing)
            if (password_verify($password, $user['password'])) {
                return true;
            }
            else{
                $this->alert("Password Mismatch");
                return false;
            }
        }
        $this->alert("User Not Found");
        return false;
    }
    
    function setTempData($key, $value) {
        $_SESSION['tempdata'][$key] = $value;
    }
    
    function getTempData($key) {
        if (isset($_SESSION['tempdata'][$key])) {
            $value = $_SESSION['tempdata'][$key];
            unset($_SESSION['tempdata'][$key]); // Remove it after accessing
            return $value;
        }
        return null; // Or handle the absence of data
    }

    public function alert($message){
        echo "<script>alert('$message');</script>";
    }
    
}

