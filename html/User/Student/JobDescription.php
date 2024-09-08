<?php
$path = "../..";
$user = "Student";

require "$path/functions/basic.php";
startContainer($path, $user);
?>
<main>
    <?php include "$path/Component/JobDescription.php"; ?>
</main>
<?php endContainer($path); ?>