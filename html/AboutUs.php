<?php
$path = ".";
$user = "Guest";

require "$path/functions/basic.php";
startContainer($path, $user);
?>
<main>
<style>
    /* Basic Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Open Sans', sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
    color: #333;
}

/* Container */
.container {
    width: 80%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Header Section */
header {
    background-color:silver;
    color: white;
    padding: 20px 0;
    text-align: center;
}

header h1 {
    font-size: 3em;
}

/* About Section */
.about-section {
    background-color: white;
    padding: 40px 20px;
    margin: 20px 0;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.about-section h2 {
    color: #004aad;
    margin-bottom: 10px;
}

.about-section p {
    margin-bottom: 20px;
}

.about-section ul {
    list-style-type: square;
    margin-left: 20px;
}

.about-section ul li {
    margin-bottom: 10px;
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About Us - PlacementPlus </title>
    
</head>
<body>
    <header>
        <div class="container">
            <h1>About Us</h1>
        </div>
    </header>

    <section class="about-section">
        <div class="container">
            <h2>Who We Are</h2>
            <p>At <strong>PlacementPlus</strong>, we are a dedicated team focused on bridging the gap between students and their dream careers. As a student-led initiative from <strong>RK University</strong>, we understand the challenges faced by students when it comes to placement opportunities.</p>

            <h2>Our Mission</h2>
            <p>We aim to create a seamless placement experience for students by connecting them with top recruiters across industries. Our mission is to empower students with the tools and resources they need to kick-start their careers in today’s competitive job market.</p>

            <h2>What We Do</h2>
            <ul>
                <li><strong>Student Profile Management:</strong> Create a professional portfolio that highlights your skills and achievements.</li>
                <li><strong>Job & Internship Listings:</strong> Access opportunities from leading companies and start-ups in various sectors.</li>
                <li><strong>Training Resources:</strong> We offer interview preparation, resume building tips, and workshops to boost your chances of success.</li>
                <li><strong>Real-Time Updates:</strong> Stay informed with live job postings, application deadlines, and placement notifications.</li>
            </ul>

            <h2>Why Choose Us</h2>
            <p>We offer a <strong>student-centric approach</strong> designed specifically with students in mind. Our <strong>wide network of recruiters</strong> and <strong>end-to-end placement support</strong> ensures you have everything needed to succeed.</p>

            <h2>Our Vision</h2>
            <p>Our vision is to become a trusted platform for students to launch their professional journeys. We believe that with the right opportunities and preparation, every student can reach their full potential.</p>
        </div>
    </section>
</body>
</html>

</main>
<?php endContainer($path); ?>