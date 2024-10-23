<?php
$path = "../..";
$user = "Admin";

require_once "$path/Function/Basic.php";
startContainer($path, $user);
?>
<?php
class Database {
    private $host = 'localhost';  // Database host
    private $user = 'root';       // Database username
    private $pass = '';           // Database password
    private $dbname = 'placementplus'; // Database name

    private $connection;
    
    // Constructor to initialize the connection when the class is instantiated
    public function __construct() {
        $this->connect();
    }

    // Function to connect to the database
    private function connect() {
        // Create a connection using MySQLi
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        // Check if the connection has any errors
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Function to fetch a single record
    public function fetch($query) {
        $result = $this->connection->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); // Fetch and return a single row
        } else {
            return null; // No rows found
        }
    }

    // Function to run update queries
    public function update($query) {
        return $this->connection->query($query); // Execute the update query
    }

    // Close the database connection
    public function __destruct() {
        $this->connection->close();
    }
}
?>

<main>
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
          <img src="<?php echo $userAvatar; ?>" alt="Profile Picture" style="border-radius: 50%; border:solid blue; "
            width="150" height="150">

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
          <form id="formAccountSettings" method="POST" onsubmit="return false">
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">First Name</label>
                <input class="form-control" type="text" id="firstName" name="firstName" placeholder="Enter First Name"
                  autofocus />
              </div>
              <div class="mb-3 col-md-6">
                <label for="lastName" class="form-label">Last Name</label>
                <input class="form-control" type="text" name="lastName" id="lastName" placeholder="Enter Last Name" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="lastName" class="form-label">Father Name</label>
                <input class="form-control" type="text" name="lastName" id="lastName" placeholder="Enter Father Name" />
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="phoneNumber">Parents Number</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text">IN (+91)</span>
                  <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                    placeholder="90********" />
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input class="form-control" type="text" id="email" name="email" placeholder="example@gmail.com" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="organization" class="form-label">Stream</label>
                <input type="text" class="form-control" id="organization" name="organization" placeholder="MCA" />
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="phoneNumber">Phone Number</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text">IN (+91)</span>
                  <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                    placeholder="90********" />
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="state" class="form-label">State</label>
                <input class="form-control" type="text" id="state" name="state" placeholder="Gujarat" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="zipCode" class="form-label">Zip Code</label>
                <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="360002"
                  maxlength="6" />
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
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Save changes</button>
              <button type="reset" class="btn btn-outline-secondary">Cancel</button>
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
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Qulifications</h5>
            </div>
            <div class="card-body">
              <form>
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">Enter Your 10th Persentage/CGPA</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"></span>
                    <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder=""
                      aria-label="" aria-describedby="basic-icon-default-fullname2" />
                  </div>
                </div>
                <div class="mb-3">
                  <h6><label for="formFileMultiple" class="form-label">Upload 10th Marksheet</label></h6>
                  <input class="form-control" type="file" id="formFileMultiple" multiple />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-company">Enter Your 12th Persentage/CGPA</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-company2" class="input-group-text"></span>
                    <input type="text" id="basic-icon-default-company" class="form-control" placeholder=""
                      aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                  </div>
                </div>
                <div class="mb-3">
                  <h6><label for="formFileMultiple" class="form-label">Upload 12th Marksheet</label></h6>
                  <input class="form-control" type="file" id="formFileMultiple" multiple />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-email">Enter Your Graduation Qulifications</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"></span>
                    <input type="text" id="basic-icon-default-email" class="form-control" placeholder="" aria-label=""
                      aria-describedby="basic-icon-default-email2" />

                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-phone">Enter Your Graduation Persentage/CGPA
                  </label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-phone2" class="input-group-text"></span>
                    <input type="text" id="basic-icon-default-phone" class="form-control phone-mask" placeholder=""
                      aria-label="" aria-describedby="basic-icon-default-phone2" />
                  </div>
                </div>
                <div class="mb-3">
                  <h6><label for="formFileMultiple" class="form-label">Upload Graduation Marksheet</label></h6>
                  <input class="form-control" type="file" id="formFileMultiple" multiple />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-email">Enter Your Post Graduation
                    Qulifications</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"></span>
                    <input type="text" id="basic-icon-default-email" class="form-control" placeholder="" aria-label=""
                      aria-describedby="basic-icon-default-email2" />

                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-phone">Enter Your Post-Graduation Persentage/CGPA
                  </label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-phone2" class="input-group-text"></span>
                    <input type="text" id="basic-icon-default-phone" class="form-control phone-mask" placeholder=""
                      aria-label="" aria-describedby="basic-icon-default-phone2" />
                  </div>
                </div>
                <div class="mb-3">
                  <h6><label for="formFileMultiple" class="form-label">Upload Post-Graduation Marksheet</label></h6>
                  <input class="form-control" type="file" id="formFileMultiple" multiple />
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
              </form>
            </div>
          </div>
        </div>
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
                  <img src="assets/img/icons/brands/google.png" alt="google" class="me-3" height="30" />
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
                  <img src="assets/img/icons/brands/slack.png" alt="slack" class="me-3" height="30" />
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
                  <img src="assets/img/icons/brands/github.png" alt="github" class="me-3" height="30" />
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
                  <img src="assets/img/icons/brands/mailchimp.png" alt="mailchimp" class="me-3" height="30" />
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
                  <img src="assets/img/icons/brands/asana.png" alt="asana" class="me-3" height="30" />
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
                  <img src="assets/img/icons/brands/facebook.png" alt="facebook" class="me-3" height="30" />
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
                  <img src="assets/img/icons/brands/twitter.png" alt="twitter" class="me-3" height="30" />
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
                  <img src="assets/img/icons/brands/instagram.png" alt="instagram" class="me-3" height="30" />
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
                  <img src="assets/img/icons/brands/dribbble.png" alt="dribbble" class="me-3" height="30" />
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
                  <img src="assets/img/icons/brands/behance.png" alt="behance" class="me-3" height="30" />
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
</main>
<?php endContainer($path); ?>