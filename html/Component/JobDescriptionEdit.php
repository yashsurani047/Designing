<?php
$path = "../..";

require_once "$path/Function/Basic.php";
require_once "$path/Function/Database.php";
$basic  = new Basic($path);

$db = new Database();
$profile = $db->Execute("select * from companyprofile where User_Id = " . $_SESSION['Userid']);

$sql = "select * from Jobs where Id = ".$_GET['Job_Id'];
$job = $db->Execute($sql);
$Jobowner = $db->Execute("select * from companyprofile where User_Id = ".$job['User_Id']);

$Is_Edit = $_SESSION['Userid'] == $job['User_Id'];
echo $_SESSION['Userid']." AND  Job_Id = ".$_GET['Job_Id'];
if($_GET['Job_Id'] != null){
       
}
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
                                        name="Job_Profile" value="Marketing Agent" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">CTC</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        name="CTC" value="17Lpa" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Job Location</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-icon-default-company" class="form-control"
                                        name="Job_Location" value="Marketing Agent" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Internship</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-icon-default-company" class="form-control"
                                        name="Internship" value="Online/Offline" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Stipend</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        name="Stipend" value="45 Thousand" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Selection Process</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        name="Selection_Process" value="Offline-4(round)" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Bond">Bond</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="Bond" class="form-control"
                                        name="Bond" value="3 Year" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Term">Terms of Bond</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="Term" class="form-control"
                                        name="Term" value="2 Salary as Cheque" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Date_Of_Joining">Date of Joining</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="Date_Of_Joining" class="form-control"
                                        name="Date_Of_Joining" value="Will be Declared Soon" />
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
                                    <input type="text" class="form-control" id="dateTime" name="DateTime" value="Will be Declared Soon"
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
                                <input type="text" class="form-control" id="Batch" name="Batch" value="2024-25" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Eligible_Course">Eligible Courses</label>
                                <input type="text" class="form-control" id="Eligible_Course" name="Eligible_Course"
                                    value="B.Tech – EE, ME, CE/IT, CV, MBA/BBA & MCA/BCA" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="eligibleCourses">Registration</label>
                                <input type="text" class="form-control" id="eligibleCourses" name="Due_Date"
                                    value="Latest by : 12/08/2024 (Mon,Tues,Wednes,Thurs,Fri Saturday) Time – 10:00 AM"
                                    />
                            </div>
                        </div>

                    </div>

                    <br>
                    <br>
                     <!-- for College -->
                     <button class="btn btn-success">Save Changes</button>
                        <button class="btn btn-danger" onclick="showNormal()">Cancel</button>
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