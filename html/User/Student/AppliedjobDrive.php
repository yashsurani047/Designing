<?php
$path = "../..";
$user = "Student";

require_once "$path/Function/Basic.php";
startContainer($path, $user);
?>
<main>
  <?php JobList($user,$path,"applied"); ?>
</main>
<?php endContainer($path); ?>