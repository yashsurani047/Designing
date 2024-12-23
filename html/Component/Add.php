<?php
$path = "..";
require_once "$path/Function/Basic.php";
$user = $_SESSION["Usertype"];

startContainer($path, $user);
?>
<main>
    <?php if($_GET['table'] == "Jobs"): ?>
        <div id="jobDescription" style="display: block;">
        <?php include "JobDescriptionEdit.php"; ?>
        </div>
    <?php endif; ?>
</main>
<?php endContainer($path); ?>