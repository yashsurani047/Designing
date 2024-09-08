<?php
$path = "../..";
$user = "Student";

require "$path/functions/basic.php";
require "$path/functions/table.php";
startContainer($path, $user);
?>
<main>
  <?php JobDrives($user,$path); ?>
</main>
<?php endContainer($path); ?>