<?php
$path = "../..";
$user = "Student";

require "$path/functions/basic.php";
startContainer($path, $user);
?>

<body>
  <div class="col-xll-6">

    <div class="nav-align-top mb-4 full-screen-center mt-5 ms-5 me-5">
      <ul class="nav nav-tabs nav-fill mb-5" role="tablist">
        <li class="nav-item m-3">
          <button type="button" class="nav-link active text-primary" role="tab" data-bs-toggle="tab"
            data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
            <i class="bx bxs-user-detail display-6"></i> Basic Information
            <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">3</span>
          </button>
        </li>
        <li class="nav-item  m-3">
          <button type="button" class="nav-link text-primary" role="tab" data-bs-toggle="tab"
            data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false">
            <i class="bx bxs-graduation"></i> Qulifications
          </button>
        </li>
        <li class="nav-item  m-3">
          <button type="button" class="nav-link text-primary" role="tab" data-bs-toggle="tab"
            data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages" aria-selected="false">

            <i class="tf-icons bx bx-link"></i> Connections
          </button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
          <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <div class="card-body">
              <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="<?php echo $path ?>/assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded"
                  height="100" width="100" id="uploadedAvatar" />
                <div class="button-wrapper">
                  <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">Upload new photo</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                  </label>
                  <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                    <i class="bx bx-reset d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Reset</span>
                  </button>

                  <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                </div>
              </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
              <form id="formAccountSettings" method="POST" onsubmit="return validateForm()">
                <div class="row">

                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">First Name</label>
                    <input class="form-control" type="text" id="firstName" name="firstName"
                      placeholder="Enter First Name" autofocus />
                    <span class="error" id="firstNameError"></span>
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="lastName" id="lastName"
                      placeholder="Enter Last Name" />
                    <span class="error" id="lastNameError"></span>
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="fatherName" class="form-label">Father Name</label>
                    <input class="form-control" type="text" name="fatherName" id="fatherName"
                      placeholder="Enter Father Name" />
                    <span class="error" id="fatherNameError"></span>
                  </div>

                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">Parents Number</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">IN (+91)</span>
                      <input type="text" id="parentsPhoneNumber" name="parentsPhoneNumber" class="form-control"
                        placeholder="90********" />
                    </div>
                    <span class="error" id="parentsPhoneNumberError"></span>
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" type="text" id="email" name="email" placeholder="example@gmail.com" />
                    <span class="error" id="emailError"></span>
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="organization" class="form-label">Stream</label>
                    <input type="text" class="form-control" id="organization" name="organization" placeholder="MCA" />
                    <span class="error" id="organizationError"></span>
                  </div>

                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">IN (+91)</span>
                      <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                        placeholder="90********" />
                    </div>
                    <span class="error" id="phoneNumberError"></span>
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
                    <span class="error" id="addressError"></span>
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="state" class="form-label">State</label>
                    <input class="form-control" type="text" id="state" name="state" placeholder="Gujarat" />
                    <span class="error" id="stateError"></span>
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="zipCode" class="form-label">Zip Code</label>
                    <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="360002"
                      maxlength="6" />
                    <span class="error" id="zipCodeError"></span>
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="language" class="form-label">Language</label>
                    <select id="language" class="select2 form-select">
                      <option value="">Select Language</option>
                      <option value="en">English</option>
                      <option value="fr">Gujarati</option>
                      <option value="de">Hindi</option>
                      <option value="pt">Sanskrit</option>
                    </select>
                    <span class="error" id="languageError"></span>
                  </div>

                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2">Save changes</button>
                  <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                </div>
              </form>
            </div>

            <script>
              function validateForm() {
                // Clear previous errors
                document.querySelectorAll('.error').forEach(e => e.innerText = "");

                let valid = true;

                // First Name validation
                let firstName = document.getElementById('firstName').value;
                if (firstName === "") {
                  document.getElementById('firstNameError').innerText = "First Name is required";
                  valid = false;
                }

                // Last Name validation
                let lastName = document.getElementById('lastName').value;
                if (lastName === "") {
                  document.getElementById('lastNameError').innerText = "Last Name is required";
                  valid = false;
                }

                // Father Name validation
                let fatherName = document.getElementById('fatherName').value;
                if (fatherName === "") {
                  document.getElementById('fatherNameError').innerText = "Father Name is required";
                  valid = false;
                }

                // Parents Phone Number validation
                let parentsPhoneNumber = document.getElementById('parentsPhoneNumber').value;
                if (parentsPhoneNumber === "" || parentsPhoneNumber.length !== 10) {
                  document.getElementById('parentsPhoneNumberError').innerText = "Valid Parents Phone Number 10 Digits is required";
                  valid = false;
                }

                // Email validation
                let email = document.getElementById('email').value;
                let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (email === "" || !emailPattern.test(email)) {
                  document.getElementById('emailError').innerText = "Valid Email is required";
                  valid = false;
                }

                // Stream validation
                let organization = document.getElementById('organization').value;
                if (organization === "") {
                  document.getElementById('organizationError').innerText = "Stream is required";
                  valid = false;
                }

                // Phone Number validation
                let phoneNumber = document.getElementById('phoneNumber').value;
                if (phoneNumber === "" || phoneNumber.length !== 10) {
                  document.getElementById('phoneNumberError').innerText = "Valid Phone Number is required Only 10 Digits";
                  valid = false;
                }

                // Address validation
                let address = document.getElementById('address').value;
                if (address === "") {
                  document.getElementById('addressError').innerText = "Address is required";
                  valid = false;
                }

                // State validation
                let state = document.getElementById('state').value;
                if (state === "") {
                  document.getElementById('stateError').innerText = "State is required";
                  valid = false;
                }

                // Zip Code validation
                let zipCode = document.getElementById('zipCode').value;
                if (zipCode === "" || zipCode.length !== 6) {
                  document.getElementById('zipCodeError').innerText = "Valid Zip Code is required";
                  valid = false;
                }

                // Language validation
                let language = document.getElementById('language').value;
                if (language === "") {
                  document.getElementById('languageError').innerText = "Please select a language";
                  valid = false;
                }

                return valid;  // If valid is true, the form will submit
              }
            </script>

            <style>
              .error {
                color: red;
                font-size: 0.875em;
              }
            </style>

            <!-- /Account -->
          </div>
        </div>
        <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
          <div class="card">
            <!-- Notifications -->
            <div class="col-xl">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Qualifications</h5>
                </div>
                <div class="card-body">
                  <form id="qualificationsForm" onsubmit="return validateQualificationsForm()">

                    <!-- 10th Marksheet -->
                    <div class="mb-3 row">
                      <label class="col-sm-2 col-form-label" for="tenthMarks">Upload 10th Marksheet</label>
                      <div class="col-sm-10">
                        <div class="input-group">
                          <input type="text" class="form-control" id="tenthMarks"
                            placeholder="Enter Your Total Marks" />
                          <input value="Upload" class="form-control" id="tenthFile" type="file" />
                          <button class="btn btn-outline-primary" type="button">Upload</button>
                        </div>
                        <span class="error" id="tenthMarksError"></span>
                      </div>
                    </div>

                    <!-- 12th Marksheet -->
                    <div class="mb-3 row">
                      <label class="col-sm-2 col-form-label" for="twelfthMarks">Upload 12th Marksheet</label>
                      <div class="col-sm-10">
                        <div class="input-group">
                          <input type="text" class="form-control" id="twelfthMarks"
                            placeholder="Enter Your Total Marks" />
                          <input value="Upload" class="form-control" id="twelfthFile" type="file" />
                          <button class="btn btn-outline-primary" type="button">Upload</button>
                        </div>
                        <span class="error" id="twelfthMarksError"></span>
                      </div>
                    </div>

                    <!-- Graduation Marksheet -->
                    <div class="mb-3 row">
                      <label class="col-sm-2 col-form-label" for="graduationMarks">Upload Graduation Marksheet</label>
                      <div class="col-sm-10">
                        <div class="input-group">
                          <input type="text" class="form-control" id="graduationMarks"
                            placeholder="Enter Your Graduation Percentage/CGPA" />
                          <input value="Upload" class="form-control" id="graduationFile" type="file" />
                          <button class="btn btn-outline-primary" type="button">Upload</button>
                        </div>
                        <span class="error" id="graduationMarksError"></span>
                      </div>
                    </div>

                    <!-- Post Graduation Marksheet -->
                    <div class="mb-3 row">
                      <label class="col-sm-2 col-form-label" for="postGraduationMarks">Upload Post Graduation
                        Marksheet</label>
                      <div class="col-sm-10">
                        <div class="input-group">
                          <input type="text" class="form-control" id="postGraduationMarks"
                            placeholder="Enter Your Post Graduation Percentage/CGPA" />
                          <input value="Upload" class="form-control" id="postGraduationFile" type="file" />
                          <button class="btn btn-outline-primary" type="button">Upload</button>
                        </div>
                        <span class="error" id="postGraduationMarksError"></span>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Send</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <script>
          function validateQualificationsForm() {
            // Clear previous errors
            document.querySelectorAll('.error').forEach(e => e.innerText = "");

            let valid = true;

            // 10th Marks validation
            let tenthMarks = document.getElementById('tenthMarks').value;
            let tenthFile = document.getElementById('tenthFile').value;
            if (tenthMarks === "" || isNaN(tenthMarks)) {
              document.getElementById('tenthMarksError').innerText = "Valid total marks for 10th is required";
              valid = false;
            }
            if (tenthFile === "") {
              document.getElementById('tenthMarksError').innerText += " | Please upload 10th marksheet";
              valid = false;
            }

            // 12th Marks validation
            let twelfthMarks = document.getElementById('twelfthMarks').value;
            let twelfthFile = document.getElementById('twelfthFile').value;
            if (twelfthMarks === "" || isNaN(twelfthMarks)) {
              document.getElementById('twelfthMarksError').innerText = "Valid total marks for 12th is required";
              valid = false;
            }
            if (twelfthFile === "") {
              document.getElementById('twelfthMarksError').innerText += " | Please upload 12th marksheet";
              valid = false;
            }

            // Graduation Marks validation
            let graduationMarks = document.getElementById('graduationMarks').value;
            let graduationFile = document.getElementById('graduationFile').value;
            if (graduationMarks === "" || isNaN(graduationMarks)) {
              document.getElementById('graduationMarksError').innerText = "Valid Graduation percentage/CGPA is required";
              valid = false;
            }
            if (graduationFile === "") {
              document.getElementById('graduationMarksError').innerText += " | Please upload Graduation marksheet";
              valid = false;
            }

            // Post Graduation Marks validation
            let postGraduationMarks = document.getElementById('postGraduationMarks').value;
            let postGraduationFile = document.getElementById('postGraduationFile').value;
            if (postGraduationMarks === "" || isNaN(postGraduationMarks)) {
              document.getElementById('postGraduationMarksError').innerText = "Valid Post Graduation percentage/CGPA is required";
              valid = false;
            }
            if (postGraduationFile === "") {
              document.getElementById('postGraduationMarksError').innerText += " | Please upload Post Graduation marksheet";
              valid = false;
            }

            return valid;  // Return true if all fields are valid, else false to prevent form submission
          }
        </script>

        <style>
          .error {
            color: red;
            font-size: 0.875em;
          }
        </style>

        <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
          <div class="row">
            <div class="col-md-6 col-12 mb-md-0 mb-4">
              <div class="card">
                <h5 class="card-header">Connected Accounts</h5>
                <div class="card-body">
                  <p>Display content from your connected accounts on your site</p>
                  <!-- Connections -->
                  <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/google.png" alt="google" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">Google</h6>
                        <small class="text-muted">Calendar and contacts</small>
                      </div>
                      <div class="col-3 text-end">
                        <div class="form-check form-switch">
                          <input class="form-check-input float-end" type="checkbox" role="switch" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/slack.png" alt="slack" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">Slack</h6>
                        <small class="text-muted">Communication</small>
                      </div>
                      <div class="col-3 text-end">
                        <div class="form-check form-switch">
                          <input class="form-check-input float-end" type="checkbox" role="switch" checked />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/github.png" alt="github" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">Github</h6>
                        <small class="text-muted">Manage your Git repositories</small>
                      </div>
                      <div class="col-3 text-end">
                        <div class="form-check form-switch">
                          <input class="form-check-input float-end" type="checkbox" role="switch" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/mailchimp.png" alt="mailchimp" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">Mailchimp</h6>
                        <small class="text-muted">Email marketing service</small>
                      </div>
                      <div class="col-3 text-end">
                        <div class="form-check form-switch">
                          <input class="form-check-input float-end" type="checkbox" role="switch" checked />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/asana.png" alt="asana" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">Asana</h6>
                        <small class="text-muted">Communication</small>
                      </div>
                      <div class="col-3 text-end">
                        <div class="form-check form-switch">
                          <input class="form-check-input float-end" type="checkbox" role="switch" checked />
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Connections -->
                </div>
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="card">
                <h5 class="card-header">Social Accounts</h5>
                <div class="card-body">
                  <p>Display content from social accounts on your site</p>
                  <!-- Social Accounts -->
                  <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/facebook.png" alt="facebook" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                        <h6 class="mb-0">Facebook</h6>
                        <small class="text-muted">Not Connected</small>
                      </div>
                      <div class="col-4 col-sm-5 text-end">
                        <button type="button" class="btn btn-icon btn-outline-secondary">
                          <i class="bx bx-link-alt"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/twitter.png" alt="twitter" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                        <h6 class="mb-0">Twitter</h6>
                        <a href="https://twitter.com/Theme_Selection" target="_blank">@ThemeSelection</a>
                      </div>
                      <div class="col-4 col-sm-5 text-end">
                        <button type="button" class="btn btn-icon btn-outline-danger">
                          <i class="bx bx-trash-alt"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/instagram.png" alt="instagram" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                        <h6 class="mb-0">instagram</h6>
                        <a href="https://www.instagram.com/themeselection/" target="_blank">@ThemeSelection</a>
                      </div>
                      <div class="col-4 col-sm-5 text-end">
                        <button type="button" class="btn btn-icon btn-outline-danger">
                          <i class="bx bx-trash-alt"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/dribbble.png" alt="dribbble" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                        <h6 class="mb-0">Dribbble</h6>
                        <small class="text-muted">Not Connected</small>
                      </div>
                      <div class="col-4 col-sm-5 text-end">
                        <button type="button" class="btn btn-icon btn-outline-secondary">
                          <i class="bx bx-link-alt"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/behance.png" alt="behance" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                        <h6 class="mb-0">Behance</h6>
                        <small class="text-muted">Not Connected</small>
                      </div>
                      <div class="col-4 col-sm-5 text-end">
                        <button type="button" class="btn btn-icon btn-outline-secondary">
                          <i class="bx bx-link-alt"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- /Social Accounts -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </>

  <!--  Footer Starts here-->

  <?php endContainer($path); ?>

  <!-- Footer Ends Here -->


</body>