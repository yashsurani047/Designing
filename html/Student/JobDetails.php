<head>
<?php
$path = "../";
$user = "Student";

require "$path/functions/basic.php";
startContainer($path, $user);
?>
    <title>Company Basic Details</title>

</head>
<body>
    <!-- Main Content Starts Here -->
    <div class="col-xl" style="margin-top: 30px; margin-left: 30px; margin-right: 30px;">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
             ` <h3 class="">Company Basic Details</h3>
                <small class="text-muted float-end"></small>
            </div>
            <div class="card-body">

                <form>
                   <b><h5>Job Description</h5></b> <br>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Company Name</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class=""></i>
                            </span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname" value="Riwzon Pvt.Ltd"
                                   placeholder="" aria-label=""
                                   aria-describedby="basic-icon-default-fullname2" disabled/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Company URL</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class=""></i>
                            </span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                   placeholder="" aria-label=""
                                   aria-describedby="basic-icon-default-fullname2" value="https://career.riwzon.com" disabled/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Selection Process</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class=""></i>
                            </span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                   placeholder="" aria-label=""
                                   aria-describedby="basic-icon-default-fullname2" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">CTC</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class=""></i>
                            </span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                   placeholder="" aria-label=""
                                   aria-describedby="basic-icon-default-fullname2" value="17Lpa" disabled />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Stipend</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class=""></i>
                            </span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                   placeholder="" aria-label=""
                                   aria-describedby="basic-icon-default-fullname2" value="45 Thousand" disabled/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Internship</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text">
                                <i class=""></i>
                            </span>
                            <input type="text" id="basic-icon-default-company" class="form-control"
                                   placeholder="" aria-label=""
                                   aria-describedby="basic-icon-default-company2" value="Online/Offline"  disabled/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Bond</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text">
                                <i class=""></i>
                            </span>
                            <input type="text" id="basic-icon-default-company" class="form-control"
                                   placeholder="" aria-label=""
                                   aria-describedby="basic-icon-default-company2" value="3 Year" disabled/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Job Profile</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text">
                                <i class=""></i>
                            </span>
                            <input type="text" id="basic-icon-default-company" class="form-control"
                                   placeholder="" aria-label=""
                                   aria-describedby="basic-icon-default-company2" value="Marketing Agent" disabled/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Date of Joining</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text">
                                <i class=""></i>
                            </span>
                            <input type="text" id="basic-icon-default-company" class="form-control"
                                   placeholder="" aria-label=""
                                   aria-describedby="basic-icon-default-company2" value="Will be Declared Soon" disabled/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-email">Email</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class=""></i></span>
                            <input type="text" id="basic-icon-default-email" class="form-control"
                                   placeholder="" aria-label="john.doe"
                                   aria-describedby="basic-icon-default-email2" value="contact@riwzon.com" disabled/>
                            <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                        </div>
                    </div>
                    <br>
                    <b><h5>Eligibility Criteria</h5></b> 
                    <br>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Batch </label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class=""></i>
                            </span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                   placeholder="" aria-label=""
                                   aria-describedby="basic-icon-default-fullname2" value="2024-25" disabled/>
                         </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Eligible Courses</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class=""></i>
                            </span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                   placeholder="" aria-label=""
                                   aria-describedby="basic-icon-default-fullname2" value="B.Tech – EE, ME, CE/IT, CV, MBA/BBA & MCA/BCA" disabled/>
                         </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Registration</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class=""></i>
                            </span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                   placeholder="" aria-label=""
                                   aria-describedby="basic-icon-default-fullname2" value="Latest by : 12/08/2024 (Mon,Tues,Wednes,Thurs,Fri Saturday) Time – 10:00 AM" disabled/>
                         </div>
                    </div>
                    
                    <br>
                    <b><h5>Contact Details</h5></b> 
                    <br>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Contact Person</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class=""></i>
                            </span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                   placeholder="" aria-label=""
                                   aria-describedby="basic-icon-default-fullname2" value="Prof.pratikdesai –  pratikdesai@rku.ac.in  (M:9876543210)" disabled/>
                         </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Venue</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class=""></i>
                            </span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                   placeholder="" aria-label=""
                                   aria-describedby="basic-icon-default-fullname2" value="Will be Declared Soon" disabled/>
                         </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Date and time</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class=""></i>
                            </span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                   placeholder="" aria-label=""
                                   aria-describedby="basic-icon-default-fullname2"  value="Will be Declared Soon" disabled/>
                         </div>
                    </div>
                   
                   
                    <!-- <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-message">Message</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text">
                                <i class="bx bx-comment"></i>
                            </span>
                            <textarea id="basic-icon-default-message" class="form-control"
                                      placeholder="Hi, Do you have a moment to talk Joe?"
                                      aria-label="Hi, Do you have a moment to talk Joe?"
                                      aria-describedby="basic-icon-default-message2"></textarea>
                        </div>
                    </div> -->
                    <!-- pop up model starts-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                        Next
                    </button>
                    <!-- pop up model ends -->
                    <?php include "./TnC.php"; ?>
                </form>
            </div>
        </div>
    </div>
    <!-- Main Content Ends Here -->

    <!-- Footer Portion Starts -->
    <?php endContainer($path); ?>
    <!-- Footer Portion Ends -->
</body>
</html>
