<?php

// require_once "temp1.php";

// echo "printing";
// include_once "temp1.php";
// // Example usage
require_once "$path/Function/Basic.php";
$instance = new Database();
// $instance->success("Operation completed successfully!","http://localhost/Designing/html"); // Go back 2 pages
// // $instance->error("An error occurred.", "errorPage.php"); // Redirect to an error page

// // To retrieve and display messages
// if ($errorMsg = $instance->getTempData("error")) {
//     $instance->alert($errorMsg);
// }
// if ($successMsg = $instance->getTempData("success")) {
//     $instance->alert($successMsg);
// }

print_r($instance->CheckUser("darahan95580@gmail.com"));