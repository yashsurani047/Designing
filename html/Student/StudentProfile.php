<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets"
  data-template="vertical-menu-template-free"
>
<head>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->


    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  
    <script src="assets/js/config.js"></script>


          
</head>


<body>

 <!--  Header Starts here-->
  <?php include "./StudHeader.php";?>
    <!-- Header Ends Here -->

<div class="col-xll-6"  >

    <div class="nav-align-top mb-4 full-screen-center mt-5 ms-5 me-5">
      <ul class="nav nav-tabs nav-fill mb-5" role="tablist">
        <li class="nav-item m-3">
          <button type="button" class="nav-link active text-primary" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home"
            aria-controls="navs-justified-home"
            aria-selected="true"
            
          >
            <i class="bx bxs-user-detail display-6"></i> Basic Information
            <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">3</span>
          </button>
        </li>
        <li class="nav-item  m-3">
          <button
            type="button"
            class="nav-link text-primary"
            role="tab"
            data-bs-toggle="tab"
            data-bs-target="#navs-justified-profile"
            aria-controls="navs-justified-profile"
            aria-selected="false"
          >
            <i class="bx bxs-graduation"></i> Qulifications
          </button>
        </li>
        <li class="nav-item  m-3">
          <button  type="button"  class="nav-link text-primary"  role="tab"  data-bs-toggle="tab"  data-bs-target="#navs-justified-messages"
            aria-controls="navs-justified-messages"
            aria-selected="false">
            
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
                    <img
                      src="assets/img/avatars/1.png"
                      alt="user-avatar"
                      class="d-block rounded"
                      height="100"
                      width="100"
                      id="uploadedAvatar"
                    />
                    <div class="button-wrapper">
                      <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">Upload new photo</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input
                          type="file"
                          id="upload"
                          class="account-file-input"
                          hidden
                          accept="image/png, image/jpeg"
                        />
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
                  <form id="formAccountSettings" method="POST" onsubmit="return false">
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">First Name</label>
                        <input
                          class="form-control"
                          type="text"
                          id="firstName"
                          name="firstName"
                          value="John"
                          autofocus
                        />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input class="form-control" type="text" name="lastName" id="lastName" value="Doe" />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input
                          class="form-control"
                          type="text"
                          id="email"
                          name="email"
                          value="john.doe@example.com"
                          placeholder="john.doe@example.com"
                        />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="organization" class="form-label">Organization</label>
                        <input
                          type="text"
                          class="form-control"
                          id="organization"
                          name="organization"
                          value="ThemeSelection"
                        />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                        <div class="input-group input-group-merge">
                          <span class="input-group-text">US (+1)</span>
                          <input
                            type="text"
                            id="phoneNumber"
                            name="phoneNumber"
                            class="form-control"
                            placeholder="202 555 0111"
                          />
                        </div>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="state" class="form-label">State</label>
                        <input class="form-control" type="text" id="state" name="state" placeholder="California" />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="zipCode" class="form-label">Zip Code</label>
                        <input
                          type="text"
                          class="form-control"
                          id="zipCode"
                          name="zipCode"
                          placeholder="231465"
                          maxlength="6"
                        />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label" for="country">Country</label>
                        <select id="country" class="select2 form-select">
                          <option value="">Select</option>
                          <option value="Australia">Australia</option>
                          <option value="Bangladesh">Bangladesh</option>
                          <option value="Belarus">Belarus</option>
                          <option value="Brazil">Brazil</option>
                          <option value="Canada">Canada</option>
                          <option value="China">China</option>
                          <option value="France">France</option>
                          <option value="Germany">Germany</option>
                          <option value="India">India</option>
                          <option value="Indonesia">Indonesia</option>
                          <option value="Israel">Israel</option>
                          <option value="Italy">Italy</option>
                          <option value="Japan">Japan</option>
                          <option value="Korea">Korea, Republic of</option>
                          <option value="Mexico">Mexico</option>
                          <option value="Philippines">Philippines</option>
                          <option value="Russia">Russian Federation</option>
                          <option value="South Africa">South Africa</option>
                          <option value="Thailand">Thailand</option>
                          <option value="Turkey">Turkey</option>
                          <option value="Ukraine">Ukraine</option>
                          <option value="United Arab Emirates">United Arab Emirates</option>
                          <option value="United Kingdom">United Kingdom</option>
                          <option value="United States">United States</option>
                        </select>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="language" class="form-label">Language</label>
                        <select id="language" class="select2 form-select">
                          <option value="">Select Language</option>
                          <option value="en">English</option>
                          <option value="fr">French</option>
                          <option value="de">German</option>
                          <option value="pt">Portuguese</option>
                        </select>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="timeZones" class="form-label">Timezone</label>
                        <select id="timeZones" class="select2 form-select">
                          <option value="">Select Timezone</option>
                          <option value="-12">(GMT-12:00) International Date Line West</option>
                          <option value="-11">(GMT-11:00) Midway Island, Samoa</option>
                          <option value="-10">(GMT-10:00) Hawaii</option>
                          <option value="-9">(GMT-09:00) Alaska</option>
                          <option value="-8">(GMT-08:00) Pacific Time (US & Canada)</option>
                          <option value="-8">(GMT-08:00) Tijuana, Baja California</option>
                          <option value="-7">(GMT-07:00) Arizona</option>
                          <option value="-7">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                          <option value="-7">(GMT-07:00) Mountain Time (US & Canada)</option>
                          <option value="-6">(GMT-06:00) Central America</option>
                          <option value="-6">(GMT-06:00) Central Time (US & Canada)</option>
                          <option value="-6">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                          <option value="-6">(GMT-06:00) Saskatchewan</option>
                          <option value="-5">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                          <option value="-5">(GMT-05:00) Eastern Time (US & Canada)</option>
                          <option value="-5">(GMT-05:00) Indiana (East)</option>
                          <option value="-4">(GMT-04:00) Atlantic Time (Canada)</option>
                          <option value="-4">(GMT-04:00) Caracas, La Paz</option>
                        </select>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="currency" class="form-label">Currency</label>
                        <select id="currency" class="select2 form-select">
                          <option value="">Select Currency</option>
                          <option value="usd">USD</option>
                          <option value="euro">Euro</option>
                          <option value="pound">Pound</option>
                          <option value="bitcoin">Bitcoin</option>
                        </select>
                      </div>
                    </div>
                    <div class="mt-2">
                      <button type="submit" class="btn btn-primary me-2">Save changes</button>
                      <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    </div>
                  </form>
                </div>
                <!-- /Account -->
              </div>
             </div>
        <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
            <div class="card">
                <!-- Notifications -->
                <h5 class="card-header">Recent Devices</h5>
                <div class="card-body">
                  <span
                    >We need permission from your browser to show notifications.
                    <span class="notificationRequest"><strong>Request Permission</strong></span></span
                  >
                  <div class="error"></div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped table-borderless border-bottom">
                    <thead>
                      <tr>
                        <th class="text-nowrap">Type</th>
                        <th class="text-nowrap text-center">✉️ Email</th>
                        <th class="text-nowrap text-center">🖥 Browser</th>
                        <th class="text-nowrap text-center">👩🏻‍💻 App</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-nowrap">New for you</td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck1" checked />
                          </div>
                        </td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck2" checked />
                          </div>
                        </td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck3" checked />
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-nowrap">Account activity</td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck4" checked />
                          </div>
                        </td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck5" checked />
                          </div>
                        </td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck6" checked />
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-nowrap">A new browser used to sign in</td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck7" checked />
                          </div>
                        </td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck8" checked />
                          </div>
                        </td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck9" />
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-nowrap">A new device is linked</td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck10" checked />
                          </div>
                        </td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck11" />
                          </div>
                        </td>
                        <td>
                          <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck12" />
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-body">
                  <h6>When should we send you notifications?</h6>
                  <form action="javascript:void(0);">
                    <div class="row">
                      <div class="col-sm-6">
                        <select id="sendNotification" class="form-select" name="sendNotification">
                          <option selected>Only when I'm online</option>
                          <option>Anytime</option>
                        </select>
                      </div>
                      <div class="mt-4">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        <button type="reset" class="btn btn-outline-secondary">Discard</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /Notifications -->
              </div>
        </div>
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
                          <img src="assets/img/icons/brands/google.png" alt="google" class="me-3" height="30" />
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
                          <img src="assets/img/icons/brands/slack.png" alt="slack" class="me-3" height="30" />
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
                          <img src="assets/img/icons/brands/github.png" alt="github" class="me-3" height="30" />
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
                          <img
                            src="assets/img/icons/brands/mailchimp.png"
                            alt="mailchimp"
                            class="me-3"
                            height="30"
                          />
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
                          <img src="assets/img/icons/brands/asana.png" alt="asana" class="me-3" height="30" />
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
                          <img
                            src="assets/img/icons/brands/facebook.png"
                            alt="facebook"
                            class="me-3"
                            height="30"
                          />
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
                          <img
                            src="assets/img/icons/brands/twitter.png"
                            alt="twitter"
                            class="me-3"
                            height="30"
                          />
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
                          <img
                            src="assets/img/icons/brands/instagram.png"
                            alt="instagram"
                            class="me-3"
                            height="30"
                          />
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
                          <img
                            src="assets/img/icons/brands/dribbble.png"
                            alt="dribbble"
                            class="me-3"
                            height="30"
                          />
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
                          <img
                            src="assets/img/icons/brands/behance.png"
                            alt="behance"
                            class="me-3"
                            height="30"
                          />
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
</div>

 <!--  Footer Starts here-->

 <?php include "./StudFooter.php";?>

<!-- Footer Ends Here -->


</body>
 