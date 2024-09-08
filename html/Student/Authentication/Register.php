<?php include "../../functions/basic.php"; ?>
<?php include "../../functions/Student.php"; ?>


<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
<?php LoginHadtag(); ?>
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
        if (username === "") {
          valid = false;
          document.getElementById('usernameError').textContent = 'Username is required.';
          setInvalid('Username');
        } else {
          setValid('Username');
        }

        // Email validation
        const email = document.getElementById('Email').value;
        const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (email === "") {
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
        if (password === "") {
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
        if (confirmPassword === "") {
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
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="#" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <!-- SVG logo code here -->
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder">Sneat</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Your Journey Begins Here 🚀</h4>
              <p class="mb-4">Where Education Meets Opportunity!</p>

              <form class="mb-3" method="POST" onsubmit="return validateForm()">
                <div class="mb-3">
                  <label for="Username" class="form-label">Username</label>
                  <div class="input-group input-group-merge">
                    <input type="text" class="form-control" id="Username" placeholder="Enter your username"  autofocus />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-check"></i><i class="bx bx-x"></i></span>
                  </div>
                  <span id="usernameError" class="error"></span>
                </div>
                <div class="mb-3">
                  <label for="Email" class="form-label">Email</label>
                  <div class="input-group input-group-merge">
                    <input type="email" class="form-control" id="Email" placeholder="Enter your email"  />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-check"></i><i class="bx bx-x"></i></span>
                  </div>
                  <span id="emailError" class="error"></span>
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="Password">Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="Password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-check"></i><i class="bx bx-x"></i></span>
                  </div>
                  <span id="passwordError" class="error"></span>
                </div>
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="ConfirmPassword">Confirm Password</label>
                    <div class="input-group input-group-merge">
                      <input type="password" id="ConfirmPassword" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="ConfirmPassword"  />
                      <span class="input-group-text cursor-pointer"><i class="bx bx-check"></i><i class="bx bx-x"></i></span>
                    </div>
                    <span id="confirmPasswordError" class="error"></span>
                  </div>

                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                    <label class="form-check-label" for="terms-conditions">
                      I agree to
                      <a href="javascript:void(0);">privacy policy & terms</a>
                    </label>
                  </div>
                  <span id="termsError" class="error"></span>
                </div>
                <button class="btn btn-primary d-grid w-100">Sign up</button>
              </form>
              <br>
              <p class="text-center">
                <span>Already have an account?</span>
                <a href="Login.php">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    
  </body>
</html>
