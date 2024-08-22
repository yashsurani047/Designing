<?php include "./functions/basic.php"; ?>
<?php include "./functions/Student.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Placement Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        .content {
            padding: 20px;
            background: #fff;
            margin-top: 20px;
        }
        h2 {
            color: #333;
        }
        p, ul {
            line-height: 1.6;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            margin-bottom: 10px;
        }
        ul li a {
            color: #0779e4;
            text-decoration: none;
        }
        ul li a:hover {
            text-decoration: underline;
        }
        
    </style>
</head>
<body>

<header>
    <div class="container">
    <?php headtag(); HeaderMain(); ?>
    </div>
</header>

<div class="container">
    <div class="content">
        <h2>General Inquiries</h2>
        <p>
            For general questions about our portal or services:
        </p>
        <ul>
            <li>Email: <a href="mailto:info@placementportal.com">info@placementportal.com</a></li>
            <li>Phone: <a href="tel:+11234567890">+1 (123) 456-7890</a></li>
        </ul>

        <h2>Support</h2>
        <p>
            Need help with your account or experiencing technical difficulties? Our support team is here to assist you.
        </p>
        <ul>
            <li>Email: <a href="mailto:support@placementportal.com">support@placementportal.com</a></li>
            <li>Phone: <a href="tel:+11234567891">+1 (123) 456-7891</a></li>
        </ul>

        <h2>Recruiters</h2>
        <p>
            Interested in recruiting students through our portal? Reach out to our partnership team for more information.
        </p>
        <ul>
            <li>Email: <a href="mailto:recruiters@placementportal.com">recruiters@placementportal.com</a></li>
            <li>Phone: <a href="tel:+11234567892">+1 (123) 456-7892</a></li>
        </ul>

        <h2>Students</h2>
        <p>
            If you're a student with questions about job listings, applications, or anything else, we're here to help.
        </p>
        <ul>
            <li>Email: <a href="mailto:students@placementportal.com">students@placementportal.com</a></li>
            <li>Phone: <a href="tel:+11234567893">+1 (123) 456-7893</a></li>
        </ul>

        <h2>Office Address</h2>
        <p>
            You can also visit us at our office:
        </p>
        <p>
            Placement Portal Inc.<br>
            123 Placement Avenue,<br>
            Suite 456, City, State, Zip Code
        </p>

        <h2>Business Hours</h2>
        <p>
            Our team is available during the following hours:
        </p>
        <ul>
            <li>Monday to Friday: 9:00 AM - 6:00 PM</li>
            <li>Saturday: 10:00 AM - 2:00 PM</li>
            <li>Sunday: Closed</li>
        </ul>

        <h2>Follow Us</h2>
        <p>
            Stay connected with us on social media for the latest updates:
        </p>
        <ul>
            <li>Facebook: <a href="https://www.facebook.com/placementportal" target="_blank">facebook.com/placementportal</a></li>
            <li>Twitter: <a href="https://www.twitter.com/placementportal" target="_blank">twitter.com/placementportal</a></li>
            <li>LinkedIn: <a href="https://www.linkedin.com/company/placementportal" target="_blank">linkedin.com/company/placementportal</a></li>
        </ul>
    </div>
</div>

<footer>
    <?php  Footer(); ?>
</footer>

</body>
</html>
