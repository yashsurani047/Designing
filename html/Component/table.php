<?php
if(!isset($path)){
    $path = "..";
}
include_once "$path/Function/Basic.php";
include_once "$path/Function/Database.php";

class TableHelper {
    private $db;
    private $basic;

    public function __construct() {
        $this->db = new Database();
        $this->basic = new Basic();
    }

    public function table($title, $query, $is_Add = 0, $is_Edit = 0, $is_Delete = 0, $is_View = 1) {
        // Extract the table name from the query
        $tableName = $this->getTableNameFromQuery($query);
    
        // Get the search term from the URL (if any)
        $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    
        // If a search term is provided, modify the query to filter results
        if ($search !== '') {
            $search = mysqli_real_escape_string($this->db->getConnection(), $search); // Sanitize the search term
            // Get the columns used in the SELECT query
            $columns = $this->getColumnsFromQuery($query);
            $columnsList = implode(", ", $columns); // Join columns into a comma-separated string
            
            // Check if the query already contains a WHERE clause
            if (stripos($query, 'WHERE') === false) {
                $query .= " WHERE CONCAT_WS(' ', $columnsList) LIKE '%$search%'";
            } else {
                $query .= " AND CONCAT_WS(' ', $columnsList) LIKE '%$search%'";
            }
        }
        // Execute the query
        $result = $this->db->Execute($query);
    
        // Ensure the result is valid
        if ($result && mysqli_num_rows($result) > 0) {
            // Get the column names from the first row of the result
            $columns = array_keys(mysqli_fetch_assoc($result)); // Extract column names from the first row
            mysqli_data_seek($result, 0); // Reset the result pointer
    
            // Ensure 'id' is the first column
            if (in_array('id', $columns)) {
                $columns = array_merge(['id'], array_diff($columns, ['id']));
            }
        } else {
            $columns = []; // If no rows returned, set columns to an empty array
        }
        ?>
        
        <div class="card" style="margin-left:35px;margin-right:35px;margin-top:35px;">
            <h5 class="card-header"><?php echo htmlspecialchars($title); ?></h5>
            <div class="card-body d-flex justify-content-between align-items-center">
                <?php if ($is_Add): ?>
                    <a class="btn btn-primary" href="<?php echo "../.."; ?>/Component/Edit.php?id=1&table=<?php echo urlencode($tableName); ?>">New Entry</a>
                    <!-- <a class="btn btn-primary" href="http://localhost/Designing/html/user/Company/AddNewJob.php?table=Jobs">New Entry</a> -->
                <?php endif; ?>
                <form method="GET" action="" class="d-flex">
                    <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search..." class="form-control" style="width: 300px; margin-right: 10px;">
                    <button type="submit" class="btn btn-success">Search</button>
                </form>
                <?php
                if ($_SESSION['Usertype'] == "Admin" || $_SESSION['Usertype'] == "Company") {
                    echo "<a class='btn btn-info' href='../../vendor/generate-invoice.php?Table_Name=$tableName'>Download</a>";
                }
                ?>
            </div>
            <div id="table-container">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <?php
                                // Create headers dynamically based on the column names
                                foreach ($columns as $header) {
                                    echo "<th>" . htmlspecialchars($header) . "</th>";
                                }
                                ?>
                                <th>Action</th> <!-- Optional Action column -->
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <?php
                            // If no records are found, display a single row with a "No Records Found" message
                            if (count($columns) == 0 || mysqli_num_rows($result) == 0) {
                                echo "<tr><td colspan='" . (count($columns) + 1) . "' class='text-center'><strong>No Records Found</strong></td></tr>";
                            } else {
                                // Display the table rows
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $this->renderTableRow($row, $columns, $tableName, $is_Edit, $is_Delete, $is_View);
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
        <script>
            function toggleOptions(button) {
                const options = button.nextElementSibling; // Get the associated options div
                const allOptions = document.querySelectorAll('.action-options'); // Get all options divs
    
                // Close all other options divs
                allOptions.forEach(option => {
                    if (option !== options) {
                        option.style.display = 'none';
                    }
                });
    
                // Toggle the visibility of the clicked options div
                options.style.display = options.style.display === 'none' || options.style.display === '' ? 'block' : 'none';
            }
        </script>
    
        <?php
    }

    // Helper function to get columns from the query
    private function getColumnsFromQuery($query) {
        preg_match('/SELECT\s+(.*?)\s+FROM/i', $query, $matches);
        $columns = isset($matches[1]) ? $matches[1] : '';
        $columns = explode(',', $columns);
        $columns = array_map('trim', $columns);
        return $columns;
    }

    private function renderTableRow($row, $columns, $tableName, $is_Edit, $is_Delete, $is_View) {
        if(!isset($path)){
            $path = "..";
        }
    
        // Initialize the flag for Hire button
        $isHire = false;
    
        // Check if this is the "EmployeeRequest" page and handle the "Hire" button logic
        if (strpos($this->basic->getUrl(), "EmployeeRequest") !== false) {
            // Assuming $columns[0] contains User_Id and $columns[6] contains the Job_Profile
            $userId = (int) $row[$columns[0]]; // Assuming the first column holds User_Id
            $jobProfile = mysqli_real_escape_string($this->db->getConnection(), $row[$columns[6]]); // Assuming column 6 holds Job_Profile
            
            // Query to get the Job_Id where the user has applied
            $jobQuery = "SELECT a.Job_Id FROM applied a JOIN jobs j ON a.Job_Id = j.Id WHERE a.User_Id = $userId AND j.Job_Profile = '$jobProfile'";
            $Job_Id = $this->db->Execute($jobQuery);
    
            // Check if a valid Job_Id was found
            if ($Job_Id && mysqli_num_rows($Job_Id) > 0) {
                $Job_Id = mysqli_fetch_assoc($Job_Id)['Job_Id'];
                $isHire = true; // Set the flag if Job_Id exists
            }
        }
    
        ?>
        <tr>
            <?php
            // Loop through the columns and display each cell value
            foreach ($columns as $column) {
                $cellValue = htmlspecialchars($row[$column]);
    
                // Check if the cell contains a URL (to display an image or link)
                if (filter_var($cellValue, FILTER_VALIDATE_URL)) {
                    // Check if it's an image link (jpg, jpeg, png, gif)
                    if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $cellValue)) {
                        // Display as image
                        echo "<td><a href='$cellValue' target='_blank'><img src='$cellValue' style='width:50px;height:auto;' alt='Image'></a></td>";
                    } else {
                        // Display as a button link
                        echo "<td><a class='btn btn-link' href='$cellValue' target='_blank'>View Link</a></td>";
                    }
                } else {
                    // Display as normal text
                    echo "<td>" . $cellValue . "</td>";
                }
            }
            ?>
            <td>
                <div>
                    <!-- More Options button -->
                    <button class="btn btn-secondary" onclick="toggleOptions(this)">More Options</button>
                    <div class="action-options" style="display:none; margin-top: 5px;">
                        <!-- Display View Details or Hire Student based on the $isHire flag -->
                        <?php if ($is_View): ?>    
                            <?php if ($isHire): ?>
                                <!-- Hire Student button -->
                                <a class="btn btn-info btn-sm" href="<?php echo $path."/.."; ?>/Component/View.php?table=<?php echo urlencode($tableName); ?>&id=<?php echo htmlspecialchars($row[$columns[0]]); ?>&jid=<?php echo htmlspecialchars($Job_Id); ?>">Hire Student</a>
                            <?php else: ?>
                                <!-- Default View Details button -->
                                <a class="btn btn-info btn-sm" href="<?php echo $path."/.."; ?>/Component/View.php?table=<?php echo urlencode($tableName); ?>&id=<?php echo htmlspecialchars($row[$columns[0]]); ?>">View Details</a>
                            <?php endif; ?>
                            <br>
                        <?php endif; ?>
    
                        <!-- Edit Button -->
                        <?php if ($is_Edit): ?>
                            <a class="btn btn-warning btn-sm" href="<?php echo $path."/.."; ?>/Component/edit.php?table=<?php echo urlencode($tableName); ?>&id=<?php echo htmlspecialchars($row[$columns[0]]); ?>">Edit</a>
                        <?php endif; ?>
    
                        <!-- Delete Button -->
                        <?php if ($is_Delete): ?>
                            <form action="<?php echo $path."/.."; ?>/Component/delete.php" method="POST" onsubmit="return confirm('Are you sure?')">
                                <input type="hidden" name="table" value="<?php echo urlencode($tableName); ?>">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($row[$columns[0]]); ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </td>
        </tr>
        <?php
    }
    
        

    private function getTableNameFromQuery($query) {
        preg_match('/FROM\s+([^\s]+)/i', $query, $matches);
        return isset($matches[1]) ? $matches[1] : null;
    }
}
?>
