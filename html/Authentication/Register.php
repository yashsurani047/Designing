<?php
$path = "..";
require_once "$path/Function/Basic.php";

startContainer($path, "");
?>
<main>
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
                <span class="app-brand-text demo text-body fw-bolder">Placement Plus</span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Your Journey Begins Here 🚀</h4>
            <p class="mb-4">Where Education Meets Opportunity!</p>

            <form class="mb-3" method="POST" action="<?php echo $path?>/Function/Submit.php" >
              <div class="mb-3">
                <center>
                  <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="Usertype" value="Student" id="Student" autocomplete="off" />
                    <label class="btn btn-outline-primary" for="Student"><i class='bx bxs-user'></i> Student</label>
                    <input type="radio" class="btn-check" name="Usertype" id="College" value="Collage" autocomplete="off" />
                    <label class="btn btn-outline-primary" for="College"><i class='bx bxs-graduation'></i>
                      College</label>
                    <input type="radio" class="btn-check" name="Usertype" id="Company" value="Company" autocomplete="off" />
                    <label class="btn btn-outline-primary" for="Company"><i class='bx bxs-buildings'></i>
                      Company</label>
                  </div>
                </center>
              </div>
              <div class="mb-3">
                <label for="Username" class="form-label">Username</label>
                <div class="input-group input-group-merge">
                  <input type="text" class="form-control" id="Username" name="Username" placeholder="Enter your username" autofocus />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-check"></i><i
                      class="bx bx-x"></i></span>
                </div>
                <span id="usernameError" class="error"></span>
              </div>
              <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <div class="input-group input-group-merge">
                  <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter your email" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-check"></i><i
                      class="bx bx-x"></i></span>
                </div>
                <span id="emailError" class="error"></span>
              </div>
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="Password">Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="Password" class="form-control" name="Password1"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-check"></i><i
                      class="bx bx-x"></i></span>
                </div>
                <span id="passwordError" class="error"></span>
              </div>
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="ConfirmPassword">Confirm Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="ConfirmPassword" class="form-control" name="Password2"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="ConfirmPassword" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-check"></i><i
                      class="bx bx-x"></i></span>
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
              <input class="btn btn-primary d-grid w-100" type="submit" name="submit" value="Register"/>
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

</main>
<?php endContainer($path, " "); ?>