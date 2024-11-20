<?php
$path = "..";
$user = "Student";

require_once "$path/Function/Basic.php";

startContainer($path, $user);
<<<<<<< HEAD
?><main>

<?php
// Assuming you have already included the required files
$path = "..";  // Base path to the root directory
require_once "$path/Function/Basic.php";  // Assuming Basic.php is in the 'Function' folder
require_once "$path/Function/Database.php";  // Assuming Database.php is in the 'Function' folder

$basic = new Basic($path);
$db = new Database();

// Get the job ID from the URL (GET method)
$id = isset($_GET['id']) ? $_GET['id'] : null;
$table = isset($_GET['table']) ? $_GET['table'] : null;

// Check if the ID is provided, otherwise show an error message
if (!$id) {
    echo "Error: No Job ID provided.";
    exit; // Stop further execution if the ID is not available
}

// Fetch job details from the database using the Database class
$job = $db->Execute_One("SELECT * FROM $table WHERE id = $id limit 1");
// Check if the job data is found, otherwise show an error message
if (!$job) {
    echo "Error: Data not found.";
    exit; // Stop further execution if no job data is found
}
?>
  <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #0c7699;
            color: white;
        }

        .section-title {
            font-size: 24px;
            margin-top: 20px;
            margin-bottom: 10px;
            color: #004080;
        }
    </style>
<div class="col-xl" style="margin-top: 30px; margin-left: 30px; margin-right: 30px;">
    <div class="card mb-4">
        <div class="card-body">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="fw-bold py-3"><span class="text-muted fw-light"> Record of <?php echo $table?></span></h1>
                </div>

                <!-- Job Details Section -->
                <div class="row">
                    <div class="col-xxl">
                        <div class="card mb-6">
                            <div class="card-body">
                                <h2>Job Details</h2>
                                <table class="table table-bordered">
                                    <?php
                                    // Loop through the fetched job data and print column name and value
                                    foreach ($job as $column => $value) {
                                        if(!is_numeric($column)){
                                            echo "<tr>
                                                <th>" . htmlspecialchars($column) . "</th>
                                                <td>" . htmlspecialchars($value) . "</td>
                                              </tr>";
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End of container -->
        </div> <!-- End of card-body -->
    </div> <!-- End of card -->
</div> <!-- End of col-xl -->

</main>

=======
?>
<main>

<div id="jobDescription" style="display: block;">
    <?php include "$path/Component/JobDescription.php"; ?>
</div>

</main>
>>>>>>> 09c6a43 (done)
<?php endContainer($path); ?>
