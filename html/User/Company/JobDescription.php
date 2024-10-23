<?php
$path = "../..";
$user = "Company";

require_once "$path/Function/Basic.php";
startContainer($path, $user);
?>
<main>

<div id="jobDescription" style="display: block;">
    <?php include "$path/Component/JobDescription.php"; ?>
</div>

<div id="jobDescriptionEdit" style="display: none;">
    <?php include "$path/Component/JobDescriptionEdit.php"; ?>
</div>

</main>
<?php endContainer($path); ?>
