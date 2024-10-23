<?php
$path = "../..";
$user = "Student";

require_once "$path/Function/Basic.php";
require_once "$path/Function/Database.php";
startContainer($path, $user);

$db = new Database();
$profile = $db->Execute("select * from studentprofile where User_Id = " . $_SESSION['Userid']);
if ($profile != null) {
  $First_Name = $profile["First_Name"];
  $Last_Name = $profile["Last_Name"];
  $Father_Name = $profile["Father_Name"];
  $Parent_Number = $profile["Parent_Number"];
  $Email = $profile["Email"];
  $Stream = $profile["Stream"];
  $Phone_Number = $profile["Phone_Number"];
  $Address = $profile["Address"];
  $State = $profile["State"];
  $Zip_Code = $profile["Zip_Code"];
  $Language = $profile["Language"];
} else {
  $First_Name = "";
  $Last_Name = "";
  $Father_Name = "";
  $Parent_Number = "";
  $Email = "";
  $Stream = "";
  $Phone_Number = "";
  $Address = "";
  $State = "";
  $Zip_Code = "";
  $Language = "";
}
?>

<body>
  <div class="col-xll-6">

    <div class="nav-align-top mb-4 full-screen-center mt-5 ms-5 me-5">
      <ul class="nav nav-tabs nav-fill mb-5" role="tablist">
        <li class="nav-item m-3">
          <button type="button" class="nav-link active text-primary" role="tab" data-bs-toggle="tab"
            data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
            <i class="bx bxs-user-detail display-6"></i> Basic Information
            <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">3</span>
          </button>
        </li>
        <li class="nav-item  m-3">
          <button type="button" class="nav-link text-primary" role="tab" data-bs-toggle="tab"
            data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false">
            <i class="bx bxs-graduation"></i> Qulifications
          </button>
        </li>
        <!-- <li class="nav-item  m-3">
          <button type="button" class="nav-link text-primary" role="tab" data-bs-toggle="tab"
            data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages" aria-selected="false">
            <i class="tf-icons bx bx-link"></i> Connections
          </button>
        </li> -->
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
          <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <div class="card-body">
  <?php
  $db = new Database();

  // Default image path
  $defaultAvatar = 'Profile/1.png'; // Update this path according to your project structure
  
  // Check if the user is logged in by checking if 'Email' is set in the session
  if (isset($_SESSION['Email'])) {
    $userEmail = $_SESSION['Email'];

    // Fetch the user details from the users table, including the profile picture
    $query = "SELECT Id, Image FROM users WHERE Email = '$userEmail'";
    $user = $db->fetch($query);

    if ($user && isset($user['Id'])) {
      $userId = $user['Id']; // Assign the user's Id from the users table
      
      // Check if a profile picture exists in the users table and if the file exists on the server
      if (!empty($user['Image']) && file_exists($user['Image'])) {
        $userAvatar = $user['Image'];
      } else {
        // Use default avatar if no image is uploaded or the image file doesn't exist
        $userAvatar = $defaultAvatar;
      }
    } else {
      echo "User not found in the users table.";
      exit;
    }
  } else {
    // If user is not logged in, redirect to login or show an error
    echo "User not logged in.";
    exit;
  }

  // Handle the file upload when the form is submitted
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_pic'])) {
    $image = $_FILES['profile_pic'];

    // Validate the file type and size
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($image['type'], $allowedTypes) || $image['size'] > 800000) {
      $error = "Invalid file type or size.";
    } else {
      // Define the upload directory and file path
      $uploadDir = 'Profile/';
      $fileName = basename($image['name']);
      $uploadFile = $uploadDir . $fileName;

      // Create the upload directory if it doesn't exist
      if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
      }

      // Move the uploaded file to the server
      if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
        // Update the user's profile picture path in the users table
        $query = "UPDATE users SET Image = '$uploadFile' WHERE Id = '$userId'";
        if ($db->update($query)) {
          // Refresh the page to show the new image
          $basic->success("Profile Photo Updated!");
        } else {
          $error = "Failed to update profile picture in the database.";
        }
      } else {
        $error = "Failed to upload the file.";
      }
    }
  }
  ?>
  <?php
$servername = "localhost"; // Database server
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "placementplus"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
// Include the database connection file

// Directory to upload files
$uploadDirectory = 'Student/Documents/';

// Check if the 'uploadSSC' button is clicked
if (isset($_POST['uploadSSC'])) {
    // Handle 10th Marksheet upload
    $tenthFile = $uploadDirectory . basename($_FILES['SSC_File']['name']);
    
    if (move_uploaded_file($_FILES['SSC_File']['tmp_name'], $tenthFile)) {
        $sql = "UPDATE studentprofile SET Tenth='$tenthFile' WHERE id=1"; // Adjust 'id=1' to your condition
        if (mysqli_query($conn, $sql)) {
            echo "10th Marksheet uploaded successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload 10th Marksheet.";
    }
}

// Check if the 'uploadHSC' button is clicked
if (isset($_POST['uploadHSC'])) {
    // Handle 12th Marksheet upload
    $twelfthFile = $uploadDirectory . basename($_FILES['HSC_File']['name']);
    
    if (move_uploaded_file($_FILES['HSC_File']['tmp_name'], $twelfthFile)) {
        $sql = "UPDATE studentprofile SET Twelth='$twelfthFile' WHERE id=1"; // Adjust 'id=1' to your condition
        if (mysqli_query($conn, $sql)) {
            echo "12th Marksheet uploaded successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload 12th Marksheet.";
    }
}

// Check if the 'uploadUG' button is clicked
if (isset($_POST['uploadUG'])) {
    // Handle Graduation Marksheet upload
    $ugFile = $uploadDirectory . basename($_FILES['UG_File']['name']);
    
    if (move_uploaded_file($_FILES['UG_File']['tmp_name'], $ugFile)) {
        $sql = "UPDATE studentprofile SET Ug='$ugFile' WHERE id=1"; // Adjust 'id=1' to your condition
        if (mysqli_query($conn, $sql)) {
            echo "Graduation Marksheet uploaded successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload Graduation Marksheet.";
    }
}

// Check if the 'uploadPG' button is clicked
if (isset($_POST['uploadPG'])) {
    // Handle Post Graduation Marksheet upload
    $pgFile = $uploadDirectory . basename($_FILES['PG_File']['name']);
    
    if (move_uploaded_file($_FILES['PG_File']['tmp_name'], $pgFile)) {
        $sql = "UPDATE studentprofile SET Pg='$pgFile' WHERE id=1"; // Adjust 'id=1' to your condition
        if (mysqli_query($conn, $sql)) {
            echo "Post Graduation Marksheet uploaded successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload Post Graduation Marksheet.";
    }
}

// Close the database connection
mysqli_close($conn);
?>


  <!-- Display the profile picture -->
  <img src="<?php echo $userAvatar; ?>" alt="Profile Picture"
    style="border-radius: 50%; border:solid blue; " width="150" height="150">

  <!-- File upload form -->
  <form method="POST" enctype="multipart/form-data">
    <label for="profile_pic">Choose Profile Picture:</label>
    <input type="file" name="profile_pic" id="profile_pic" required>
    <button type="submit" class="btn btn-primary">Upload</button>
  </form>

  <!-- Display any errors -->
  <?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
  <?php endif; ?>

  <!-- Display success message -->
  <?php if (isset($_GET['upload_success'])): ?>
    <p style="color: green;">Profile picture updated successfully!</p>
  <?php endif; ?>
</div>

            <hr class="my-0" />
            <div class="card-body">
              <form id="formAccountSettings" method="POST" action="<?php echo $path ?>/Function/submit.php">
                <div class="row">
                  <div class="row mb-3">
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="First_Name" class="form-label">First Name</label>
                    <input class="form-control" type="text" id="First_Name" name="First_Name"
                      value="<?php echo $First_Name ?>" placeholder="Enter First Name" autofocus />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="Last_Name" class="form-label">Last Name</label>
                    <input class="form-control" type="text" id="Last_Name" name="Last_Name"
                      value="<?php echo $Last_Name ?>" placeholder="Enter Last Name" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="Father_Name" class="form-label">Father Name</label>
                    <input class="form-control" type="text" id="Father_Name" name="Father_Name"
                      value="<?php echo $Father_Name ?>" placeholder="Enter Father Name" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="Parent_Number">Parents Number</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">IN (+91)</span>
                      <input type="text" id="Parent_Number" name="Parent_Number" class="form-control"
                        value="<?php echo $Parent_Number ?>" placeholder="90********" />
                    </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="Email" class="form-label">E-mail</label>
                    <input class="form-control" type="text" id="Email" name="Email" placeholder="example@gmail.com"
                      value="<?php echo $Email ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="Stream" class="form-label">Stream</label>
                    <input type="text" class="form-control" id="Stream" name="Stream" placeholder="MCA"
                      value="<?php echo $Stream ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="Phone_Number">Phone Number</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">IN (+91)</span>
                      <input type="text" id="Phone_Number" name="Phone_Number" class="form-control"
                        value="<?php echo $Phone_Number ?>" placeholder="90********" />
                    </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="Address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="Address" name="Address" placeholder="Address"
                      value="<?php echo $Address ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="State" class="form-label">State</label>
                    <input class="form-control" type="text" id="State" name="State" placeholder="Gujarat"
                      value="<?php echo $State ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="Zip_Code" class="form-label">Zip Code</label>
                    <input type="text" class="form-control" id="Zip_Code" name="Zip_Code" placeholder="360002"
                      value="<?php echo $Zip_Code ?>" maxlength="6" />
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="Language" class="form-label">Language</label>
                    <select id="Language" class="select2 form-select" name="Language"
                      selected="<?php echo $Language ?>">
                      <option value="">Select Language</option>
                      <option value="en" selected>English</option>
                      <option value="fr">Gujarati</option>
                      <option value="de">Hindi</option>
                      <option value="pt">Sanskrit</option>
                    </select>
                  </div>
                </div>
                <div class="mt-2">
                  <input type="hidden" class="btn btn-primary me-2" name="submit" value="Profile">
                  <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                  <button type="button" class="btn btn-secondary" onclick="return window.history.go(-1)">Back</button>
                </div>
              </form>
            </div>
            <!-- /Account -->
          </div>
        </div>
        <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
        <div class="card-body">
    <form action="<?php echo $path ?>/Function/Submit.php" method="post" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Upload 10th Marksheet</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter Your Total Marks" name="SSC" />
                    <input class="form-control" id="formFileMultiple" type="file" name="SSC_File">
                    <!-- Upload button for 10th Marksheet -->
                    <button class="btn btn-outline-primary" type="submit" name="uploadSSC">Upload 10th Marksheet</button>
                </div>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Upload 12th/Diploma Marksheet</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter Your Total Marks" name="HSC" />
                    <input class="form-control" id="formFileMultiple" type="file" name="HSC_File">
                    <!-- Upload button for 12th/Diploma Marksheet -->
                    <button class="btn btn-outline-primary" type="submit" name="uploadHSC">Upload 12th Marksheet</button>
                </div>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Graduation Marksheet</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter Your Graduation Percentage/CGPA" name="UG" />
                    <input class="form-control" id="formFileMultiple" type="file" name="UG_File">
                    <!-- Upload button for Graduation Marksheet -->
                    <button class="btn btn-outline-primary" type="submit" name="uploadUG">Upload Graduation Marksheet</button>
                </div>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Post Graduation Marksheet</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter Your Post Graduation Percentage/CGPA" name="PG" />
                    <input class="form-control" id="formFileMultiple" type="file" name="PG_File">
                    <!-- Upload button for Post Graduation Marksheet -->
                    <button class="btn btn-outline-primary" type="submit" name="uploadPG">Upload Post Graduation Marksheet</button>
                </div>
            </div>
        </div>

        <div class="mt-2">
            <button type="button" class="btn btn-secondary" onclick="return window.history.go(-1)">Back</button>
        </div>
    </form>
</div>

        </div>
        <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
          <div class="row">
            <div class="col-md-6 col-12 mb-md-0 mb-4">
              <div class="card">
                <h5 class="card-header">Connected Accounts</h5>
                <div class="card-body">
                  <p>Display content from your connected accounts on your site</p>
                  <!-- Connections -->
                  <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/google.png" alt="google" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">Google</h6>
                        <small class="text-muted">Calendar and contacts</small>
                      </div>
                      <div class="col-3 text-end">
                        <div class="form-check form-switch">
                          <input class="form-check-input float-end" type="checkbox" role="switch" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/slack.png" alt="slack" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">Slack</h6>
                        <small class="text-muted">Communication</small>
                      </div>
                      <div class="col-3 text-end">
                        <div class="form-check form-switch">
                          <input class="form-check-input float-end" type="checkbox" role="switch" checked />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/github.png" alt="github" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">Github</h6>
                        <small class="text-muted">Manage your Git repositories</small>
                      </div>
                      <div class="col-3 text-end">
                        <div class="form-check form-switch">
                          <input class="form-check-input float-end" type="checkbox" role="switch" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/mailchimp.png" alt="mailchimp" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">Mailchimp</h6>
                        <small class="text-muted">Email marketing service</small>
                      </div>
                      <div class="col-3 text-end">
                        <div class="form-check form-switch">
                          <input class="form-check-input float-end" type="checkbox" role="switch" checked />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/asana.png" alt="asana" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">Asana</h6>
                        <small class="text-muted">Communication</small>
                      </div>
                      <div class="col-3 text-end">
                        <div class="form-check form-switch">
                          <input class="form-check-input float-end" type="checkbox" role="switch" checked />
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Connections -->
                </div>
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="card">
                <h5 class="card-header">Social Accounts</h5>
                <div class="card-body">
                  <p>Display content from social accounts on your site</p>
                  <!-- Social Accounts -->
                  <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/facebook.png" alt="facebook" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                        <h6 class="mb-0">Facebook</h6>
                        <small class="text-muted">Not Connected</small>
                      </div>
                      <div class="col-4 col-sm-5 text-end">
                        <button type="button" class="btn btn-icon btn-outline-secondary">
                          <i class="bx bx-link-alt"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/twitter.png" alt="twitter" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                        <h6 class="mb-0">Twitter</h6>
                        <a href="https://twitter.com/Theme_Selection" target="_blank">@ThemeSelection</a>
                      </div>
                      <div class="col-4 col-sm-5 text-end">
                        <button type="button" class="btn btn-icon btn-outline-danger">
                          <i class="bx bx-trash-alt"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/instagram.png" alt="instagram" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                        <h6 class="mb-0">instagram</h6>
                        <a href="https://www.instagram.com/themeselection/" target="_blank">@ThemeSelection</a>
                      </div>
                      <div class="col-4 col-sm-5 text-end">
                        <button type="button" class="btn btn-icon btn-outline-danger">
                          <i class="bx bx-trash-alt"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/dribbble.png" alt="dribbble" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                        <h6 class="mb-0">Dribbble</h6>
                        <small class="text-muted">Not Connected</small>
                      </div>
                      <div class="col-4 col-sm-5 text-end">
                        <button type="button" class="btn btn-icon btn-outline-secondary">
                          <i class="bx bx-link-alt"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img src="<?php echo $path ?>/assets/img/icons/brands/behance.png" alt="behance" class="me-3"
                        height="30" />
                    </div>
                    <div class="flex-grow-1 row">
                      <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                        <h6 class="mb-0">Behance</h6>
                        <small class="text-muted">Not Connected</small>
                      </div>
                      <div class="col-4 col-sm-5 text-end">
                        <button type="button" class="btn btn-icon btn-outline-secondary">
                          <i class="bx bx-link-alt"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- /Social Accounts -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </>

  <!--  Footer Starts here-->

  <?php endContainer($path); ?>

  <!-- Footer Ends Here -->


</body>