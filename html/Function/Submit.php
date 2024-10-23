<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
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
        // Include PHPMailer classes
        require self::$path.'/PHPMailer/Exception.php';
        require self::$path.'/PHPMailer/PHPMailer.php';
        require self::$path.'/PHPMailer/SMTP.php';

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
        elseif ($_POST["submit"] == "Profile") $this->Profile();
        elseif ($_POST["submit"] == "Profile2") $this->Profile2();
        elseif ($_POST["submit"] == "AddJob") $this->JobDrive();
        elseif ($_POST["submit"] == "ForgotPass") $this->ForgotPass();
        elseif ($_POST["submit"] == "ChangePass") $this->ChangePass();
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
            $_SESSION['Userid'] = $UserDB['Id'];
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

    function forgotPass(){
        $db = new Database();
        $basic = new Basic();
        $Email = $_POST['Email'];
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
            $subject = 'Verification Link of your Placement Plus Account'; // Email subject
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
            $basic->error("Email not found",$basic->getRoot()."/Authentication/ForgetPassword.php");
        }
    }
    function ChangePass(){
        $userid = $_SESSION['TokenUserId'];
        $newPass = $_POST['newPass'];
        $db = new Database();
        $basic = new Basic();
        echo $sql = "update Users set Password = '$newPass' where Id=$userid";
        $db->Execute($sql);
        $basic->success("Password Changed Successfully",$basic->getRoot()."/Authentication/Login.php");
    }
    function Profile(){
        $user = $_SESSION['Usertype'];
        $userID = $_SESSION['Userid'];
        if($user == "Student"){
            $First_Name = $_POST["First_Name"];
            $Last_Name = $_POST["Last_Name"];
            $Father_Name = $_POST["Father_Name"];
            $Parent_Number = $_POST["Parent_Number"];
            $Email = $_POST["Email"];
            $Stream = $_POST["Stream"];
            $Phone_Number = $_POST["Phone_Number"];
            $Address = $_POST["Address"];
            $State = $_POST["State"];
            $Zip_Code = $_POST["Zip_Code"];
            $Language = $_POST["Language"];
            
            if(self::$db->Execute("select * from studentprofile where User_Id = '$userID'") != null) {
                $query = "UPDATE studentprofile SET First_Name = '$First_Name', Last_Name = '$Last_Name',
                Father_Name = '$Father_Name', Parent_Number = '$Parent_Number',
                Email = '$Email', Stream = '$Stream', Phone_Number = '$Phone_Number',
                Address = '$Address', State = '$State', Zip_Code = $Zip_Code,
                Language = '$Language' WHERE User_ID = '$userID'";
            }
            else{
                $query = "insert into studentprofile values(default,'$userID','$First_Name','$Last_Name','$Father_Name','$Parent_Number','$Email','$Stream','$Phone_Number','$Address','$State',$Zip_Code,'$Language',default)";
            }
        }
        if($user == "Company"){
            $Company_Name = $_POST["Company_Name"];
            $Company_URL = $_POST["Company_URL"];
            $Company_Address = $_POST["Company_Address"];
            $Contact_Information = $_POST["Contact_Information"];
            $Industry_Sector = $_POST["Industry_Sector"];
            $Company_Overview = $_POST["Company_Overview"];
            $Top_Client = $_POST["Top_Client"];
            $Company_Award = $_POST["Company_Award"];
            $Language = $_POST["Language"];

            if(self::$db->Execute("select * from companyprofile where User_Id = '$userID'") != null) {
                $query = "UPDATE companyprofile SET 
                    Company_Name = '$Company_Name', Company_URL = '$Company_URL', Company_Address = '$Company_Address', 
                    Contact_Information = '$Contact_Information', Industry_Sector = '$Industry_Sector', 
                    Company_Overview = '$Company_Overview', Top_Client = '$Top_Client', 
                    Company_Award = '$Company_Award', Language = '$Language' WHERE User_ID = '$userID'";

            }
            else{
                $query = "INSERT INTO companyprofile VALUES (default, '$userID', '$Company_Name', '$Company_URL' 
                '$Company_Address', '$Contact_Information', '$Industry_Sector', 
                '$Company_Overview', '$Top_Client', '$Company_Award', '$Language',default)";
            }
        }
        
        if(self::$db->Execute($query)){
            self::$basic->success("Profile Updated");
        }
        else{
            self::$basic->error("Profile Updation Error");
        }
        self::$basic->redirect(self::$basic->getRoot()."/User/$user/");
    }
    function Profile2(){
        $user = $_SESSION['Usertype'];
        $userID = $_SESSION['Userid'];

        if($user == "Company"){
            $Job_Location = $_POST["Job_Location"];
            $Eligibility_Criteria = $_POST["Eligibility_Criteria"];
            $Selection_Process = $_POST["Selection_Process"];
            $HR_Name = $_POST["HR_Name"];
            $HR_Contact = $_POST["HR_Contact"];

            if(self::$db->Execute("select * from companyprofile2 where User_Id = '$userID'") != null) {
                $query = "UPDATE companyprofile2 SET 
                Job_Location = '$Job_Location', Eligibility_Criteria = '$Eligibility_Criteria', Selection_Process = '$Selection_Process', 
                HR_Name = '$HR_Name', HR_Contact = '$HR_Contact' WHERE User_ID = '$userID'";
            } else {
                // Insert query
                $query = "INSERT INTO companyprofile2 VALUES (default, '$userID', '$Job_Location', '$Eligibility_Criteria', '$Selection_Process', '$HR_Name', '$HR_Contact', default)";
            }
        }
        
        if(self::$db->Execute($query)){
            self::$basic->success("Profile Updated");
        }
        else{
            self::$basic->error("Profile Updation Error");
        }
        self::$basic->redirect(self::$basic->getRoot()."/User/$user/");
    }
    function JobDrive(){
        $user = $_SESSION['Usertype'];
        $userID = $_SESSION['Userid'];

        if($user == "Company"){$Job_Id = $_POST["Job_Id"] ?? null;
            $Job_Profile = $_POST["Job_Profile"] ?? null;
            $CTC = $_POST["CTC"] ?? null;
            $Job_Location = $_POST["Job_Location"] ?? null;
            $Internship = $_POST["Internship"] ?? null;
            $Stipend = $_POST["Stipend"] ?? null;
            $Selection_Process = $_POST["Selection_Process"] ?? null;
            $Bond = $_POST["Bond"] ?? null;
            $Term = $_POST["Term"] ?? null;
            $Date_Of_Joining = $_POST["Date_Of_Joining"] ?? null;
            $Venue = $_POST["Venue"] ?? null;
            $DateTime = $_POST["DateTime"] ?? null;
            $Batch = $_POST["Batch"] ?? null;
            $Eligible_Course = $_POST["Eligible_Course"] ?? null;
            $Due_Date = $_POST["Due_Date"] ?? null;
            
            // Collect all required fields to validate
            $requiredFields = [
                'Job_Profile' => $Job_Profile,
                'CTC' => $CTC,
                'Job_Location' => $Job_Location,
                'Internship' => $Internship,
                'Stipend' => $Stipend,
                'Selection_Process' => $Selection_Process,
                'Bond' => $Bond,
                'Term' => $Term,
                'Date_Of_Joining' => $Date_Of_Joining,
                'Venue' => $Venue,
                'DateTime' => $DateTime,
                'Batch' => $Batch,
                'Eligible_Course' => $Eligible_Course,
                'Due_Date' => $Due_Date,
            ];
            
            // Check for empty fields
            $errors = [];
            foreach ($requiredFields as $field => $value) {
                if (empty($value)) {
                    $errors[] = $field;
                }
            }
            
            // If there are errors, return them
            if (!empty($errors)) {
                $errorMessage = implode(", ", $errors);
                $basic = new Basic();
                $basic->error("Please fill in the following fields: " . $errorMessage, 1);
                return;
            }
            
            // Proceed with your code if there are no errors
            

            if (self::$db->Execute("SELECT * FROM jobs WHERE Id = '$Job_Id'") != null) {
                // Update existing record
                $query = "UPDATE jobs SET 
                    Job_Profile = '$Job_Profile',
                    CTC = '$CTC', 
                    Job_Location = '$Job_Location', 
                    Internship = '$Internship', 
                    Stipend = '$Stipend', 
                    Selection_Process = '$Selection_Process', 
                    Bond = '$Bond',
                    Term = '$Term',
                    Date_Of_Joining = '$Date_Of_Joining', 
                    Venue = '$Venue', 
                    DateTime = '$DateTime', 
                    Eligible_Course = '$Eligible_Course', 
                    Batch = '$Batch', 
                    Due_Date = '$Due_Date' 
                    WHERE Id = '$Job_Id'";
            } else {
                // Insert new record
                $query = "INSERT INTO jobs (User_ID, Job_Profile, CTC, Job_Location, Internship, 
                    Stipend, Selection_Process, Bond, Term, Date_Of_Joining, Venue, DateTime, Batch, Eligible_Course, Due_Date) 
                    VALUES ('$userID', '$Job_Profile', '$CTC', '$Job_Location', '$Internship', 
                    '$Stipend', '$Selection_Process', '$Bond', '$Term', '$Date_Of_Joining', '$Venue', '$DateTime', 
                    '$Batch', '$Eligible_Course', '$Due_Date')";
            }
            echo $query;
            if(self::$db->Execute($query)){
                self::$basic->success("Job Added or Updated");
            }
            else{
                self::$basic->error("Profile Adding or Updation Error");
            }
            self::$basic->redirect(self::$basic->getRoot()."/User/$user/JobDrive.php");
        }
    }
}

