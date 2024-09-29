<head>
    <!-- Favicon -->
    <link rel='icon' type='image/x-icon' href='<?php echo $path ?>/assets/img/favicon/favicon.ico' />

    <!-- Fonts -->
    <link rel='preconnect' href='https://fonts.googleapis.com' />
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin />
    <link
        href='https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap'
        rel='stylesheet' />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel='stylesheet' href='<?php echo $path ?>/assets/vendor/fonts/boxicons.css' />
    
    <!-- CDNs-->
    <link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css' />
    <link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css' />

    <!-- Core CSS -->
    <link rel='stylesheet' href='<?php echo $path ?>/assets/vendor/css/core.css' class='template-customizer-core-css' />
    <link rel='stylesheet' href='<?php echo $path ?>/assets/vendor/css/theme-default.css'
        class='template-customizer-theme-css' />
    <link rel='stylesheet' href='<?php echo $path ?>/assets/css/demo.css' />

    <!-- Vendors CSS -->
    <link rel='stylesheet' href='<?php echo $path ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css' />


    <!-- Page CSS -->
    <!-- Page -->
    <link rel='stylesheet' href='<?php echo $path ?>/assets/vendor/css/pages/page-auth.css' />


    <!-- Helpers -->
    <script src='<?php echo $path ?>/assets/vendor/js/helpers.js'></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src='<?php echo $path ?>/assets/js/config.js'></script>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src='<?php echo $path ?>/assets/vendor/libs/jquery/jquery.js'></script>
    <script src='<?php echo $path ?>/assets/vendor/libs/popper/popper.js'></script>
    <script src='<?php echo $path ?>/assets/vendor/js/bootstrap.js'></script>
    <script src='<?php echo $path ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'></script>

    <script src='<?php echo $path ?>/assets/vendor/js/menu.js'></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src='<?php echo $path ?>/assets/vendor/libs/apex-charts/apexcharts.js'></script>

    <!-- Main JS -->
    <script src='<?php echo $path ?>/assets/js/main.js'></script>

    <!-- Page JS -->
    <script src='<?php echo $path ?>/assets/js/dashboards-analytics.js'></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src='https://buttons.github.io/buttons.js'></script>

    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'
        integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo'
        crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'
        integrity='sha384-UO2eT0CpHqdSJQ6hJTYo2MsMefpH84eiEFBzHgIhC9H7PRZ8mEcfM/sFJpDYLj5'
        crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'
        integrity='sha384-smHYkd38cqh8yg8pP+RZTyk84PzvBvR1zIvIVLDg6TA11UyV8Viw7moJo4Wl30J2'
        crossorigin='anonymous'></script>

    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ775/zr03cJIHq5qvIF5t47OVeF5XaXIMr' crossorigin='anonymous'>

    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'
        integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo'
        crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'
        integrity='sha384-UO2eT0CpHqdSJQ6hJTYo2MsMefpH84eiEFBzHgIhC9H7PRZ8mEcfM/sFJpDYLj5'
        crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'
        integrity='sha384-smHYkd38cqh8yg8pP+RZTyk84PzvBvR1zIvIVLDg6TA11UyV8Viw7moJo4Wl30J2'
        crossorigin='anonymous'></script>


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