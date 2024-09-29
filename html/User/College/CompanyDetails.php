<?php
$path = "../..";
$user = "College";

require_once "$path/Function/Basic.php";
startContainer($path, $user);
?>
<main>
    <?php include "$path/Component/JobDescription.php"; ?>
</main>
<?php endContainer($path); ?>