<?php
$path = ".";
$user = "Guest";

require_once "$path/Function/Basic.php";
startContainer($path, $user);
?>
<main>
<?php

  // Include PHPMailer classes
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/Exception.php';
  require 'PHPMailer/PHPMailer.php';
  require 'PHPMailer/SMTP.php';

  // Database connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "placementplus";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Check if form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Get form data
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $message = mysqli_real_escape_string($conn, $_POST['message']);

      // Insert data into the database
      $sql = "INSERT INTO ContactUs (name, email, message) VALUES ('$name', '$email', '$message')";

      if ($conn->query($sql) === TRUE) {
          // Prepare email to be sent using PHPMailer
          $mail = new PHPMailer(true);

          try {
              //Server settings
              $mail->isSMTP();
              $mail->Host       = 'smtp.google.com'; // Set your SMTP server
              $mail->SMTPAuth   = true;
              $mail->Username   = 'placementplus0@gmail.com'; // SMTP username
              $mail->Password   = 'pjlpcsccakyejgro';          // SMTP password
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
              $mail->Port       = 587;

              //Recipients
              $mail->setFrom('placementplus0@gmail.com', 'Placement Plus');
              $mail->addAddress($email, $name);  // Send email to the user who submitted the form

              // Content
              $mail->isHTML(true);                                  // Set email format to HTML
              $mail->Subject = 'Thank You for Contacting Placement Plus';
              $mail->Body    = "Dear $name,<br><br>Thank you for getting in touch with us. We have received your message:<br><br><b>$message</b><br><br>We will get back to you as soon as possible.<br><br>Best Regards,<br>Placement Plus Team";
              
              // Send the email
              $mail->send();
              echo 'Message has been sent. You will receive a confirmation email.';
          } catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      // Close the database connection
      $conn->close();
  }
?>

<form action="" method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Your Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Your Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
  </div>
  <div class="mb-3">
    <label for="message" class="form-label">Your Message</label>
    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Send Message</button>
</form>


</main>
<?php endContainer($path); ?>