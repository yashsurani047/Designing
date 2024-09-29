<?php
$path = "..";
$user = "Guest";
header("location:login.php"); exit();

require_once "$path/Function/Basic.php";

startContainer($path, $user);
?>
<main>
    <center>
        <h2>Who Are You? </h2><br>
        <a href="Student" class="btn btn-primary">Student</a>
    <a href="Collage" class="btn btn-primary">Collage/University Co-ordinator</a>
    <a href="Company" class="btn btn-primary">Company</a>
    <a href="Admin" class="btn btn-primary">Administrator</a>
    </center>
</main>
<?php endContainer($path); ?>