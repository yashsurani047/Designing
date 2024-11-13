<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

require_once "Basic.php";

class Database extends Basic {
    private $conn = null;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "PlacementPlus";

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if (!$this->conn) {
            die("Database Connection Error: " . mysqli_connect_error());
        }
    }
    public function GetConnection(){
        return $this->conn  ;
    }

    public function __destruct() {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }

    public function Execute($query, $id = 0) {
        $data = mysqli_query($this->conn, $query);
        
        if ($data) {
            if (stripos($query, 'SELECT') === 0) {
                // Return the mysqli_result object for SELECT queries
                return $data; // Return the result set directly
            } else {
                return mysqli_affected_rows($this->conn) > 0; // Return true/false for non-SELECT queries
            }
        } else {
            return false; // Query failed
        }
    }    

    public function insert($query) {
        $result = $this->Execute($query);
        if ($result) {
            return mysqli_insert_id($this->conn);
        } else {
            // Handle the error appropriately
            die("Inserting failed: " . mysqli_error($this->conn));
        }
    }

    public function update($query) {
        return $this->Execute($query);
    }

    public function delete($query) {
        return $this->Execute($query);
    }

    public function fetch($query) {
        $data = mysqli_query($this->conn, $query);
        if (!$data) {
            die('SQL Error: ' . mysqli_error($this->conn));
        }
        return mysqli_fetch_array($data, MYSQLI_ASSOC);
    }

    public function selectAll($table) {
        $query = "SELECT * FROM `$table`";
        return $this->Execute($query);
    }

    // Other methods...
}
?>
