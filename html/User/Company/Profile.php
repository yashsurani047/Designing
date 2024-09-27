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
            <i class="bx bxs-user-detail display-6"></i> Company Overview
            <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">3</span>
          </button>
        </li>
        <li class="nav-item  m-3">
          <button type="button" class="nav-link text-primary" role="tab" data-bs-toggle="tab"
            data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false">
            <i class="bx bxs-graduation"></i> Job and Placement Details

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
        <label for="firstName" class="form-label">Company Name</label>
        <input class="form-control" type="text" id="firstName" name="companyName" placeholder="Company Name" autofocus />
        <small class="text-danger" id="firstNameError"></small>
      </div>

      <div class="mb-3 col-md-6">
        <label for="lastName" class="form-label">Company Address</label>
        <input class="form-control" type="text" id="lastName" name="companyAddress" placeholder="Company Address" />
        <small class="text-danger" id="lastNameError"></small>
      </div>

      <div class="mb-3 col-md-6">
        <label for="contactInfo" class="form-label">Contact Information</label>
        <input class="form-control" type="text" id="contactInfo" name="contactInfo" placeholder="Enter Contact Information" />
        <small class="text-danger" id="contactInfoError"></small>
      </div>

      <div class="mb-3 col-md-6">
        <label class="form-label" for="industrySector">Industry Sector</label>
        <input type="text" id="industrySector" name="industrySector" class="form-control" placeholder="Industry Sector" />
        <small class="text-danger" id="industrySectorError"></small>
      </div>

      <div class="mb-3 col-md-6">
        <label for="companyOverview" class="form-label">Company Overview</label>
        <input class="form-control" type="text" id="companyOverview" name="companyOverview" placeholder="Company Overview" />
        <small class="text-danger" id="companyOverviewError"></small>
      </div>

      <div class="mb-3 col-md-6">
        <label for="clients" class="form-label">Top Clients or Partners</label>
        <input type="text" class="form-control" id="clients" name="clients" placeholder="Top Clients or Partners" />
        <small class="text-danger" id="clientsError"></small>
      </div>

      <div class="mb-3 col-md-6">
        <label for="achievements" class="form-label">Company Achievements and Awards</label>
        <input type="text" id="achievements" name="achievements" class="form-control" placeholder="Company Achievements and Awards" />
        <small class="text-danger" id="achievementsError"></small>
      </div>

      <div class="mb-3 col-md-6">
        <label for="language" class="form-label">Language</label>
        <select id="language" name="language" class="select2 form-select">
          <option value="">Select Language</option>
          <option value="en">English</option>
          <option value="gu">Gujarati</option>
          <option value="hi">Hindi</option>
          <option value="sa">Sanskrit</option>
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
    // Clear previous error messages
    document.querySelectorAll('small.text-danger').forEach((small) => {
      small.innerHTML = '';
    });

    let isValid = true;

    const fields = [
      { id: 'firstName', errorId: 'firstNameError', message: 'Company Name is required' },
      { id: 'lastName', errorId: 'lastNameError', message: 'Company Address is required' },
      { id: 'contactInfo', errorId: 'contactInfoError', message: 'Contact Information is required and must be valid', pattern: /^\d{10}$/ },
      { id: 'industrySector', errorId: 'industrySectorError', message: 'Industry Sector is required' },
      { id: 'companyOverview', errorId: 'companyOverviewError', message: 'Company Overview is required' },
      { id: 'clients', errorId: 'clientsError', message: 'Top Clients or Partners is required' },
      { id: 'achievements', errorId: 'achievementsError', message: 'Company Achievements and Awards is required' },
      { id: 'language', errorId: 'languageError', message: 'Language selection is required' }
    ];

    fields.forEach(field => {
      const input = document.getElementById(field.id);
      if (input) {
        if (input.value.trim() === '' || (field.pattern && !field.pattern.test(input.value))) {
          isValid = false;
          input.classList.add('is-invalid');
          document.getElementById(field.errorId).innerText = field.message;
        } else {
          input.classList.remove('is-invalid');
        }
      }
    });

    return isValid; // Prevent form submission if there are validation errors
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
        <form id="jobPlacementForm" onsubmit="return validateJobForm();">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Job and Placement Details</h5>
            <small class="text-muted float-end"></small>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="role">Available Roles for Placement</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="role" placeholder="" />
                <small class="text-danger" id="roleError"></small>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="location">Job Location</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="location" placeholder="" />
                <small class="text-danger" id="locationError"></small>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="eligibility">Eligibility Criteria</label>
              <div class="col-sm-5">
                <input type="text" id="eligibility" class="form-control" placeholder="" />
                <small class="text-danger" id="eligibilityError"></small>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="process">Recruitment Process</label>
              <div class="col-sm-5">
                <input type="text" id="process" class="form-control" placeholder="" />
                <small class="text-danger" id="processError"></small>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="compensation">Compensation Details</label>
              <div class="col-sm-5">
                <textarea id="compensation" class="form-control" placeholder=""></textarea>
                <small class="text-danger" id="compensationError"></small>
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
  function validateJobForm() {
    // Clear previous error messages
    document.querySelectorAll('small.text-danger').forEach(small => {
      small.innerText = '';
    });

    let isValid = true;

    // Validate each field
    const fields = [
      { id: 'role', errorId: 'roleError', message: 'Available Roles is required' },
      { id: 'location', errorId: 'locationError', message: 'Job Location is required' },
      { id: 'eligibility', errorId: 'eligibilityError', message: 'Eligibility Criteria is required' },
      { id: 'process', errorId: 'processError', message: 'Recruitment Process is required' },
      { id: 'compensation', errorId: 'compensationError', message: 'Compensation Details is required' }
    ];

    fields.forEach(field => {
      const input = document.getElementById(field.id);
      if (input && input.value.trim() === '') {
        isValid = false;
        document.getElementById(field.errorId).innerText = field.message;
        input.classList.add('is-invalid');
      } else {
        input.classList.remove('is-invalid');
      }
    });

    return isValid; // Prevent form submission if invalid
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
        <form id="placementContactForm" onsubmit="return validatePlacementForm();">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Placement and Contact Information</h5>
            <small class="text-muted float-end"></small>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="internship">Internship Opportunities</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="internship" placeholder="" />
                <small class="text-danger" id="internshipError"></small>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="representative">Company Representative for Placement</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="representative" placeholder="" />
                <small class="text-danger" id="representativeError"></small>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="testimonials">Employee Testimonials or Success Stories</label>
              <div class="col-sm-5">
                <div class="input-group input-group-merge">
                  <input type="text" id="testimonials" class="form-control" placeholder="" aria-label="john.doe"
                    aria-describedby="basic-default-email2" />
                </div>
                <small class="text-danger" id="testimonialsError"></small>
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
    document.querySelectorAll('small.text-danger').forEach(small => {
      small.innerText = '';
    });

    let isValid = true;

    // Validate each field
    const fields = [
      { id: 'internship', errorId: 'internshipError', message: 'Internship Opportunities is required' },
      { id: 'representative', errorId: 'representativeError', message: 'Company Representative for Placement is required' },
      { id: 'testimonials', errorId: 'testimonialsError', message: 'Employee Testimonials or Success Stories is required' }
    ];

    fields.forEach(field => {
      const input = document.getElementById(field.id);
      if (input && input.value.trim() === '') {
        isValid = false;
        document.getElementById(field.errorId).innerText = field.message;
        input.classList.add('is-invalid');
      } else {
        input.classList.remove('is-invalid');
      }
    });

    return isValid; // Prevent form submission if invalid
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