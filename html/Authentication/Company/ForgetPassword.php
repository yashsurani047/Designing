<?php
$path = "../..";
$user = "Company";

require "$path/functions/basic.php";
startContainer($path, "");
?>
<main>
    <!-- Content -->
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Forgot Password -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <!-- SVG logo here -->
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder">Placement Plus</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2"><strong><?php echo $user; ?></strong></h4>
              <h4 class="mb-2">Forgot Password? 🔒</h4>
              <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
              
              <form id="formAuthentication" class="mb-3" action="index.html" method="POST" onsubmit="return validateForm()">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    autofocus
                  />
                  <span id="emailError" class="error"></span>
                </div>
                <button class="btn btn-primary d-grid w-100">Send Reset Link</button>
              </form>
              
              <div class="text-center">
                <a href="Login.php" class="d-flex align-items-center justify-content-center">
                  <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                  Back to login
                </a>
              </div>
            </div>
          </div>
          <!-- /Forgot Password -->
        </div>
      </div>
    </div>
    <!-- / Content -->
</main>
<?php endContainer($path, " "); ?>

<script>
  function validateForm() {
    // Clear previous errors
    document.getElementById('emailError').innerText = "";

    let valid = true;

    // Email validation
    let email = document.getElementById('email').value;
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === "" || !emailPattern.test(email)) {
      document.getElementById('emailError').innerText = "Valid Email is required";
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
