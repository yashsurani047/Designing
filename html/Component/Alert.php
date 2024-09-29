<?php

function getAlert($user)
{
    if ($user == "Guest") {
        $arr = array("", "", "");
        return $arr;
    }
    $arr = array("", "", "update");
    $arr = array("", "verify", "");
    //$arr = array("login","verify","update");
    return $arr;
}
function AddAlert($user)
{
    if ($user == "") {
        return;
    }
    $alert = getAlert($user);
    if ($alert[0] == "login") {
        echo "
  <div class='alert alert-success alert-dismissible' role='alert'>
  Hello USERNAME: " . $user . ", You Logged in Successfully!
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>
    ";
    }
    if ($alert[1] == "verify") {
        echo "
<div class='alert alert-danger alert-dismissible' role='alert'>
Please Verify the Sensitive Information in Your Profile! <a href='Profile.php'>Click Here.</a>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>
    ";
    }
    if ($alert[2] == "update") {
        echo "
<div class='alert alert-warning alert-dismissible' role='alert'>
Please Update & Verify " . $user . " Information in Your Profile! <a href='Profile.php'>Click Here.</a>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>
    ";
    }
}
