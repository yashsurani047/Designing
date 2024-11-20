<?php
function startContainer($path, $user = null){
    ?>
 <!DOCTYPE html>
  </head>
  <body>
    <?php head($path, $user) ?>
    <div class='layout-wrapper layout-content-navbar layout-without-menu'>
      <div class='layout-container'>
        <div class='layout-page'>
          <div class='content-wrapper'>
            <div class='container-xl flex-grow-1 container-p-y'>
              <!-- Content Start -->
 <?php
}
function endContainer($path, $nofooter = null){
    ?>
  <!-- Content End -->
  </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    if ($nofooter == null) {
        include_once "Footer.php";
      }
      echo "
      </body>
      </html>
      ";
}
function head($path, $user)
{
    include "HeadTag.php";
  if($user !== "") Navbar($path,$user);
} // Checked - may be change
function Navbar($path = "",$user)
{
  include_once "Navbar.php";
} // Empty