<?php
$path = ".";
$user = "Guest";
require_once("Function/Basic.php");
startContainer($path, $user);
?>
<main>
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">
						<div class="hero-copy">
	                        <h2 class="hero-title mt-0">Empowering Placements, Connecting Futures</h2>
	                        <p class="hero-paragraph">"PlacementPlus streamlines the placement process, connecting students, colleges, and companies effortlessly. We ensure smooth recruitment, making talent discovery and career growth easier for all.</p>
	                        
							<div class="hero-cta">
								<a class="button button-primary" href="Authentication/College">Want to Companies for Students?</a>
							</div>
							<br>
							<div class="hero-cta">
								<a class="button button-primary" href="Authentication/Company">Want to Hire?</a>
								<a class="button button-primary" href="Authentication/Student">Want A Job?</a>
							</div>
							<br>
							<div class="lights-toggle">
									<input id="lights-toggle" type="checkbox" name="lights-toggle" class="switch" checked="checked">
									<label for="lights-toggle" class="text-xs"><span>Turn me <span class="label-text">dark</span></span></label>
								</div>
						</div>
						<div class="hero-media">
							<div class="header-illustration">
								<img class="header-illustration-image asset-light" src="dist/images/header-illustration-light.svg" alt="Header illustration">
								<img class="header-illustration-image asset-dark" src="dist/images/header-illustration-dark.svg" alt="Header illustration">
							</div>
							<div class="hero-media-illustration">
								<img class="hero-media-illustration-image asset-light" src="dist/images/hero-media-illustration-light.svg" alt="Hero media illustration">
								<img class="hero-media-illustration-image asset-dark" src="dist/images/hero-media-illustration-dark.svg" alt="Hero media illustration">
							</div>
							<div class="hero-media-container">
								<img class="hero-media-image asset-light" src="dist/images/landingImage1.jpg" height="500px" width="500px" alt="Hero media">
								<img class="hero-media-image asset-dark" src="dist/images/landingImage2.jpg" height="500px" width="500px" alt="Hero media">
							</div>
						</div>
                    </div>
                </div>
            </section>

            <section class="features section">
                <div class="container">
					<div class="features-inner section-inner has-bottom-divider">
						<div class="features-header text-center">
							<div class="container-sm">
								<h2 class="section-title mt-0">Verified Jobs</h2>
	                            <p class="section-paragraph">Access a curated list of verified job opportunities from trusted companies. Every listing is thoroughly checked to ensure authenticity, offering students a safe and reliable pathway to employment..</p>
								<div class="features-image">
									<img class="features-illustration asset-dark" src="dist/images/features-illustration-dark.svg" alt="Feature illustration">
									<img class="features-box asset-dark" src="dist/images/4.avif" alt="Feature box" >
									<img class="features-illustration asset-dark" src="dist/images/features-illustration-top-dark.svg" alt="Feature illustration top">
									<img class="features-illustration asset-light" src="dist/images/features-illustration-light.svg" alt="Feature illustration">
									<img class="features-box asset-light" src="assets\img\backgrounds\PlacementPlusLogo.png" height="500px" width="400px" alt="Feature box">
									<img class="features-illustration asset-light" src="dist/images/features-illustration-top-light.svg" alt="Feature illustration top">
								</div>
							</div>
                        </div>
                        <div class="features-wrap">
                            <div class="feature is-revealing">
                                <div class="feature-inner">
                                    <div class="feature-icon">
										<img class="asset-light" src="dist/images/feature-01-light.svg" alt="Feature 01">
										<img class="asset-dark" src="dist/images/feature-01-dark.svg" alt="Feature 01">
                                    </div>
									<div class="feature-content">
                                    	<h3 class="feature-title mt-0">Verified Opportunities</h3>
                                    	<p class="text-sm mb-0">Explore job listings from trusted companies, verified to ensure authenticity and reliability.</p>
									</div>
								</div>
                            </div>
							<div class="feature is-revealing">
                                <div class="feature-inner">
                                    <div class="feature-icon">
										<img class="asset-light" src="dist/images/feature-02-light.svg" alt="Feature 02">
										<img class="asset-dark" src="dist/images/feature-02-dark.svg" alt="Feature 02">
                                    </div>
									<div class="feature-content">
                                    	<h3 class="feature-title mt-0">Easy Application Process</h3>
                                    	<p class="text-sm mb-0">Apply to jobs effortlessly with a streamlined registration and approval system for students and colleges.</p>
									</div>
								</div>
                            </div>
							<div class="feature is-revealing">
                                <div class="feature-inner">
                                    <div class="feature-icon">
										<img class="asset-light" src="dist/images/feature-03-light.svg" alt="Feature 03">
										<img class="asset-dark" src="dist/images/feature-03-dark.svg" alt="Feature 03">
                                    </div>
									<div class="feature-content">
                                    	<h3 class="feature-title mt-0">Instant Notifications</h3>
                                    	<p class="text-sm mb-0">Receive real-time alerts for new job postings, placement drives, and important updates directly to your dashboard.</p>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        
<?php endContainer($path); ?>

<link href="https://fonts.googleapis.com/css?family=Heebo:400,700|IBM+Plex+Sans:600" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/style.css">
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
<script src="dist/js/main.min.js"></script>
