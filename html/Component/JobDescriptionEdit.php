<?php
if(isset($_GET['id'])){
    ?>
    <?php
$path = "..";

require_once "$path/Function/Basic.php";
require_once "$path/Function/Database.php";
$basic  = new Basic($path);

$db = new Database();


if(!isset($_GET['id'])){
     $_GET['id'] = null;
}else{
    $sql = "select * from jobs where Id = ".$_GET['id'];
    if(!$job = $db->Execute_One($sql)){
        $basic->error("$_GET[table] Not Found", 1);
    }
    else{
        $Is_Edit = $_SESSION['Userid'] == $job['User_Id'];
    }
}
$isAdmin = $_SESSION['Usertype'] == "Admin";
    $sql = "select * from companyprofile where User_Id = ". $job['User_Id'];
    $profile = $db->Execute_One($sql);
$Jobowner = $db->Execute("select * from companyprofile where User_Id = ".$_SESSION['Userid']);
if(!$isAdmin && !isset($profile['Company_Name'])){
        echo $_SESSION['Usertype'];
        echo "<h2>Profile Not Updated <h2><br>";
        echo "<a href='$path/User/$_SESSION[Usertype]/Profile.php'>My Profile<a><br><br>";
        echo "<button type='button' class='btn btn-danger' onclick='return window.history.go(-1)''>Back</button>";   
}
else {
?>
<main>
    <!-- Main Content Starts Here -->
<div class="col-xl" style="margin-top: 30px; margin-left: 30px; margin-right: 30px;">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="">Job Details</h3>
                <small class="text-muted float-end"></small>
            </div>
            <div class="card-body">
                <form id="formAccountSettings" action="<?php echo $path?>/Function/Submit.php" method="post">
                    <!-- Row for Job Description and Contact Details -->
                    <div class="row">
                        <!-- Job Description on the Left -->
                        <div class="col-md-6">
                            <b>
                                <h5>Job Description</h5>
                            </b> <br>
                            <!-- Company Name -->
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Company Name</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        name="CompanyName" value="<?php echo $profile['Company_Name'] ?>" disabled/>
                                </div>
                            </div>
                            <!-- Company URL -->
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-url">Company URL</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-url"
                                        name="CompanyURL" value="<?php echo $profile['Company_URL'] ?>" disabled/>
                                </div>
                            </div>
                            <!-- Additional Job Description Fields -->
                             
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Job Profile</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-icon-default-company" class="form-control"
                                        name="Job_Profile" value="<?php echo $job['Job_Profile']??'' ?>" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">CTC</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        name="CTC" value="<?php echo $job['CTC']??'' ?>" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Job Location</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-icon-default-company" class="form-control"
                                        name="Job_Location" value="<?php echo $job['Job_Location']??''  ?>" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Internship</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-icon-default-company" class="form-control"
                                        name="Internship" value="<?php echo $job['Internship']??''  ?>" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Stipend</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        name="Stipend" value="<?php echo $job['Stipend']??''  ?>" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Selection Process</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        name="Selection_Process" value="<?php echo $job['Selection_Process']??''  ?>" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Bond">Bond</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="Bond" class="form-control"
                                        name="Bond" value="<?php echo $job['Bond']??''  ?>" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Term">Terms of Bond</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="Term" class="form-control"
                                        name="Term" value="<?php echo $job['Term']??''  ?>" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Date_Of_Joining">Date of Joining</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="Date_Of_Joining" class="form-control"
                                        name="Date_Of_Joining" value="<?php echo $job['Date_Of_Joining']??''  ?>" />
                                </div>
                            </div>
                        </div>

                        <!-- Contact Details on the Right -->
                        <div class="col-md-6">
                            <b>
                                <h5>Contact Details</h5>
                            </b> <br>
                            <!-- Contact Person -->
                            <div class="mb-3">
                                <label class="form-label" for="contactPerson">Contact Person</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="contactPerson" name="Contact_person"
                                        value="<?php echo $profile['Contact_Information'] ?>" disabled/>
                                </div>
                            </div>
                            <!-- Venue -->
                            <div class="mb-3">
                                <label class="form-label" for="venue">Venue</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="venue" name="Venue" value="Will be Declared Soon"
                                        />
                                </div>
                            </div>
                            <!-- Date and Time -->
                            <div class="mb-3">
                                <label class="form-label" for="dateTime">Date and Time</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="dateTime" name="DateTime" value="<?php echo $job['DateTime']??''  ?>"
                                        />
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <h5>Eligibility Criteria</h5>
                            <br>
                            <div class="mb-3">
                                <label class="form-label" for="Batch">Batch</label>
                                <input type="text" class="form-control" id="Batch" name="Batch" value="<?php echo $job['Batch']??''  ?>" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Eligible_Course">Eligible Courses</label>
                                <input type="text" class="form-control" id="Eligible_Course" name="Eligible_Course"
                                    value="<?php echo $job['Eligible_Course']??''  ?>" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="eligibleCourses">Registration</label>
                                <input type="text" class="form-control" id="eligibleCourses" name="Due_Date"
                                    value="<?php echo $job['Due_Date']??''  ?>"/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                     <!-- for College -->
                     <?php 
                        if(!isset($job['Id'])){
                            ?>
                            <input type="hidden" class="btn btn-success" name="submit" value="AddJob">
                            <input type="submit" class="btn btn-success" value="Post Now">
                            <?php
                        }
                        else{
                            ?>
                            <?php echo $job['Id']?>
                            <input type="hidden" class="btn btn-success" name="submit" value="AddJob">
                            <input type="hidden" name="Job_Id" value="<?php echo $job['Id']?>">
                            <input type="submit" class="btn btn-success" value="Update Job Details">
                            <?php
                        }
                        ?>
                        <button type="button" class="btn btn-danger" onclick="return window.history.go(-1)">Cancel</button>
                        <br><br>
                        <script>
                            function showEdit() {
                                document.getElementById('jobDescription').style.display = 'none';
                                document.getElementById('jobDescriptionEdit').style.display = 'block';
                            }
                        </script>
                        <br><br>
                  
                </form>
            </div>
        </div>
    </div>
</main>
<?php };
}
else{
    ?>
<?php
$path = "..";

require_once "$path/Function/Basic.php";
require_once "$path/Function/Database.php";
$basic  = new Basic($path);
$db = new Database();

if (!isset($_GET['id'])) {
    $_GET['id'] = 0;  // No job ID provided
} else {
    // Fetch job details if ID is provided
    $sql = "SELECT * FROM jobs WHERE Id = " . $_GET['id'];
    $job = $db->Execute_One($sql);
    if (!$job && $_GET['id'] != 0) {
        $basic->error("$_GET[table] Not Found", 0);
    } else {
        $Is_Edit = $_SESSION['Userid'] == $job['User_Id'];
    }
}

$isAdmin = $_SESSION['Usertype'] == "Admin";

// Fetch company profile related to the job owner or user
$sql = "SELECT * FROM companyprofile WHERE User_Id = " . ($job['User_Id'] ?? $_SESSION['Userid']);
$profile = $db->Execute_One($sql);

$Jobowner = $db->Execute("SELECT * FROM companyprofile WHERE User_Id = " . $_SESSION['Userid']);

// If not an admin and profile is not found, show the error message
if (!$isAdmin && !isset($profile['Company_Name'])) {
    echo $_SESSION['Usertype'];
    echo "<h2>Profile Not Updated</h2><br>";
    echo "<a href='$path/User/$_SESSION[Usertype]/Profile.php'>My Profile</a><br><br>";
    echo "<button type='button' class='btn btn-danger' onclick='return window.history.go(-1)''>Back</button>";
} else {
?>

<main>
    <div class="col-xl" style="margin-top: 30px; margin-left: 30px; margin-right: 30px;">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="">Job Details</h3>
            </div>
            <div class="card-body">
                <form id="formAccountSettings" action="<?php echo $path ?>/Function/Submit.php" method="post">
                    <div class="row">
                        <!-- Job Description on the Left -->
                        <div class="col-md-6">
                            <b><h5>Job Description</h5></b><br>
                            <!-- Company Name -->
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Company Name</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                           name="CompanyName" value="<?php echo $profile['Company_Name'] ?? '' ?>" disabled/>
                                </div>
                            </div>
                            <!-- Company URL -->
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-url">Company URL</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-url"
                                           name="CompanyURL" value="<?php echo $profile['Company_URL'] ?? '' ?>" disabled/>
                                </div>
                            </div>
                            <!-- Job Description Fields -->
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Job Profile</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-icon-default-company" class="form-control"
                                           name="Job_Profile" value="<?php echo $job['Job_Profile'] ?? '' ?>" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">CTC</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                           name="CTC" value="<?php echo $job['CTC'] ?? '' ?>" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Job Location</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-icon-default-company" class="form-control"
                                           name="Job_Location" value="<?php echo $job['Job_Location'] ?? '' ?>" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Internship</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-icon-default-company" class="form-control"
                                           name="Internship" value="<?php echo $job['Internship'] ?? '' ?>" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Stipend</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                           name="Stipend" value="<?php echo $job['Stipend'] ?? '' ?>" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Selection Process</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                           name="Selection_Process" value="<?php echo $job['Selection_Process'] ?? '' ?>" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Bond">Bond</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="Bond" class="form-control"
                                           name="Bond" value="<?php echo $job['Bond'] ?? '' ?>" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Term">Terms of Bond</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="Term" class="form-control"
                                           name="Term" value="<?php echo $job['Term'] ?? '' ?>" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Date_Of_Joining">Date of Joining</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="Date_Of_Joining" class="form-control"
                                           name="Date_Of_Joining" value="<?php echo $job['Date_Of_Joining'] ?? '' ?>" />
                                </div>
                            </div>
                        </div>

                        <!-- Contact Details on the Right -->
                        <div class="col-md-6">
                            <b><h5>Contact Details</h5></b><br>
                            <!-- Contact Person -->
                            <div class="mb-3">
                                <label class="form-label" for="contactPerson">Contact Person</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="contactPerson" name="Contact_person"
                                           value="<?php echo $profile['Contact_Information'] ?? '' ?>" disabled/>
                                </div>
                            </div>
                            <!-- Venue -->
                            <div class="mb-3">
                                <label class="form-label" for="venue">Venue</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="venue" name="Venue" value="Will be Declared Soon"
                                           />
                                </div>
                            </div>
                            <!-- Date and Time -->
                            <div class="mb-3">
                                <label class="form-label" for="dateTime">Date and Time</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="dateTime" name="DateTime" value="<?php echo $job['DateTime'] ?? '' ?>"
                                           />
                                </div>
                            </div>
                            <br><br><br><br>
                            <h5>Eligibility Criteria</h5><br>
                            <div class="mb-3">
                                <label class="form-label" for="Batch">Batch</label>
                                <input type="text" class="form-control" id="Batch" name="Batch" value="<?php echo $job['Batch'] ?? '' ?>" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Eligible_Course">Eligible Courses</label>
                                <input type="text" class="form-control" id="Eligible_Course" name="Eligible_Course"
                                       value="<?php echo $job['Eligible_Course'] ?? '' ?>" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="eligibleCourses">Registration</label>
                                <input type="text" class="form-control" id="eligibleCourses" name="Due_Date"
                                       value="<?php echo $job['Due_Date'] ?? '' ?>"/>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <!-- Submit Button -->
                    <?php 
                        if (!isset($job['Id'])) {
                            ?>
                            <input type="hidden" name="submit" value="AddJob">
                            <input type="submit" class="btn btn-success" value="Post Now">
                            <?php
                        } else {
                            ?>
                            <input type="hidden" name="submit" value="AddJob">
                            <input type="hidden" name="Job_Id" value="<?php echo $job['Id'] ?>">
                            <input type="submit" class="btn btn-success" value="Update Job Details">
                            <?php
                        }
                    ?>
                    <button type="button" class="btn btn-danger" onclick="return window.history.go(-1)">Cancel</button>
                    <br><br>
                </form>
            </div>
        </div>
    </div>
</main>

<?php } ?>

    <?php
}

