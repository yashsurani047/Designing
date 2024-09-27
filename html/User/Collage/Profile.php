<?php
$path = "../..";
$user = "Company";

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
            <i class="bx bxs-user-detail display-6"></i> College Overview
            <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">3</span>
          </button>
        </li>
        <li class="nav-item  m-3">
          <button type="button" class="nav-link text-primary" role="tab" data-bs-toggle="tab"
            data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false">
            <i class="bx bxs-graduation"></i> Student Details

          </button>
        </li>
        <li class="nav-item  m-3">
          <button type="button" class="nav-link text-primary" role="tab" data-bs-toggle="tab"
            data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages" aria-selected="false">

            <i class="tf-icons bx bx-link"></i> Placement and Contact Information

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
              <form id="formAccountSettings" method="POST" onsubmit="return validateForm();">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="collegeName" class="form-label">College Name</label>
                    <input class="form-control" type="text" id="collegeName" name="collegeName"
                      placeholder="College Name" autofocus />
                    <small class="text-danger" id="collegeNameError"></small>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="collegeAddress" class="form-label">College Address</label>
                    <input class="form-control" type="text" id="collegeAddress" name="collegeAddress"
                      placeholder="College Address" />
                    <small class="text-danger" id="collegeAddressError"></small>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="contactInfo" class="form-label">Contact Information</label>
                    <input class="form-control" type="text" id="contactInfo" name="contactInfo"
                      placeholder="Enter Contact Information" />
                    <small class="text-danger" id="contactInfoError"></small>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="affiliation">Affiliation and Accreditation</label>
                    <input type="text" id="affiliation" name="affiliation" class="form-control"
                      placeholder="Affiliation and Accreditation" />
                    <small class="text-danger" id="affiliationError"></small>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="branches" class="form-label">Available Branches and Courses Offered</label>
                    <input class="form-control" type="text" id="branches" name="branches"
                      placeholder="Available Branches and Courses Offered" />
                    <small class="text-danger" id="branchesError"></small>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="collegeOverview" class="form-label">College Overview</label>
                    <input type="text" class="form-control" id="collegeOverview" name="collegeOverview"
                      placeholder="College Overview" />
                    <small class="text-danger" id="collegeOverviewError"></small>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="language" class="form-label">Language</label>
                    <select id="language" class="select2 form-select">
                      <option value="">Select Language</option>
                      <option value="en">English</option>
                      <option value="gu">Gujarati</option>
                      <option value="hi">Hindi</option>
                      <option value="sn">Sanskrit</option>
                    </select>
                    <small class="text-danger" id="languageError"></small>
                  </div>
                </div>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-secondary">Edit</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>

            <script>
              function validateForm() {
                // Clear all previous error messages
                document.querySelectorAll('small.text-danger').forEach(function (el) {
                  el.innerText = '';
                });

                let isValid = true;

                // Fields to validate
                const fields = [
                  { id: 'collegeName', errorId: 'collegeNameError', message: 'College Name is required' },
                  { id: 'collegeAddress', errorId: 'collegeAddressError', message: 'College Address is required' },
                  { id: 'contactInfo', errorId: 'contactInfoError', message: 'Contact Information is required' },
                  { id: 'affiliation', errorId: 'affiliationError', message: 'Affiliation and Accreditation is required' },
                  { id: 'branches', errorId: 'branchesError', message: 'Available Branches and Courses Offered is required' },
                  { id: 'collegeOverview', errorId: 'collegeOverviewError', message: 'College Overview is required' },
                  { id: 'language', errorId: 'languageError', message: 'Language is required' }
                ];

                fields.forEach(function (field) {
                  const input = document.getElementById(field.id);
                  if (input.value.trim() === '' || (field.id === 'language' && input.value === '')) {
                    document.getElementById(field.errorId).innerText = field.message;
                    input.classList.add('is-invalid');
                    isValid = false;
                  } else {
                    input.classList.remove('is-invalid');
                  }
                });

                return isValid; // If invalid, prevent form submission
              }
            </script>

            <style>
              /* Red border for invalid inputs */
              .is-invalid {
                border-color: red !important;
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
                <form onsubmit="return validateStudentDetailsForm();">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Student Details</h5>
                    <small class="text-muted float-end"></small>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="totalStudents">Total Students</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="totalStudents" placeholder="" />
                        <small class="text-danger" id="totalStudentsError"></small>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="branchWiseDetails">Branch-wise Student Details</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="branchWiseDetails" placeholder="" />
                        <small class="text-danger" id="branchWiseDetailsError"></small>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="placementStatistics">Placement Statistics</label>
                      <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                          <input type="text" id="placementStatistics" class="form-control" placeholder="" />
                          <small class="text-danger" id="placementStatisticsError"></small>
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-end">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-secondary">Edit</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <script>
          function validateStudentDetailsForm() {
            // Clear previous error messages
            document.querySelectorAll('small.text-danger').forEach(function (el) {
              el.innerText = '';
            });

            let isValid = true;

            // Fields to validate
            const fields = [
              { id: 'totalStudents', errorId: 'totalStudentsError', message: 'Total Students is required' },
              { id: 'branchWiseDetails', errorId: 'branchWiseDetailsError', message: 'Branch-wise Student Details are required' },
              { id: 'placementStatistics', errorId: 'placementStatisticsError', message: 'Placement Statistics is required' }
            ];

            fields.forEach(function (field) {
              const input = document.getElementById(field.id);
              if (input.value.trim() === '') {
                document.getElementById(field.errorId).innerText = field.message;
                input.classList.add('is-invalid');
                isValid = false;
              } else {
                input.classList.remove('is-invalid');
              }
            });

            return isValid; // If invalid, prevent form submission
          }
        </script>

        <style>
          /* Red border for invalid inputs */
          .is-invalid {
            border-color: red !important;
          }
        </style>

        <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
          <div class="card">
            <!-- Notifications -->
            <div class="col-xl">
              <div class="card mb-4">
                <form onsubmit="return validatePlacementForm();">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Placement and Contact Information</h5>
                    <small class="text-muted float-end"></small>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="placementContact">Placement Contact Person</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="placementContact" placeholder="" />
                        <small class="text-danger" id="placementContactError"></small>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="industryPartnerships">Collaborations and Industry
                        Partnerships</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="industryPartnerships" placeholder="" />
                        <small class="text-danger" id="industryPartnershipsError"></small>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="alumniNetwork">Alumni Network</label>
                      <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                          <input type="text" id="alumniNetwork" class="form-control" placeholder="" />
                          <small class="text-danger" id="alumniNetworkError"></small>
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-end">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-secondary">Edit</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <script>
          function validatePlacementForm() {
            // Clear previous error messages
            document.querySelectorAll('small.text-danger').forEach(function (el) {
              el.innerText = '';
            });

            let isValid = true;

            // Fields to validate
            const fields = [
              { id: 'placementContact', errorId: 'placementContactError', message: 'Placement Contact Person is required' },
              { id: 'industryPartnerships', errorId: 'industryPartnershipsError', message: 'Collaborations and Industry Partnerships are required' },
              { id: 'alumniNetwork', errorId: 'alumniNetworkError', message: 'Alumni Network is required' }
            ];

            fields.forEach(function (field) {
              const input = document.getElementById(field.id);
              if (input.value.trim() === '') {
                document.getElementById(field.errorId).innerText = field.message;
                input.classList.add('is-invalid');
                isValid = false;
              } else {
                input.classList.remove('is-invalid');
              }
            });

            return isValid; // If invalid, prevent form submission
          }
        </script>

        <style>
          /* Red border for invalid inputs */
          .is-invalid {
            border-color: red !important;
          }
        </style>

      </div>
    </div>
  </div>
  </>

  <!--  Footer Starts here-->

  <?php endContainer($path); ?>

  <!-- Footer Ends Here -->


</body>