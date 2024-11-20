<?php
$path = "..";
$user = "Student";

require_once "$path/Function/Basic.php";

startContainer($path, $user);
?>
<main>

<div id="jobDescription" style="display: block;">
    <?php include "$path/Component/JobDescription.php"; ?>
</div>

</main>
<?php endContainer($path); ?>
