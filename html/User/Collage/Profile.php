<?php
$path = "../..";
$user = "Collage";

require_once "$path/Function/Basic.php";
startContainer($path, $user);
?>

<body>
  <div class="col-xll-6">

    <div class="nav-align-top mb-4 full-screen-center mt-5 ms-5 me-5">
      <ul class="nav nav-tabs nav-fill mb-5" role="tablist">
        <li class="nav-item m-3">
          <button type="button" class="nav-link active text-primary" role="tab" data-bs-toggle="tab"
            data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
            <i class="bx bxs-user-detail display-6"></i> Company Overview
            <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">3</span>
          </button>
        </li>
        <li class="nav-item  m-3">
          <button type="button" class="nav-link text-primary" role="tab" data-bs-toggle="tab"
            data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false">
            <i class="bx bxs-graduation"></i> Job and Placement Details

          </button>
        </li>
        <li class="nav-item  m-3">
          <button type="button" class="nav-link text-primary" role="tab" data-bs-toggle="tab"
            data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages" aria-selected="false">

            <i class="tf-icons bx bx-link"></i> Placement and Contact Information

          </button>
        </li>
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
              <form id="formAccountSettings" method="POST">
                <div class="row">

                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Company Name
                    </label>
                    <input class="form-control" type="text" id="firstName" name="Company Name"
                      placeholder="Company Name" autofocus />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="Company_URL" class="form-label">Company URL
                    </label>
                    <input class="form-control" type="text" id="Company_URL" name="Company_URL"
                      placeholder="Company URL" autofocus />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Company Address

                    </label>
                    <input class="form-control" type="text" name="lastName" id="lastName"
                      placeholder="Company Address" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Contact Information
                    </label>
                    <input class="form-control" type="text" name="lastName" id="lastName" placeholder="Enter Contact Information
" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">Industry Sector
                    </label>
                    <div class="input-group input-group-merge">

                      <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                        placeholder="Industry Sector" />
                    </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Company Overview
                    </label>
                    <input class="form-control" type="text" id="" name="" placeholder="Company Overview
" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="organization" class="form-label">Top Clients or Partners
                    </label>
                    <input type="text" class="form-control" id="organization" name="organization" placeholder="Top Clients or Partners
" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="">Company Achievements and Awards
                    </label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"></span>
                      <input type="text" id="Company Achievements and Awards
" name="Company Achievements and Awards
" class="form-control" placeholder="Company Achievements and Awards
" />
                    </div>
                  </div>


                  <div class="mb-3 col-md-6">
                    <label for="language" class="form-label">Language</label>
                    <select id="language" class="select2 form-select">
                      <option value="">Select Language</option>
                      <option value="en">English</option>
                      <option value="fr">Gujarati</option>
                      <option value="de">Hindi</option>
                      <option value="pt">Sanskrit</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-secondary">Edit</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /Account -->
          </div>
        </div>

        <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
          <div class="card">
            <!-- Notifications -->
            <div class="col-xl">
              <div class="card mb-4">
                <form>
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Job and Placement Details
                    </h5>
                    <small class="text-muted float-end"></small>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-name">Available Roles for Placement
                      </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="basic-default-name" placeholder="" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-company">Job Location
                      </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="basic-default-company" placeholder="" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-email">Eligibility Criteria
                      </label>
                      <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                          <input type="text" id="basic-default-email" class="form-control" placeholder=""
                            aria-label="john.doe" aria-describedby="basic-default-email2" />

                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-phone">Recruitment Process
                      </label>
                      <div class="col-sm-10">
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" placeholder=""
                          aria-label="658 799 8941" aria-describedby="basic-default-phone" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-message">Compensation Details
                      </label>
                      <div class="col-sm-10">
                        <textarea id="basic-default-message" class="form-control" placeholder=""
                          aria-label="Hi, Do you have a moment to talk Joe?"
                          aria-describedby="basic-icon-default-message2"></textarea>
                      </div>
                    </div>
                    <div class="row justify-content-end">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-secondary">Edit</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </div>
                  </div>
              </div>
              </form>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
          <div class="card">
            <!-- Notifications -->
            <div class="col-xl">
              <div class="card mb-4">
                <form>
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Placement and Contact Information
                    </h5>
                    <small class="text-muted float-end"></small>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-name">Internship Opportunities

                      </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="basic-default-name" placeholder="" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-company">Company Representative for
                        Placement

                      </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="basic-default-company" placeholder="" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-email">Employee Testimonials or Success
                        Stories
                      </label>
                      <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                          <input type="text" id="basic-default-email" class="form-control" placeholder=""
                            aria-label="john.doe" aria-describedby="basic-default-email2" />

                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-end">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-secondary">Edit</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>

                    </div>
                  </div>
              </div>
              </form>
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