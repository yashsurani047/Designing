<?php
if(!isset($path)){
    $path = "..";
}
include_once "$path/Function/Basic.php";
include_once "$path/Function/Database.php";

class TableHelper {
    private $db;

    public function __construct() {
        $this->db = new Database();
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
                    <a class="btn btn-primary" href="AddNew.php?table=<?php echo urlencode($tableName); ?>">New Entry</a>
                <?php endif; ?>
                <form method="GET" action="" class="d-flex">
                    <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search..." class="form-control" style="width: 300px; margin-right: 10px;">
                    <button type="submit" class="btn btn-success">Search</button>
                </form>
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
        // Basic extraction of columns from a SELECT query
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
        ?>
        <tr>
            <?php
            foreach ($columns as $column) {
                $cellValue = htmlspecialchars($row[$column]);

                // Check if the cell contains a URL
                if (filter_var($cellValue, FILTER_VALIDATE_URL)) {
                    // Check if it's an image link
                    if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $cellValue)) {
                        // Display as image
                        echo "<td><a href='$cellValue' target='_blank'><img src='$cellValue' style='width:50px;height:auto;' alt='Image'></a></td>";
                    } else {
                        // Display as a button link
                        echo "<td><a class='btn btn-link' href='$cellValue' target='_blank'>View Link</a></td>";
                    }
                } else {
                    echo "<td>" . $cellValue . "</td>";
                }
            }
            ?>
            <td>
                <div>
                    <button class="btn btn-secondary" onclick="toggleOptions(this)">More Options</button>
                    <div class="action-options" style="display:none; margin-top: 5px;">
                        <?php if ($is_View): ?>
                            <a class="btn btn-info btn-sm" href="<?php echo $path."/.."; ?>/Component/View.php?table=<?php echo urlencode($tableName); ?>&id=<?php echo htmlspecialchars($row[$columns[0]]); ?>">View Details</a>
                        <?php endif; ?>
                        <br>
                        <?php if ($is_Edit): ?>
                            <a class="btn btn-warning btn-sm" href="<?php echo $path."/.."; ?>/Component/edit.php?table=<?php echo urlencode($tableName); ?>&id=<?php echo htmlspecialchars($row[$columns[0]]); ?>">Edit</a>
                        <?php endif; ?>
                        <?php if ($is_Delete): ?>
                            <a class="btn btn-danger btn-sm" href="<?php echo $path."/.."; ?>/Component/delete.php?table=<?php echo urlencode($tableName); ?>&id=<?php echo htmlspecialchars($row[$columns[0]]); ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        <?php endif; ?>
                    </div>
                </div>
            </td>
        </tr>
        <?php
    }

    private function getTableNameFromQuery($query) {
        // Basic extraction of the table name from a SELECT query
        $query = trim($query);
        preg_match('/FROM\s+([^\s]+)/i', $query, $matches);
        return isset($matches[1]) ? $matches[1] : null; // Return the table name or null if not found
    }
}
?>
