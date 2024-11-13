<?php
include_once "../Function/Basic.php";
include_once "../Function/Database.php";

$db = new Database();

$table = isset($_GET['table']) ? $_GET['table'] : '';
$query = "SELECT * FROM " . mysqli_real_escape_string($db->getConnection(), $table); // Ensure to sanitize input
$search = isset($_GET['query']) ? trim($_GET['query']) : '';

// Modify query for search
if ($search) {
    $searchCondition = " WHERE ";
    $searchTerms = explode(" ", $search);
    foreach ($searchTerms as $term) {
        $searchCondition .= "(";
        // Here you need to specify your actual column names
        $searchCondition .= "column1 LIKE '%$term%' OR column2 LIKE '%$term%'"; // Adjust column names
        $searchCondition .= ") AND ";
    }
    $searchCondition = rtrim($searchCondition, " AND "); // Remove last AND
    $query .= $searchCondition;
}

$result = $db->Execute($query);

// Check if results are empty
if (!$result || mysqli_num_rows($result) == 0) {
    // Return a row indicating no records found
    echo "<tr><td colspan='100%' class='text-center'>No Records Found</td></tr>"; // Adjust colspan based on your table structure
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        // Render the table row using a function or inline
        renderTableRow($row, $table); // Call a function to render rows (implement this if necessary)
    }
}

function renderTableRow($row, $tableName) {
    // Use this function to render each row in the table
    echo "<tr>";
    foreach ($row as $column) {
        $cellValue = htmlspecialchars($column);
        echo "<td>{$cellValue}</td>";
    }
    echo "<td>
            <div>
                <button class='btn btn-secondary' onclick='toggleOptions(this)'>More Options</button>
                <div class='action-options' style='display:none; margin-top: 5px;'>
                    <a class='btn btn-warning btn-sm' href='edit.php?table=".urlencode($tableName)."&id=".htmlspecialchars($row['id'])."'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='delete.php?table=".urlencode($tableName)."&id=".htmlspecialchars($row['id'])."' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </div>
            </div>
          </td>";
    echo "</tr>";
}
?>
