<?php
$path = "..";
require_once "$path/Function/Basic.php";

$user = $_SESSION["Usertype"];

startContainer($path, $user);
?>
<main>
    <?php if($_GET['table'] == "Jobs"): ?>
        <div id="jobDescription" style="display: block;">
        <?php include "$path/Component/JobDescription.php"; ?>
        </div>
    <?php endif; ?>
    <?php if($_GET['table'] == "studentprofile"): ?>
        <div id="jobDescription" style="display: block;">
        <?php include "$path/Component/studentprofile.php"; ?>
        </div>
    <?php endif; ?>
    <?php if($_GET['table'] == "applied"): ?>
        <div id="jobDescription" style="display: block;">
        <?php include "$path/Component/studentprofile.php"; ?>
        <script>document.querySelectorAll('input').forEach(input => input.disabled = true);</script>
        </div>
    <?php endif; ?>
</main>
<?php endContainer($path); ?>
