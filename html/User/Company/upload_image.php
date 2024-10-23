<?php
include("./connection/connect.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_pic'])) {
    $user_id = $_SESSION['user_id']; // User ID from session
    
    // Handle image upload
    $image = $_FILES['profile_pic']['name'];
    $target_dir = "./images/Profile/";
    $target_file = $target_dir . basename($image);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a real image or fake
    $check = getimagesize($_FILES['profile_pic']['tmp_name']);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES['profile_pic']['size'] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
            // Update database with the new image path
            $query = "UPDATE users SET image='$image' WHERE u_id=$user_id";
            if (mysqli_query($db, $query)) {
                header("Location:Profile.php"); // Redirect back to profile page
            } else {
                echo "Error updating record: " . mysqli_error($db);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
