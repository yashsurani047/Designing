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
        self::$basic = new Basic();
        self::$db = new Database();
        // Include PHPMailer classes
        require self::$path.'/PHPMailer/Exception.php';
        require self::$path.'/PHPMailer/PHPMailer.php';
        require self::$path.'/PHPMailer/SMTP.php';

        if (session_status() !== PHP_SESSION_ACTIVE) session_start();

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
        elseif ($_POST["submit"] == "Apply") $this->Apply();
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
            if (self::$db->fetch("select * from Users where Email = '$Email'") == false) {
                if(self::$db->insert("insert into Users (Usertype,Email,Password) values('$Usertype','$Email','$Password1')")){
                    $OTP = random_int(100000,999999);
                    self::$db->Execute("insert into otp (Email,OTP) values('$Email',$OTP)");
                    self::$db->SentOTPEmail($Email);
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
        $Email = $_POST['Email'] ?? null; if (!$Email) { self::$basic->alert("Please Provide Email!", 1); return; }
        $Password = $_POST['Password'] ?? null; if (!$Password) { self::$basic->alert("Please Provide Password!", 1); return; }

        // $result = self::$db->CheckUser($Email, $Password);
        $result = self::$db->Execute("select * from Users where Email='$Email' and Password='$Password'");

        if ($result == true) {
            if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                $UserDB = self::$db->fetch("select * from Users where Email = '$Email'; ");
                $Username = $UserDB["Username"];
            } else {
                $Username = $Email;
                $UserDB = self::$db->fetch("select * from Users where Username = '$Email'; ");
                $Email = $UserDB["Email"];
            }
            $isExistUser = self::$db->fetch("select * from Users where Email = '$Email'");
            if($isExistUser <=0 || $isExistUser == null){
                self::$basic->error("Account Not Found", 1);
                return;
            }
            else{
                if($UserDB["verified"] == 0){
                    self::$basic->error("Account not Verified", 1);
                    return;
                }
            }
            if($UserDB["verified"] == 0){
                self::$basic->error("Account not Verified", 1);
                return;
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
        $user = $db->fetch("select * from Users where Email = '$Email'; ");
        $Is_User = $Email == $user['Email']; //check its user or not
        if($Is_User){
            $db->SentOTPEmail($Email);
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
        $basic = new Basic();
        $user = $_SESSION['Usertype'];
        $userID = $_SESSION['Userid'];
        if($user == "Student"){
            $flag = 0;
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
                $flag = 0; // Initialize flag
                $missedData = []; // Initialize missed data array
                // Check each field and add to missedData if empty
                if (empty($First_Name)) {
                    $missedData[] = 'First_Name';
                    $flag = 1;
                }
                if (empty($Last_Name)) {
                    $missedData[] = 'Last_Name';
                    $flag = 1;
                }
                if (empty($Father_Name)) {
                    $missedData[] = 'Father_Name';
                    $flag = 1;
                }
                if (empty($Parent_Number)) {
                    $missedData[] = 'Parent_Number';
                    $flag = 1;
                }
                if (empty($Email)) {
                    $missedData[] = 'Email';
                    $flag = 1;
                }
                if (empty($Stream)) {
                    $missedData[] = 'Stream';
                    $flag = 1;
                }
                if (empty($Phone_Number)) {
                    $missedData[] = 'Phone_Number';
                    $flag = 1;
                }
                if (empty($Address)) {
                    $missedData[] = 'Address';
                    $flag = 1;
                }
                if (empty($State)) {
                    $missedData[] = 'State';
                    $flag = 1;
                }
                if (empty($Zip_Code)) {
                    $missedData[] = 'Zip_Code';
                    $flag = 1;
                }
                if (empty($Language)) {
                    $missedData[] = 'Language';
                    $flag = 1;
                }
                // Convert missedData array to a string
                $missedDataString = implode(', ', $missedData);
       
                if($flag){
                    $basic->error("Data Missing : $missedDataString ",$basic->getRoot()."/User/Student/Profile.php");
                }
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
                // Collect form data into an associative array
                $companyData = [
                    'Company_Name' => $_POST["Company_Name"],
                    'Company_URL' => $_POST["Company_URL"],
                    'Company_Address' => $_POST["Company_Address"],
                    'Contact_Information' => $_POST["Contact_Information"],
                    'Industry_Sector' => $_POST["Industry_Sector"],
                    'Company_Overview' => $_POST["Company_Overview"],
                    'Top_Client' => $_POST["Top_Client"],
                    'Company_Award' => $_POST["Company_Award"],
                    'Language' => $_POST["Language"]
                ];

                $missedData = []; // Initialize missed data array

                // Check each field and add to missedData if empty
                foreach ($companyData as $fieldName => $fieldValue) {
                    if (empty($fieldValue)) {
                        $missedData[] = $fieldName;
                    }
                }

                // Convert missedData array to a string
                if (!empty($missedData)) {
                    $missedDataString = implode(', ', $missedData);
                    $basic->error("Data Missing: $missedDataString", $basic->getRoot()."/User/Company/Profile.php");
                }

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
                // Collect job-related form data into an associative array
                $basic = new Basic();
                $jobData = [
                    'Job_Location' => $_POST["Job_Location"],
                    'Eligibility_Criteria' => $_POST["Eligibility_Criteria"],
                    'Selection_Process' => $_POST["Selection_Process"],
                    'HR_Name' => $_POST["HR_Name"],
                    'HR_Contact' => $_POST["HR_Contact"]
                ];

                $missedData = []; // Initialize missed data array

                // Check each field and add to missedData if empty
                foreach ($jobData as $fieldName => $fieldValue) {
                    if (empty($fieldValue)) {
                        $missedData[] = $fieldName;
                    }
                }

                // Convert missedData array to a string
                if (!empty($missedData)) {
                    $missedDataString = implode(', ', $missedData);
                    $basic->error("Data Missing: $missedDataString", 1);
                }else{
                    $query = "INSERT INTO companyprofile2 VALUES (default, '$userID', '$Job_Location', '$Eligibility_Criteria', '$Selection_Process', '$HR_Name', '$HR_Contact', default)";
                }
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
    function Apply(){
        $db = new Database();
        $basic = new Basic();
        // echo "Job Id : ".$Job_Id = $_POST['Job_Id'];
        // echo "<br>User ID : ".$userID = $_SESSION['Userid'];
        
        echo "<br><br>Processing Applying...";
        
        $db->Execute("insert into Applied (User_Id, Job_Id) values($_SESSION[Userid],$_POST[Job_Id])");
        $basic->success("Job Applied Successfully",2);
    }
    
}

