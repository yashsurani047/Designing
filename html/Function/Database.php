<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

// Include Composer's autoloader
require_once __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
    public function Execute_All($query) {
        // Execute the query once and store the result
        $result = $this->Execute($query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }    
    public function Execute_One($query){
        return mysqli_fetch_array($this->Execute($query));
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
    public function SentEmail($toEmail,$subject,$message){
        $smtpHost = 'smtp.gmail.com'; // SMTP server
        $smtpPort = 587; // SMTP port
        $smtpUser = 'facehidegaming@gmail.com'; // SMTP username
        $smtpPass = 'ctzmjwujvphcfubw'; // SMTP password
        $fromEmail = 'facehidegaming@gmail.com'; // Sender email
        $fromName = 'Placement Plus'; // Sender name

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
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function SentOTPEmail($Email){
        $Token = random_int(10000,99999);
        if($this->fetch("select Email from forgot where Email = '$Email'")){
            $data = $this->Execute("update forgot set Pass = '$Token'");
        }
        else{
            $data = $this->Execute("insert into forgot (Email, Pass) values ('$Email','$Token');");
        }
        $this->SentEmail($Email, "Verification Link of your Placement Plus Account", "OTP : $Token \n\n".$this->getRoot()."/Authentication/verify.php?Token=".$Token);
    }
}
?>
