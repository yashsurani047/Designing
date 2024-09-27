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
    font-size: 2.5em;
}

/* Contact Section */
.contact-section {
    background-color: white;
    padding: 40px 20px;
    margin: 20px 0;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.contact-details {
    margin-bottom: 20px;
}

.contact-details h2 {
    color: #004aad;
}

.contact-details p {
    margin: 10px 0;
}

.contact-details a {
    color: #004aad;
    text-decoration: none;
}

/* Map Container */
.map-container {
    width: 100%;
    height: 400px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
}

/* Chat Box */
.chat-box {
    background-color: #f4f4f4;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.chat-box h2 {
    color: #004aad;
    margin-bottom: 10px;
}

.chat-area {
    background-color: white;
    padding: 10px;
    height: 150px;
    overflow-y: scroll;
    border: 1px solid #ccc;
    margin-bottom: 10px;
    border-radius: 8px;
}

#chat-input {
    width: 80%;
    padding: 10px;
    margin-right: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    padding: 10px 20px;
    background-color: #004aad;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #003b84;
}

    </style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact Us - PlacementPlus</title>
   
</head>
<body>
    <header>
        <div class="container">
            <h1>Contact Us</h1>
        </div>
    </header>

    <section class="contact-section">
        <div class="container">
            <div class="contact-details">
                <h2>Get in Touch</h2>
                <p><strong>Email:</strong> <a href="mailto:Contact@placementplus@gmail.com">Contact@placementplus@gmail.com</a></p>
                <p><strong>Address:</strong> Rajkot, Gujarat, India</p>
            </div>

            <!-- <div id="map" class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118147.82106511467!2d70.7388944931172!3d22.27346616666724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959c98ac71cdf0f%3A0x76dd15cfbe93ad3b!2sRajkot%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1727349036688!5m2!1sen!2sin" width="1050" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div> -->

            <div class="chat-box">
                <h2>Chat with Us</h2>
                <div class="chat-area" id="chat-area">
                    <p><strong>Executive:</strong> Welcome! How can I assist you today?</p>
                </div>
                <input type="text" id="chat-input" placeholder="Type your message here..." />
                <button onclick="sendMessage()">Send</button>
            </div>
        </div>
    </section>

    <script>
        function sendMessage() {
            var input = document.getElementById('chat-input').value;
            var chatArea = document.getElementById('chat-area');
            
            if (input.trim() !== "") {
                var userMessage = document.createElement('p');
                userMessage.innerHTML = "<strong>You:</strong> " + input;
                chatArea.appendChild(userMessage);
                document.getElementById('chat-input').value = ""; // Clear input after sending
            }
        }
    </script>
</body>
</html>

</main>
<?php endContainer($path); ?>