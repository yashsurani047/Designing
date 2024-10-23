<?php
$path = "../..";
$user = "Company";

require_once "$path/Function/Basic.php";
require_once "$path/Function/Database.php";
startContainer($path, $user);
$basic  = new Basic($path);

$db = new Database();
$profile = $db->Execute("select * from companyprofile where User_Id = " . $_SESSION['Userid']);
$profile2 = $db->Execute("select * from companyprofile2 where User_Id = " . $_SESSION['Userid']);
if ($profile != null) {
  $Company_Name = $profile["Company_Name"];
  $Company_URL = $profile["Company_URL"];
  $Company_Address = $profile["Company_Address"];
  $Contact_Information = $profile["Contact_Information"];
  $Industry_Sector = $profile["Industry_Sector"];
  $Company_Overview = $profile["Company_Overview"];
  $Top_Client = $profile["Top_Client"];
  $Company_Award = $profile["Company_Award"];
  $Language = $profile["Language"];
} else {
  $Company_Name = "";
  $Company_URL = "";
  $Company_Address = "";
  $Contact_Information = "";
  $Industry_Sector = "";
  $Company_Overview = "";
  $Top_Clients = "";
  $Company_Award = "";
  $Language = "";
}
if ($profile2 != null) {
  $Job_Location = $profile2["Job_Location"];
  $Eligibility_Criteria = $profile2["Eligibility_Criteria"];
  $Selection_Process = $profile2["Selection_Process"];
  $HR_Name = $profile2["HR_Name"];
  $HR_Contact = $profile2["HR_Contact"];
} else {
  $Job_Location = "";
  $Eligibility_Criteria = "";
  $Selection_Process = "";
  $HR_Name = "";
  $HR_Contact = "";
}

?>
<datalist id="Venue">
    <option value="Will be Declared Soon">
</datalist>
<datalist id="Date_Of_Joining">
    <option value="Will be Declared Soon">
</datalist>
<datalist id="DateTime">
    <option value="Will be Declared Soon">
</datalist>
<datalist id="Selection_Process">
    <option value="Pre-Placement Talk">
    <option value="Aptitude Test">
    <option value="Technical Round">
    <option value="Group Discussion">
    <option value="HR Round">
</datalist>
<datalist id="Eligible_Course">
    <option value="B. Tech - CE">
    <option value="B. Tech - IT">
    <option value="B. Tech - ME">
    <option value="B. Tech - EE">
    <option value="B. Tech - CV">
    <option value="MCA">
    <option value="BCA">
    <option value="BBA">
    <option value="MBA">
</datalist>



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
                                        name="CompanyName" value="<?php echo $Company_Name ?>" disabled/>
                                </div>
                            </div>
                            <!-- Company URL -->
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-url">Company URL</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-url"
                                        name="CompanyURL" value="<?php echo $Company_URL ?>" disabled/>
                                </div>
                            </div>
                            <!-- Additional Job Description Fields -->
                             
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Job Profile</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-icon-default-company" class="form-control"
                                        name="Job_Profile" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">CTC</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        name="CTC" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Job Location</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-icon-default-company" class="form-control"
                                        name="Job_Location" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Internship</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-icon-default-company" class="form-control"
                                        name="Internship"/>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Stipend</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        name="Stipend"/>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Selection Process</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        name="Selection_Process" list="Selection_Process" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Bond">Bond</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="Bond" class="form-control"
                                        name="Bond"/>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Term">Terms of Bond</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="Term" class="form-control"
                                        name="Term" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Date_Of_Joining">Date of Joining</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="Date_Of_Joining" class="form-control"
                                        name="Date_Of_Joining" list="Date_Of_Joining" />
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
                                        value="<?php echo $Contact_Information ?>" disabled/>
                                </div>
                            </div>
                            <!-- Venue -->
                            <div class="mb-3">
                                <label class="form-label" for="venue">Venue</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="venue" name="Venue" list="Venue"
                                        />
                                </div>
                            </div>
                            <!-- Date and Time -->
                            <div class="mb-3">
                                <label class="form-label" for="dateTime">Date and Time</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="dateTime" name="DateTime" list="DateTime"
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
                                <input type="text" class="form-control" id="Batch" name="Batch" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Eligible_Course">Eligible Courses</label>
                                <input type="text" class="form-control" id="Eligible_Course" name="Eligible_Course"
                                    list="Eligible_Course" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="eligibleCourses">Registration</label>
                                <input type="text" class="form-control" id="eligibleCourses" name="Due_Date"
                                    />
                            </div>
                        </div>

                    </div>

                    <br>
                    <br>
                    <!-- Buttons -->
                        <!-- for College -->
                        <input type="hidden" class="btn btn-success" name="submit" value="AddJob">
                        <input type="submit" class="btn btn-success" value="Post Now">

                        <button type="button" class="btn btn-danger" onclick="return window.history.go(-1)">Cancel</button>
                        <br><br>
                  
                </form>
            </div>
        </div>
    </div>

</main>
<?php endContainer($path); ?>