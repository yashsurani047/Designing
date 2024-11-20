<?php
$path = "..";
$user = "Guest";
include_once "$path/Function/Basic.php";
include_once "$path/Function/Database.php";
$db = new Basic();
$db = new Database();
startContainer($path, "");
if (isset($_SESSION['TokenUserId']) && isset($_SESSION['TokenTimestamp'])) {
    $sessionTime = $_SESSION['TokenTimestamp'];
    $currentTime = time(); // Current timestamp
    $timeDifference = $currentTime - $sessionTime;

    // If more than 10 minutes (600 seconds), expire the session
    if ($timeDifference > 5) {  // 600 seconds = 10 minutes
        session_unset(); // Unset all session variables
        session_destroy();
        ?><center>Session expired. Please <a href="verify.php">Verify Again</a></center><?php
    } else {
        // Session is still valid, continue with your code
        echo "Session is valid. Continue with your flow.";
        ?>
        
<head>
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- For Icons -->
   <style>
       /* General body styling */
       body {
           font-family: Arial, sans-serif;
           background-color: #f4f7f8;
           display: flex;
           justify-content: center;
           align-items: center;
           height: 100vh;
           margin: 0;
       }

       /* Form container styling */
       .form-container {
           background-color: #fff;
           padding: 30px;
           border-radius: 8px;
           box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
           max-width: 400px;
           width: 100%;
       }

       .form-container h2 {
           text-align: center;
           color: #333;
           margin-bottom: 20px;
       }

       /* Input field styling */
       .form-container input[type="text"] {
           width: 100%;
           padding: 15px;
           margin: 10px 0;
           border: 1px solid #ddd;
           border-radius: 6px;
           box-sizing: border-box;
           font-size: 16px;
       }

       /* Submit button styling */
       .form-container input[type="submit"] {
           width: 100%;
           padding: 15px;
           background-color: #007bff;
           color: white;
           border: none;
           border-radius: 6px;
           font-size: 18px;
           cursor: pointer;
           transition: background-color 0.3s;
       }

       .form-container input[type="submit"]:hover {
           background-color: #0056b3;
       }

       /* Icon styling inside input */
       .form-container .input-icon {
           position: relative;
       }

       .form-container .input-icon input {
           padding-left: 40px;
       }

       .form-container .input-icon i {
           position: absolute;
           left: 10px;
           top: 50%;
           transform: translateY(-50%);
           color: #aaa;
       }
   </style>
</head>
<body>
   <div class="form-container">
       <h2>Change Password</h2>
       <form action="../Function/Submit.php" method="post">
           <div class="input-icon">
               <i class="fas fa-lock"></i> <!-- Lock icon from Font Awesome -->
               <input type="text" name="newPass" placeholder="Enter New Password" required>
           </div>
           <input type="hidden" name="submit" value="ChangePass">
           <input type="submit" value="Change Password">
       </form>
   </div>
</body>
</html>

        <?php
    }
} else {
    echo "No active session found. Please ";
    ?>
        <a href="verify.php">Verify Your OTP</a>
    <?php
}
?>