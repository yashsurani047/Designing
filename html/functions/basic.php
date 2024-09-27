<?php

function headTag($path)
{
  echo "
    <head>
    <!-- Favicon -->
    <link rel='icon' type='image/x-icon' href='$path/assets/img/favicon/favicon.ico' />

    <!-- Fonts -->
    <link rel='preconnect' href='https://fonts.googleapis.com' />
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin />
    <link
      href='https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap'
      rel='stylesheet'
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel='stylesheet' href='$path/assets/vendor/fonts/boxicons.css' />

    <!-- Core CSS -->
    <link rel='stylesheet' href='$path/assets/vendor/css/core.css' class='template-customizer-core-css' />
    <link rel='stylesheet' href='$path/assets/vendor/css/theme-default.css' class='template-customizer-theme-css' />
    <link rel='stylesheet' href='$path/assets/css/demo.css' />

    <!-- Vendors CSS -->
    <link rel='stylesheet' href='$path/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css' />

   
     <!-- Page CSS -->
     <!-- Page -->
     <link rel='stylesheet' href='$path/assets/vendor/css/pages/page-auth.css' />


    <!-- Helpers -->
    <script src='$path/assets/vendor/js/helpers.js'></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  
    <script src='$path/assets/js/config.js'></script>

     <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src='$path/assets/vendor/libs/jquery/jquery.js'></script>
    <script src='$path/assets/vendor/libs/popper/popper.js'></script>
    <script src='$path/assets/vendor/js/bootstrap.js'></script>
    <script src='$path/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'></script>

    <script src='$path/assets/vendor/js/menu.js'></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src='$path/assets/vendor/libs/apex-charts/apexcharts.js'></script>

    <!-- Main JS -->
    <script src='$path/assets/js/main.js'></script>

    <!-- Page JS -->
    <script src='$path/assets/js/dashboards-analytics.js'></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src='https://buttons.github.io/buttons.js'></script>

    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJTYo2MsMefpH84eiEFBzHgIhC9H7PRZ8mEcfM/sFJpDYLj5' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-smHYkd38cqh8yg8pP+RZTyk84PzvBvR1zIvIVLDg6TA11UyV8Viw7moJo4Wl30J2' crossorigin='anonymous'></script>

<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ775/zr03cJIHq5qvIF5t47OVeF5XaXIMr' crossorigin='anonymous'>

<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJTYo2MsMefpH84eiEFBzHgIhC9H7PRZ8mEcfM/sFJpDYLj5' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-smHYkd38cqh8yg8pP+RZTyk84PzvBvR1zIvIVLDg6TA11UyV8Viw7moJo4Wl30J2' crossorigin='anonymous'></script>


</head>
<style>
        .error {
            color: red;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .input-group-text i {
            display: none;
        }
        .input-group.valid .input-group-text .bx-check {
            color: green;
            display: block;
        }
        .input-group.invalid .input-group-text .bx-x {
            color: red;
            display: block;
        }
    </style>

    <!-- JavaScript validation script -->
    <script>
      function validateForm() {
        let valid = true;

        // Clear previous errors
        document.getElementById('usernameError').textContent = '';
        document.getElementById('emailError').textContent = '';
        document.getElementById('passwordError').textContent = '';
        document.getElementById('confirmPasswordError').textContent = '';
        document.getElementById('termsError').textContent = '';

        // Username validation
        const username = document.getElementById('Username').value;
        if (username === '') {
          valid = false;
          document.getElementById('usernameError').textContent = 'Username is required.';
          setInvalid('Username');
        } else {
          setValid('Username');
        }

        // Email validation
        const email = document.getElementById('Email').value;
        const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (email === '') {
          valid = false;
          document.getElementById('emailError').textContent = 'Email is required.';
          setInvalid('Email');
        } else if (!email.match(emailPattern)) {
          valid = false;
          document.getElementById('emailError').textContent = 'Please enter a valid email address.';
          setInvalid('Email');
        } else {
          setValid('Email');
        }

        // Password validation
        const password = document.getElementById('Password').value;
        const confirmPassword = document.getElementById('ConfirmPassword').value;
        if (password === '') {
          valid = false;
          document.getElementById('passwordError').textContent = 'Password is required.';
          setInvalid('Password');
        } else if (password.length < 6) {
          valid = false;
          document.getElementById('passwordError').textContent = 'Password must be at least 6 characters long.';
          setInvalid('Password');
        } else {
          setValid('Password');
        }

        // Confirm Password validation
        if (confirmPassword === '') {
          valid = false;
          document.getElementById('confirmPasswordError').textContent = 'Please confirm your password.';
          setInvalid('ConfirmPassword');
        } else if (password !== confirmPassword) {
          valid = false;
          document.getElementById('confirmPasswordError').textContent = 'Passwords do not match.';
          setInvalid('ConfirmPassword');
        } else {
          setValid('ConfirmPassword');
        }

        // Terms and conditions validation
        const terms = document.getElementById('terms-conditions').checked;
        if (!terms) {
          valid = false;
          document.getElementById('termsError').textContent = 'You must agree to the privacy policy & terms.';
        }

        return valid;
      }

      function setValid(elementId) {
        const element = document.getElementById(elementId).parentNode;
        element.classList.remove('invalid');
        element.classList.add('valid');
      }

      function setInvalid(elementId) {
        const element = document.getElementById(elementId).parentNode;
        element.classList.remove('valid');
        element.classList.add('invalid');
      }
    </script>

    ";
} // checked - Done

function navbar($path, $user)
{
  headTag($path);
  switch ($user) {
    case "Guest":
      guestNavbar($path);
      break;
    case "Company":
      require "$path/functions/Company.php";
      companyNavbar($path);
      break;
    case "College":
      require "$path/functions/College.php";
      collageNavbar($path);
      break;
    case "Student":
      require "$path/functions/Student.php";
      studentNavbar($path);
      break;
    case "Admin":
      require "$path/functions/Company.php";
      adminNavbar($path);
      break;
    default:
      echo "";
  }
} // Checked - may be change

function guestNavbar($path)
{
  echo "
<nav
  class='layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme'
  id='layout-navbar'>
  <div class='app-brand demo'>
      <a href='#' class='app-brand-link'>
          <span class='app-brand-logo demo'>
              <svg
                  width='25'
                  viewBox='0 0 25 42'
                  version='1.1'
                  xmlns='http://www.w3.org/2000/svg'
                  xmlns:xlink='http://www.w3.org/1999/xlink'>
                  <defs>
                      <path
                          d='M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z'
                          id='path-1'></path>
                      <path
                          d='M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z'
                          id='path-3'></path>
                      <path
                          d='M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z'
                          id='path-4'></path>
                      <path
                          d='M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z'
                          id='path-5'></path>
                  </defs>
                  <g id='g-app-brand' stroke='none'
                      stroke-width='1' fill='none'
                      fill-rule='evenodd'>
                      <g id='Brand-Logo'
                          transform='translate(-27.000000, -15.000000)'>
                          <g id='Icon'
                              transform='translate(27.000000, 15.000000)'>
                              <g id='Mask'
                                  transform='translate(0.000000, 8.000000)'>
                                  <mask id='mask-2'
                                      fill='white'>
                                      <use
                                          xlink:href='#path-1'></use>
                                  </mask>
                                  <use fill='#696cff'
                                      xlink:href='#path-1'></use>
                                  <g id='Path-3'
                                      mask='url(#mask-2)'>
                                      <use fill='#696cff'
                                          xlink:href='#path-3'></use>
                                      <use
                                          fill-opacity='0.2'
                                          fill='#FFFFFF'
                                          xlink:href='#path-3'></use>
                                  </g>
                                  <g id='Path-4'
                                      mask='url(#mask-2)'>
                                      <use fill='#696cff'
                                          xlink:href='#path-4'></use>
                                      <use
                                          fill-opacity='0.2'
                                          fill='#FFFFFF'
                                          xlink:href='#path-4'></use>
                                  </g>
                              </g>
                              <g
                                  id='Triangle'
                                  transform='translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) '>
                                  <use fill='#696cff'
                                      xlink:href='#path-5'></use>
                                  <use fill-opacity='0.2'
                                      fill='#FFFFFF'
                                      xlink:href='#path-5'></use>
                              </g>
                          </g>
                      </g>
                  </g>
              </svg>
          </span>
          <span
              class='app-brand-text demo menu-text fw-bolder ms-2'
              href='$path/index.php'>Placement Plus
          </span>
      </a>

      <a href='javascript:void(0);'
          class='layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none'>
          <i
              class='bx bx-chevron-left bx-sm align-middle'></i>
      </a>
  </div>
  <div class='navbar-nav-right d-flex align-items-center'
      id='navbar-collapse'>

      <ul
          class='navbar-nav flex-row align-items-center ms-auto'>
         
          <a class='nav-item me-5 desktop-nav' href='$path/index.php'>Home</a>
          <a class='nav-item me-5 desktop-nav' href='$path/AboutUs.php'>About Us</a>
          <a class='nav-item me-5 desktop-nav' href='$path/ContactUs.php'>Contact Us</a>

          <li class='nav-item me-5 desktop-nav'>
              <a type='button' class='btn btn-primary desktop-nav' href='$path/Authentication/'>
                  <i class='bx bx-log-in-circle desktop-nav '></i>
                Login/Register
              </a>
          </li>
      </ul>
  </div>
</nav>
";
} // Checked - may be change
function companyNavbar($path)
{
  echo "
  <nav class='layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme' id='layout-navbar'>
  <div class='app-brand demo'>
    <a href='#' class='app-brand-link'>
      <span class='app-brand-logo demo'>
                          <svg width='25' viewBox='0 0 25 42' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                              <defs>
                                  <path d='M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z' id='path-1'></path>
                                  <path d='M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0 511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z' id='path-3'></path>
                                  <path d='M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z' id='path-4'></path>
                                  <path d='M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z' id='path-5'></path>
                              </defs>
                              <g id='g-app-brand' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                                  <g id='Brand-Logo' transform='translate(-27.000000, -15.000000)'>
                                      <g id='Icon' transform='translate(27.000000, 15.000000)'>
                                          <g id='Mask' transform='translate(0.000000, 8.000000)'>
                                              <mask id='mask-2' fill='white'>
                                                  <use xlink:href='#path-1'></use>
                                              </mask>
                                              <use fill='#696cff' xlink:href='#path-1'></use>
                                              <g id='Path-3' mask='url(#mask-2)'>
                                                  <use fill='#696cff' xlink:href='#path-3'></use>
                                                  <use fill-opacity='0.2' fill='#FFFFFF' xlink:href='#path-3'></use>
                                              </g>
                                              <g id='Path-4' mask='url(#mask-2)'>
                                                  <use fill='#696cff' xlink:href='#path-4'></use>
                                                  <use fill-opacity='0.2' fill='#FFFFFF' xlink:href='#path-4'></use>
                                              </g>
                                          </g>
                                          <g id='Triangle' transform='translate(19.000000, 11.000000) rotate(-300.000000) translate(-19000000, -11.000000)'>
                                          <use fill='#696cff' xlink:href='#path-5'></use>
                                          <use fill-opacity='0.2' fill='#FFFFFF' xlink:href='#path-5'></use>
                                          </g>
                                      </g>
                                  </g>
                              </g>
                          </svg>
                      </span>
                      <a class='app-brand-text demo menu-text fw-bolder ms-2' href='$path/index.php'>Placement Plus
                      </a>
                  </a>

                  <a href='javascript:void(0);' class='layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none'>
                      <i class='bx bx-chevron-left bx-sm align-middle'></i>
                  </a>
              </div>

  <div class='layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none'>
    <a class='nav-item nav-link px-0 me-xl-4' href='javascript:void(0)'>
  
    </a>
  </div>

  <div class='navbar-nav-right d-flex align-items-center' id='navbar-collapse'>
    <!-- Search -->
              <div class='navbar-nav align-items-center' style='margin-left:20px;'>
                <div class='nav-item d-flex align-items-center'>
                  <i class='bx bx-search fs-4 lh-0'></i>
                  <input type='text' class='form-control border-0 shadow-none' placeholder='Search...' aria-label='Search...' />
                </div>
              </div>
              <!-- /Search -->


    <ul class='navbar-nav flex-row align-items-center ms-auto'>

    <a class='nav-item me-5 desktop-nav ' href='$path/user/Company/index.php'>Home</a>
    <a class='nav-item me-5 desktop-nav ' href='$path/user/Company/FindCollege.php'>Find College</a>
    <a class='nav-item me-5 desktop-nav ' href='$path/user/Company/EmployeeRequest.php'>Employee requests</a>
   
      <!-- Place this tag where you want the button to render. -->
     
      <!-- User -->
      <li class='nav-item navbar-dropdown dropdown-user dropdown'>
        <a class='nav-link dropdown-toggle hide-arrow' href='javascript:void(0);' data-bs-toggle='dropdown'>
          <div class='avatar avatar-online'>
            <img src='$path/assets/img/avatars/1.png' alt class='w-px-40 h-auto rounded-circle' />
          </div>
        </a>
        <ul class='dropdown-menu dropdown-menu-end'>
          <li>
            <a class='dropdown-item' href='#'>
              <div class='d-flex'>
                <div class='flex-shrink-0 me-3'>
                  <div class='avatar avatar-online'>
                    <img src='$path/assets/img/avatars/1.png' alt class='w-px-40 h-auto rounded-circle' />
                  </div>
                </div>
                <div class='flex-grow-1'>
                  <span class='fw-semibold d-block'>Company Name</span>
                  <small class='text-muted'>Company </small>
                </div>
              </div>
            </a>
          </li>
          <li>
            <div class='dropdown-divider'></div>
          </li>
          <li>
            <a class='dropdown-item' href='$path/User/Company/Profile.php'>
              <i class='bx bx-user me-2'></i>
              <span class='align-middle'>My Profile</span>
            </a>
          </li>
          <li>
            <a class='dropdown-item' href='#'>
              <i class='bx bx-cog me-2'></i>
              <span class='align-middle'>Settings</span>
            </a>
          </li>
          <li>
            <a class='dropdown-item' href='#'>
              <span class='d-flex align-items-center align-middle'>
                <i class='flex-shrink-0 bx bx-credit-card me-2'></i>
                <span class='flex-grow-1 align-middle'>Billing</span>
                <span class='flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20'>4</span>
              </span>
            </a>
          </li>
          <li>
            <div class='dropdown-divider'></div>
          </li>
          <li>
            <a class='dropdown-item' href='$path'>
              <i class='bx bx-power-off me-2'></i>
              <span class='align-middle'>Log Out</span>
            </a>
          </li>
        </ul>
      </li>
      <!--/ User -->
    </ul>
  </div>
</nav>
  ";

} // Checked - may be change
function collageNavbar($path)
{
  echo "
  <nav
  class='layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme'
  id='layout-navbar'
>
<div class='app-brand demo'>
                  <a href='#' class='app-brand-link'>
                      <span class='app-brand-logo demo'>
                          <svg width='25' viewBox='0 0 25 42' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www3.org/1999/xlink'>
                              <defs>
                                  <path d='M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z' id='path-1'></path>
                                  <path d='M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z' id='path-3'></path>
                                  <path d='M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z' id='path-4'></path>
                                  <path d='M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z' id='path-5'></path>
                              </defs>
                              <g id='g-app-brand' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                                  <g id='Brand-Logo' transform='translate(-27.000000, -15.000000)'>
                                      <g id='Icon'
                                          transform='translate(27.000000, 15.000000)'>
                                          <g id='Mask'
                                              transform='translate(0.000000, 8.000000)'>
                                              <mask id='mask-2'
                                                  fill='white'>
                                                  <use
                                                      xlink:href='#path-1'></use>
                                              </mask>
                                              <use fill='#696cff'
                                                  xlink:href='#path-1'></use>
                                              <g id='Path-3'
                                                  mask='url(#mask-2)'>
                                                  <use fill='#696cff'
                                                      xlink:href='#path-3'></use>
                                                  <use
                                                      fill-opacity='0.2'
                                                      fill='#FFFFFF'
                                                      xlink:href='#path-3'></use>
                                              </g>
                                              <g id='Path-4'
                                                  mask='url(#mask-2)'>
                                                  <use fill='#696cff'
                                                      xlink:href='#path-4'></use>
                                                  <use
                                                      fill-opacity='0.2'
                                                      fill='#FFFFFF'
                                                      xlink:href='#path-4'></use>
                                              </g>
                                          </g>
                                          <g id='Triangle' transform='translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) '>
                                              <use fill='#696cff' xlink:href='#path-5'></use>
                                              <use fill-opacity='0.2' fill='#FFFFFF' xlink:href='#path-5'></use>
                                          </g>
                                      </g>
                                  </g>
                              </g>
                          </svg>
                      </span>
                      <a class='app-brand-text demo menu-text fw-bolder ms-2' href='$path/index.php'>Placement Plus
                      </a>
                  </a>

                  <a href='javascript:void(0);' class='layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none'>
                      <i class='bx bx-chevron-left bx-sm align-middle'></i>
                  </a>
              </div>

  <div class='layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none'>
    <a class='nav-item nav-link px-0 me-xl-4' href='javascript:void(0)'>
  
    </a>
  </div>

  <div class='navbar-nav-right d-flex align-items-center' id='navbar-collapse'>
   

    <ul class='navbar-nav flex-row align-items-center ms-auto'>

    <a class='nav-item me-5 desktop-nav ' href='$path/user/collage/index.php'>Home</a>
    <a class='nav-item me-5 desktop-nav ' href='$path/user/collage/StudentList.php'>Students</a>
    <a class='nav-item me-5 desktop-nav ' href='$path/user/collage/JobDrive.php'>Job Drive</a>
   
      <!-- Place this tag where you want the button to render. -->
     
      <!-- User -->
      <li class='nav-item navbar-dropdown dropdown-user dropdown'>
        <a class='nav-link dropdown-toggle hide-arrow' href='javascript:void(0);' data-bs-toggle='dropdown'>
          <div class='avatar avatar-online'>
            <img src='$path/assets/img/avatars/1.png' alt class='w-px-40 h-auto rounded-circle' />
          </div>
        </a>
        <ul class='dropdown-menu dropdown-menu-end'>
          <li>
            <a class='dropdown-item' href='#'>
              <div class='d-flex'>
                <div class='flex-shrink-0 me-3'>
                  <div class='avatar avatar-online'>
                    <img src='$path/assets/img/avatars/1.png' alt class='w-px-40 h-auto rounded-circle' />
                  </div>
                </div>
                <div class='flex-grow-1'>
                  <span class='fw-semibold d-block'>College Name</span>
                  <small class='text-muted'>College </small>
                </div>
              </div>
            </a>
          </li>
          <li>
            <div class='dropdown-divider'></div>
          </li>
          <li>
            <a class='dropdown-item' href='$path/User/collage/Profile.php'>
              <i class='bx bx-user me-2'></i>
              <span class='align-middle'>My Profile</span>
            </a>
          </li>
          <li>
            <a class='dropdown-item' href='#'>
              <i class='bx bx-cog me-2'></i>
              <span class='align-middle'>Settings</span>
            </a>
          </li>
          <li>
            <a class='dropdown-item' href='#'>
              <span class='d-flex align-items-center align-middle'>
                <i class='flex-shrink-0 bx bx-credit-card me-2'></i>
                <span class='flex-grow-1 align-middle'>Billing</span>
                <span class='flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20'>4</span>
              </span>
            </a>
          </li>
          <li>
            <div class='dropdown-divider'></div>
          </li>
          <li>
            <a class='dropdown-item' href='auth-login-basic.html'>
              <i class='bx bx-power-off me-2'></i>
              <span class='align-middle'>Log Out</span>
            </a>
          </li>
        </ul>
      </li>
      <!--/ User -->
    </ul>
  </div>
</nav>
  ";
} // Checked - may be change
function studentNavbar($path)
{
  echo "
  <nav class='layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme' id='layout-navbar'>
  <div class='app-brand demo'>
                  <a href='#' class='app-brand-link'>
                      <span class='app-brand-logo demo'>
                          <svg width='25' viewBox='0 0 25 42' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                              <defs>
                                  <path d='M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z' id='path-1'></path>
                                  <path d='M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z' id='path-3'></path>
                                  <path d='M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z' id='path-4'></path>
                                  <path d='M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z' id='path-5'></path>
                              </defs>
                              <g id='g-app-brand' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                                  <g id='Brand-Logo' transform='translate(-27.000000, -15.000000)'>
                                      <g id='Icon' transform='translate(27.000000, 15.000000)'>
                                          <g id='Mask' transform='translate(0.000000, 8.000000)'>
                                              <mask id='mask-2' fill='white'>
                                                  <use xlink:href='#path-1'></use>
                                              </mask>
                                              <use fill='#696cff' xlink:href='#path-1'></use>
                                              <g id='Path-3'
                                                  mask='url(#mask-2)'>
                                                  <use fill='#696cff'
                                                      xlink:href='#path-3'></use>
                                                  <use
                                                      fill-opacity='0.2'
                                                      fill='#FFFFFF'
                                                      xlink:href='#path-3'></use>
                                              </g>
                                              <g id='Path-4'
                                                  mask='url(#mask-2)'>
                                                  <use fill='#696cff'
                                                      xlink:href='#path-4'></use>
                                                  <use
                                                      fill-opacity='0.2'
                                                      fill='#FFFFFF'
                                                      xlink:href='#path-4'></use>
                                              </g>
                                          </g>
                                          <g
                                              id='Triangle'
                                              transform='translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) '>
                                              <use fill='#696cff'
                                                  xlink:href='#path-5'></use>
                                              <use fill-opacity='0.2'
                                                  fill='#FFFFFF'
                                                  xlink:href='#path-5'></use>
                                          </g>
                                      </g>
                                  </g>
                              </g>
                          </svg>
                      </span>
                      <a class='app-brand-text demo menu-text fw-bolder ms-2' href='$path/index.php'>Placement Plus
                      </a>
                  </a>

                  <a href='javascript:void(0);'
                      class='layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none'>
                      <i
                          class='bx bx-chevron-left bx-sm align-middle'></i>
                  </a>
              </div>

  <div class='layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none'>
    <a class='nav-item nav-link px-0 me-xl-4' href='javascript:void(0)'>
  
    </a>
  </div>

  <div class='navbar-nav-right d-flex align-items-center' id='navbar-collapse'>
   

    <ul class='navbar-nav flex-row align-items-center ms-auto'>

    <a class='nav-item me-5 desktop-nav ' href='$path/user/Student/index.php'>Home</a>
    <a class='nav-item me-5 desktop-nav ' href='$path/user/Student/Job.php'>Apply To Job</a>
    <a class='nav-item me-5 desktop-nav ' href='$path/user/Student/Appliedjob.php'>Already Applied</a>
      <!-- Place this tag where you want the button to render. -->
     
      <!-- User -->
      <li class='nav-item navbar-dropdown dropdown-user dropdown'>
        <a class='nav-link dropdown-toggle hide-arrow' href='javascript:void(0);' data-bs-toggle='dropdown'>
          <div class='avatar avatar-online'>
            <img src='$path/assets/img/avatars/1.png' alt class='w-px-40 h-auto rounded-circle' />
          </div>
        </a>
        <ul class='dropdown-menu dropdown-menu-end'>
          <li>
            <a class='dropdown-item' href='#'>
              <div class='d-flex'>
                <div class='flex-shrink-0 me-3'>
                  <div class='avatar avatar-online'>
                    <img src='$path/assets/img/avatars/1.png' alt class='w-px-40 h-auto rounded-circle' />
                  </div>
                </div>
                <div class='flex-grow-1'>
                  <span class='fw-semibold d-block'>Student Name</span>
                  <small class='text-muted'>Student</small>
                </div>
              </div>
            </a>
          </li>
          <li>
            <div class='dropdown-divider'></div>
          </li>
          <li>
            <a class='dropdown-item' href='$path/user/Student/Profile.php'>
              <i class='bx bx-user me-2'></i>
              <span class='align-middle'>My Profile</span>
            </a>
          </li>
          <li>
            <a class='dropdown-item' href='#'>
              <i class='bx bx-cog me-2'></i>
              <span class='align-middle'>Settings</span>
            </a>
          </li>
          <li>
            <a class='dropdown-item' href='#'>
              <span class='d-flex align-items-center align-middle'>
                <i class='flex-shrink-0 bx bx-credit-card me-2'></i>
                <span class='flex-grow-1 align-middle'>Billing</span>
                <span class='flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20'>4</span>
              </span>
            </a>
          </li>
          <li>
            <div class='dropdown-divider'></div>
          </li>
          <li>
            <a class='dropdown-item' href='$path'>
              <i class='bx bx-power-off me-2'></i>
              <span class='align-middle'>Log Out</span>
            </a>
          </li>
        </ul>
      </li>
      <!--/ User -->
    </ul>
  </div>
</nav>
  ";
} // Checked - may be change
function AdminNavbar($path)
{
  echo "
  <nav class='layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme' id='layout-navbar'>
  <div class='app-brand demo'>
                  <a href='#' class='app-brand-link'>
                      <span class='app-brand-logo demo'>
                          <svg width='25' viewBox='0 0 25 42' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                              <defs>
                                  <path d='M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z' id='path-1'></path>
                                  <path d='M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z' id='path-3'></path>
                                  <path d='M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z' id='path-4'></path>
                                  <path d='M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z' id='path-5'></path>
                              </defs>
                              <g id='g-app-brand' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                                  <g id='Brand-Logo' transform='translate(-27.000000, -15.000000)'>
                                      <g id='Icon' transform='translate(27.000000, 15.000000)'>
                                          <g id='Mask' transform='translate(0.000000, 8.000000)'>
                                              <mask id='mask-2' fill='white'>
                                                  <use xlink:href='#path-1'></use>
                                              </mask>
                                              <use fill='#696cff' xlink:href='#path-1'></use>
                                              <g id='Path-3'
                                                  mask='url(#mask-2)'>
                                                  <use fill='#696cff'
                                                      xlink:href='#path-3'></use>
                                                  <use
                                                      fill-opacity='0.2'
                                                      fill='#FFFFFF'
                                                      xlink:href='#path-3'></use>
                                              </g>
                                              <g id='Path-4'
                                                  mask='url(#mask-2)'>
                                                  <use fill='#696cff'
                                                      xlink:href='#path-4'></use>
                                                  <use
                                                      fill-opacity='0.2'
                                                      fill='#FFFFFF'
                                                      xlink:href='#path-4'></use>
                                              </g>
                                          </g>
                                          <g
                                              id='Triangle'
                                              transform='translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) '>
                                              <use fill='#696cff'
                                                  xlink:href='#path-5'></use>
                                              <use fill-opacity='0.2'
                                                  fill='#FFFFFF'
                                                  xlink:href='#path-5'></use>
                                          </g>
                                      </g>
                                  </g>
                              </g>
                          </svg>
                      </span>
                      <a class='app-brand-text demo menu-text fw-bolder ms-2' href='$path/index.php'>Placement Plus
                      </a>
                  </a>

                  <a href='javascript:void(0);'
                      class='layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none'>
                      <i
                          class='bx bx-chevron-left bx-sm align-middle'></i>
                  </a>
              </div>

  <div class='layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none'>
    <a class='nav-item nav-link px-0 me-xl-4' href='javascript:void(0)'>
  
    </a>
  </div>

  <div class='navbar-nav-right d-flex align-items-center' id='navbar-collapse'>
   

    <ul class='navbar-nav flex-row align-items-center ms-auto'>
    

 <div class='btn-group' style='margin-right:50px;'>
                      <button
                        type='button'
                        class='btn btn-primary dropdown-toggle'
                        data-bs-toggle='dropdown'
                        aria-expanded='false'
                      >
                        Profiles
                      </button>
                      <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='../Admin/ViewCompany.php'>View Company</a></li>
                        <li><a class='dropdown-item' href='../Admin/ViewCollege.php'>View College</a></li>
                        <li><a class='dropdown-item' href='../Admin/ViewStudent.php'>View Student</a></li>
                        <li><a class='dropdown-item' href='../Admin/index.php'>View Admin</a></li>
                        <li><a class='dropdown-item' href='../../index.php'>View Guest</a></li>
                     
                      
                      </ul>
                    </div>    

    <a class='nav-item me-5 desktop-nav ' href='$path/user/Admin/index.php'>Home</a>
      <!-- Place this tag where you want the button to render. -->
     
      <!-- User -->
      <li class='nav-item navbar-dropdown dropdown-user dropdown'>
        <a class='nav-link dropdown-toggle hide-arrow' href='javascript:void(0);' data-bs-toggle='dropdown'>
          <div class='avatar avatar-online'>
            <img src='$path/assets/img/avatars/1.png' alt class='w-px-40 h-auto rounded-circle' />
          </div>
        </a>
        <ul class='dropdown-menu dropdown-menu-end'>
          <li>
            <a class='dropdown-item' href='#'>
              <div class='d-flex'>
                <div class='flex-shrink-0 me-3'>
                  <div class='avatar avatar-online'>
                    <img src='$path/assets/img/avatars/1.png' alt class='w-px-40 h-auto rounded-circle' />
                  </div>
                </div>
                <div class='flex-grow-1'>
                  <span class='fw-semibold d-block'>Admin Name</span>
                  <small class='text-muted'>Yash<small>
                </div>
              </div>
            </a>
          </li>
          <li>
            <div class='dropdown-divider'></div>
          </li>
          <li>
            <a class='dropdown-item' href='$path/User/Admin/Profile.php'>
              <i class='bx bx-user me-2'></i>
              <span class='align-middle'>My Profile</span>
            </a>
          </li>
          <li>
            <a class='dropdown-item' href='#'>
              <i class='bx bx-cog me-2'></i>
              <span class='align-middle'>Settings</span>
            </a>
          </li>
          <li>
            <a class='dropdown-item' href='#'>
              <span class='d-flex align-items-center align-middle'>
                <i class='flex-shrink-0 bx bx-credit-card me-2'></i>
                <span class='flex-grow-1 align-middle'>Billing</span>
                <span class='flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20'>4</span>
              </span>
            </a>
          </li>
          <li>
            <div class='dropdown-divider'></div>
          </li>
          <li>
            <a class='dropdown-item' href='$path'>
              <i class='bx bx-power-off me-2'></i>
              <span class='align-middle'>Log Out</span>
            </a>
          </li>
        </ul>
      </li>
      <!--/ User -->
    </ul>
  </div>
</nav>
  ";
} // Checked - may be change
function commonHeader()
{
  echo " ";
} // Empty
function footer($path)
{
  echo "
  <html
  lang='en'
  class='light-style layout-menu-fixed'
  dir='ltr'
  data-theme='theme-default'
  data-assets-path='assets'
  data-template='vertical-menu-template-free'
>
<!-- Footer Stars Here -->
                       
 <footer class='text-center text-lg-start bg-body-tertiary text-muted'>
    <!-- Section: Social media -->
    <section class='d-flex justify-content-center justify-content-lg-between p-4 border-bottom'>
      <!-- Left -->
      <div class='me-5 d-none d-lg-block'>
       
      </div>
      <!-- Left -->
  
      <!-- Right -->
      <div>
        <a href='' class='me-4 text-reset'>
          <i class='fab fa-facebook-f'></i>
        </a>
        <a href='' class='me-4 text-reset'>
          <i class='fab fa-twitter'></i>
        </a>
        <a href='' class='me-4 text-reset'>
          <i class='fab fa-google'></i>
        </a>
        <a href='' class='me-4 text-reset'>
          <i class='fab fa-instagram'></i>
        </a>
        <a href='' class='me-4 text-reset'>
          <i class='fab fa-linkedin'></i>
        </a>
        <a href='' class='me-4 text-reset'>
          <i class='fab fa-github'></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->
  
    <!-- Section: Links  -->
    <section class=''>
      <div class='container text-center text-md-start mt-5'>
        <!-- Grid row -->
        <div class='row mt-3'>
          <!-- Grid column -->
          <div class='col-md-3 col-lg-4 col-xl-3 mx-auto mb-4'>
            <!-- Content -->
            <h6 class='text-uppercase fw-bold mb-4'>
              <i class='fas fa-gem me-3'></i>PlacementPlus
            </h6>
            <p>
            PlacementPlace: Where Opportunities Meet Talent
At PlacementPlace, we are dedicated to connecting you with the best companies in the industry. Whether you're searching for your first job or looking to take the next step in your career, we help you discover the right opportunities to match your skills and aspirations.
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class='col-md-2 col-lg-2 col-xl-2 mx-auto mb-4'>
            <!-- Links -->
            <h6 class='text-uppercase fw-bold mb-4'>
              Products
            </h6>
            <p>
            
              <a href='#!' class='text-reset'>Our T&c</a>
            </p>
            <p>
              <a href='#!' class='text-reset'>Our Policy</a>
            </p>
            <p>
              <a href='#!' class='text-reset'>Customers</a>
            </p>
            <p>
              
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class='col-md-3 col-lg-2 col-xl-2 mx-auto mb-4'>
            <!-- Links -->
            <h6 class='text-uppercase fw-bold mb-4'>
              Useful links
            </h6>
            <p>
              <a href='#!' class='text-reset'>Pricing</a>
            </p>
            <p>
              <a href='#!' class='text-reset'>Settings</a>
            </p>
            <p>
              <a href='#!' class='text-reset'>Orders</a>
            </p>
            <p>
              <a href='#!' class='text-reset'>Help</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class='col-md-3 col-lg-2 col-xl-2 mx-auto mb-4'>
            <!-- Links -->
            <h6 class='text-uppercase fw-bold mb-4'>
              Users Login Links
            </h6>
            <p>
              <a href='$path/User/Student' class='text-reset'>Student</a>
            </p>
            <p>
              <a href='$path/User/Company' class='text-reset'>Company</a>
            </p>
            <p>
              <a href='$path/user/Collage' class='text-reset'>College</a>
            </p>
            <p>
              <a href='$path/User/Admin' class='text-reset'>Administrator</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class='col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4'>
            <!-- Links -->
            <h6 class='text-uppercase fw-bold mb-4'>Contact</h6>
            <p><i class='fas fa-home me-3'></i>Rajkot Main Road - 365004</p>
            <p>
              <i class='fas fa-envelope me-3'></i>
              info@placementplus.com
            </p>
            <p><i class='fas fa-phone me-3'></i>9088687687</p>
            <p><i class='fas fa-print me-3'></i>7887878687</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
  
    <!-- Copyright -->
    <div class='text-center p-4' style='background-color: rgba(0, 0, 0, 0.05);'>
      © 2024 Copyright:
      <a class='text-reset fw-bold' href='https://mdbootstrap.com/'>PlacementPlus.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer Ends Here -->
  ";
} // Checked - may be change

function getAlert($user)
{
  if ($user == "Guest") {
    $arr = array("", "", "");
    return $arr;
  }
  $arr = array("", "", "update");
  $arr = array("", "verify", "");
  //$arr = array("login","verify","update");
  return $arr;
}
function AddAlert($user)
{
  if ($user == "") {
    return;
  }
  $alert = getAlert($user);
  if ($alert[0] == "login") {
    echo "
  <div class='alert alert-success alert-dismissible' role='alert'>
  Hello USERNAME: " . $user . ", You Logged in Successfully!
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>
    ";
  }
  if ($alert[1] == "verify") {
    echo "
<div class='alert alert-danger alert-dismissible' role='alert'>
Please Verify the Sensitive Information in Your Profile! <a href='Profile.php'>Click Here.</a>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>
    ";
  }
  if ($alert[2] == "update") {
    echo "
<div class='alert alert-warning alert-dismissible' role='alert'>
Please Update & Verify " . $user . " Information in Your Profile! <a href='Profile.php'>Click Here.</a>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>
    ";
  }
}
function startContainer($path, $user)
{
  echo "
  <!DOCTYPE html>
  </head>
  <body>
    " . navbar($path, $user) . "
    <div class='layout-wrapper layout-content-navbar layout-without-menu'>
      <div class='layout-container'>
        <div class='layout-page'>
          <div class='content-wrapper'>
            <div class='container-xl flex-grow-1 container-p-y'>
              <!-- Content Start -->
  ";
  AddAlert($user);
}
function endContainer($path, $nofooter = null)
{
  echo "
              <!-- Content End -->
            </div>
          </div>
        </div>
      </div>
    </div>
    ";
  if ($nofooter == null) {
    footer($path);
  }
  echo "
  </body>
  </html>
  ";
}
