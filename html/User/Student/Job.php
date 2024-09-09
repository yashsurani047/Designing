<?php
$path = "../..";
$user = "Student";

require "$path/functions/basic.php";
require "$path/functions/table.php";
startContainer($path, $user);
?>
<main>
  <?php JobList($user); ?>
</main>
<?php endContainer($path); ?>