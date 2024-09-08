<head>
    <?php
    $path = "../..";
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
                <h3 class="">Job Details</h3>
                <small class="text-muted float-end"></small>
            </div>
            <div class="card-body">
                <form id="formAccountSettings">
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
                                        value="Riwzon Pvt.Ltd" disabled />
                                </div>
                            </div>
                            <!-- Company URL -->
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-url">Company URL</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-url"
                                        value="https://career.riwzon.com" disabled />
                                </div>
                            </div>
                            <!-- Additional Job Description Fields -->
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Selection Process</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        value="Offline-4(round)" disabled />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">CTC</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        value="17Lpa" disabled />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Stipend</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        value="45 Thousand" disabled />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Internship</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-icon-default-company" class="form-control"
                                        value="Online/Offline" disabled />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Bond</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-icon-default-company" class="form-control"
                                        value="3 Year" disabled />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Job Profile</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-icon-default-company" class="form-control"
                                        value="Marketing Agent" disabled />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Date of Joining</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-icon-default-company" class="form-control"
                                        value="Will be Declared Soon" disabled />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-email">Email</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-icon-default-email" class="form-control"
                                        value="contact@riwzon.com" disabled />
                                    <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
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
                                    <input type="text" class="form-control" id="contactPerson"
                                        value="Prof. Pratik Desai – pratikdesai@rku.ac.in (M: 9876543210)" disabled />
                                </div>
                            </div>
                            <!-- Venue -->
                            <div class="mb-3">
                                <label class="form-label" for="venue">Venue</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="venue" value="Will be Declared Soon"
                                        disabled />
                                </div>
                            </div>
                            <!-- Date and Time -->
                            <div class="mb-3">
                                <label class="form-label" for="dateTime">Date and Time</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="dateTime" value="Will be Declared Soon"
                                        disabled />
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <h5>Eligibility Criteria</h5>
                            <br>
                            <div class="mb-3">
                                <label class="form-label" for="batch">Batch</label>
                                <input type="text" class="form-control" id="batch" value="2024-25" disabled />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="eligibleCourses">Eligible Courses</label>
                                <input type="text" class="form-control" id="eligibleCourses"
                                    value="B.Tech – EE, ME, CE/IT, CV, MBA/BBA & MCA/BCA" disabled />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="eligibleCourses">Registration</label>
                                <input type="text" class="form-control" id="eligibleCourses"
                                    value="Latest by : 12/08/2024 (Mon,Tues,Wednes,Thurs,Fri Saturday) Time – 10:00 AM"
                                    disabled />
                            </div>
                        </div>

                    </div>

                    <br>
                    <br>
                    <center> <!-- Buttons -->
                        <button type="button" class="btn btn-primary">Next</button>
                        <button type="button" class="btn btn-success">Approve</button>
                        <button type="button" class="btn btn-danger">Deny</button>
                        <button type="button" class="btn btn-warning">Update</button>
                        <button type="button" class="btn btn-secondary">Cancel</button>
                        <button type="button" class="btn btn-danger">Close Job Drive</button>
                    </center>

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