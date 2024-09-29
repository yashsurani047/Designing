<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

require_once "Basic.php";

class Database extends Basic{
    private $conn = null;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "PlacementPlus";

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
            echo "Exception Occurs in Database Connectivity<br><br>";
            echo "Exception Error : $e";
        }
    }
    public function __destruct(){
        mysqli_close($this->conn);
    }
    public function temp($cunt,$ent){
        echo $cunt;
        echo $ent;
    }
    public function GetConn(){
        return $this->conn;
    }
    public function Execute($query, $id = 0) {
        $data = mysqli_query($this->conn, $query);
        
        if ($data) {
            // Check SELECT statement
            if (stripos($query, 'SELECT') === 0) {
                // For SELECT queries, check if there are results
                if (mysqli_num_rows($data) > 0) {
                    return mysqli_fetch_all($data, MYSQLI_ASSOC); // Fetch all results
                } else {
                    return null; // No results found
                }
            } else {
                // For INSERT, UPDATE, DELETE queries
                if (stripos($query, 'INSERT') === 0) {
                    // Return the last inserted ID
                    if($id != 0){
                        return mysqli_insert_id($this->conn);
                    }
                    else{
                        return true;
                    }
                } else {
                    // For UPDATE or DELETE, just return true
                    return true;
                }
            }
        } else {
            return false;
        }
    }
       
    public function insert($query, $id = 0){
        $result = $this->Execute($query, $id);
        if($result){
            return mysqli_insert_id($this->conn);
        }
        else{
            $this->error("Inserting failed");

        }
    }
    public function update($query){
        $data = mysqli_query($this->conn, $query);
        if($data){
            return true;
        }
        else{
            return false;
        }
    }
    public function delete($query){
        $data = mysqli_query($this->conn, $query);
        if($data){
            return true;
        }
        else{
            return false;
        }
    }
    public function fetch($query) {
        // Execute the query
        $data = mysqli_query($this->conn, $query);
        
        // Check for query execution error
        if (!$data) {
            die('SQL Error: ' . mysqli_error($this->conn)); // Output the error message for debugging
        }
        
        // Check if any rows were returned
        if (mysqli_num_rows($data) > 0) {
            // Fetch and return the first result as an associative array
            return mysqli_fetch_array($data, MYSQLI_ASSOC);
        }
    
        return false; // No rows found
    }
    

    public function CheckUser($Email, $Password = null) {
        // Validate input
        if (empty($Email)) {
            $this->alert("Please provide either an email or a username.", 1);
            return false;
        }
    
        // Sanitize the email or username
        $Email = mysqli_real_escape_string($this->conn, $Email);
    
        // Determine if it's an email or username
        if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            // If it's an email
            $sql = "SELECT * FROM Users WHERE Email = '$Email'";
        } else {
            // Else it's a username
            $sql = "SELECT * FROM Users WHERE Username = '$Email'";
        }
    
        // Fetch the result
        $result = $this->fetch($sql);
    
        // Check if a user was found
        if ($result) {
            // Verify the password if provided
            if ($Password !== null) {
                if ($Password === $result['Password']) {
                    return true; // Password matches
                } else {
                    $this->alert("Password Mismatch", 1);
                }
            } else {
                return $result; // No password provided, return user data
            }
        } else {
            return false; // No user found
        }
    }
    
}
