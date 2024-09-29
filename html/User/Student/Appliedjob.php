<?php
$path = "../..";
$user = "Student";

require_once "$path/Function/Basic.php";
startContainer($path, $user);
?>
<main>
  <?php AppliedJobList($user); ?>
</main>
<?php endContainer($path); ?>