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
    public function SentOTPEmail($Email){
        // Validate the email format first
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            // If email format is invalid, return an error message
            self::error("Invalid email format");
            return false;
        }
    
        // Check if the email exists in the database
        $emailCheck = $this->fetch("select Email from Users where Email = '$Email'");
        
        if (!$emailCheck) {
            // If email is not found in the database, return an error
            self::error("Email not found");
            return false;
        }
    
        // Generate a random OTP
        $Token = random_int(10000, 99999);
    
        // If the email exists, update or insert the OTP in the database
        if ($data = $this->fetch("select * from otp where Email = '$Email'")) {
            $this->Execute("update otp set pass = '$Token' where Email = '$Email'");
        } else {
            $this->Execute("insert into otp (Email, Pass) values ('$Email', '$Token')");
        }
        $reference = $data['reference'];
        // Send the OTP email
        if ($this->SentEmail($Email, "Verification Link of your Placement Plus Account", "OTP: $Token \n\n" . $this->getRoot() . "/Authentication/verify.php?Token=" . $Token . "&ref=" .$reference)) {
            self::success("Email was sent successfully");
        } else {
            self::error("Email was not sent, Facing an Error");
        }
    }
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
            $mail->isSMTP();                      // Set mailer to use SMTP
            $mail->Host = $smtpHost;              // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;               // Enable SMTP authentication
            $mail->Username = $smtpUser;          // SMTP username
            $mail->Password = $smtpPass;          // SMTP password
            $mail->SMTPSecure = 'tls';            // Enable TLS encryption
            $mail->Port = $smtpPort;              // TCP port to connect to

            // Recipients
            $mail->setFrom($fromEmail, $fromName);
            $mail->addAddress($toEmail);          // Add a recipient

            // Content
            $mail->isHTML(false);                 // Set email format to plain text
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function HiringEmail($Email, $data) {
        // Extract relevant data
        $StudentName = $data['Student_Name'];
        $JobProfile = $data['Job_Profile'];
        $CompanyName = $data['Company_Name'];
        $CTC = $data['CTC'];
        $JobLocation = $data['Job_Location'];
        $JoiningDate = $data['Date_Of_Joining'];
        $HRContact = $data['HR_Contact'];
        // $HiringId = 12; // Ensure you get the correct Hiring_Id value
        // print_r($data);
        $hid = $this->Execute("select Id from hiring where User_Id = ".$data['User_Id']);
        echo $HiringId = "Hiring ID".(int)$hid; // Ensure you get the correct Hiring_Id value
        
        // Validate the email format first
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            // If email format is invalid, return an error message
            self::error("Invalid email format");
            return false;
        }
    
        // Generate the URL for downloading the offer letter
        $offerLetterUrl = "http://localhost/Designing/html/vendor/offerlatter.php?Hiring_Id=" . $HiringId; // Make sure Hiring_Id is included
    
        // Generate the plain text content for the offer letter
        $emailSubject = "Job Offer Letter from $CompanyName";
        $emailBody = "
            Dear $StudentName,
    
            Congratulations! We are pleased to extend the offer to join $CompanyName as a $JobProfile.
    
            Below are the details of your offer:
    
            - Job Profile: $JobProfile
            - CTC: $CTC
            - Job Location: $JobLocation
            - Date of Joining: $JoiningDate
    
            Our HR team will contact you shortly for further instructions. In the meantime, if you have any questions, feel free to reach out to our HR department.
    
            HR Contact Information: $HRContact
    
            Please click the link below to download your offer letter:
            
            $offerLetterUrl
    
            We look forward to welcoming you to our team!
    
            Best regards,
            The $CompanyName Team
            HR Contact Information: $HRContact
        ";
    
        // Send the email
        if ($this->SentEmail($Email, $emailSubject, $emailBody)) {
            self::success("Offer letter email was sent successfully to $StudentName.");
            $sql = "insert into hiring (User_Id, Job_Id) values($_GET[uid],$_GET[jid])";
            $this->Execute("update hiring set OfferSent = 1 where Id = $HiringId");
        } else {
            self::error("Error in sending offer letter email.");
        }
    }
       
}
?>