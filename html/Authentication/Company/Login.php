<?php
$path = "../..";
$user = "Company";

require "$path/functions/basic.php";
startContainer($path, "");
?>
<main>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <!-- SVG for Logo -->
                                    <!-- Same SVG code from your example -->
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder">Placement Plus</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2"><strong><?php echo $user; ?></strong></h4>
                        <p class="mb-4">Please sign-in to your account</p>

                        <form id="loginForm" class="mb-3" action="index.html" method="POST" onsubmit="return validateForm()">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email or Username</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email or username" autofocus />
                                <span id="emailError" class="error"></span>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    <a href="./ForgetPassword.php">
                                        <small>Forgot Password?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control"   xname="password" placeholder="•••••••••••••••" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <span id="passwordError" class="error"></span>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary d-grid w-100">Sign in</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="./Register.php">
                                <span>Create an account</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
    <!-- / Content -->
</main>
<?php endContainer($path, " "); ?>    

<script>
    function validateForm() {
        // Clear previous errors
        document.querySelectorAll('.error').forEach(e => e.innerText = "");

        let valid = true;

        // Email or Username validation
        let email = document.getElementById('email').value;
        if (email === "") {
            document.getElementById('emailError').innerText = "Email or Username is required";
            valid = false;
        }

        // Password validation
        let password = document.getElementById('password').value;
        if (password === "") {
            document.getElementById('passwordError').innerText = "Password is required";
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
