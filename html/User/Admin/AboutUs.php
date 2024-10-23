<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Placement Plus</title>
    <link rel="stylesheet" href="assets/css/AboutUs.css">
</head>
<body>
   
<?php require_once "$path/Function/Basic.php"; ?>
<?php
  $path = "../..";  // Base path for assets and includes
  $user = "Admin";  // Logged-in user name, if needed

  require_once "$path/Function/Basic.php";
  startContainer($path, $user);
?>
<head>
  <title>About Us - Placement Plus</title>
</head>
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title text-primary">About Us</h1>
          <p class="card-text">
            <strong>Welcome to Placement Plus!</strong> <br>
            Founded in <strong>2024</strong>, Placement Plus has quickly become a leading provider of global placement solutions, connecting talent with top companies across <strong>India</strong>. 
            Our mission is to bridge the gap between job seekers and organizations, ensuring that the right talent finds the right opportunities, no matter the industry or location.
          </p>

          <h3 class="text-secondary">Our Mission</h3>
          <p class="card-text">
            At Placement Plus, we believe in providing seamless and high-quality placement services. Our goal is to help individuals reach their career goals while helping organizations find the talent they need to succeed in today's competitive world.
          </p>

          <h3 class="text-secondary">What We Offer</h3>
          <p class="card-text">
            We specialize in providing:
          </p>
          <ul>
            <li>Global placement services across India and beyond.</li>
            <li>Expert career guidance and personalized job search support.</li>
            <li>Strong partnerships with leading companies in various industries.</li>
            <li>Access to exclusive job listings and placement opportunities.</li>
            <li>A professional and dedicated team committed to your success.</li>
          </ul>

          <h3 class="text-secondary">Our Values</h3>
          <p class="card-text">
            We are committed to the following core values:
          </p>
          <ul>
            <li><strong>Integrity:</strong> We build trust through honesty and transparency.</li>
            <li><strong>Excellence:</strong> We strive for the highest standards in everything we do.</li>
            <li><strong>Commitment:</strong> We are dedicated to the success of our clients and candidates.</li>
            <li><strong>Innovation:</strong> We constantly improve our services to meet evolving needs.</li>
          </ul>

          <h3 class="text-secondary">Join Us on Our Journey</h3>
          <p class="card-text">
            Whether you're a job seeker looking for the perfect role or a company searching for top talent, Placement Plus is here to help you achieve your goals. Together, we can shape a better future.
          </p>

          <p class="card-text">
            <strong>Contact us today</strong> to learn more about our services and how we can assist you!
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endContainer($path); ?>


</body>
</html>
