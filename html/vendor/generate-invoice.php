<?php
require 'autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

session_start();
include('../Function/Database.php'); // Include database configuration
$db = new Database();

// Check if the table name is passed
if (isset($_GET['Table_Name'])) {
    $table_name = $_GET['Table_Name'];

    // Query to get the table data
    $sql = "SELECT * FROM $table_name";
    $query = mysqli_query($db->GetConnection(), $sql);

    // Ensure the table has data
    if ($query && mysqli_num_rows($query) > 0) {
        // Initialize DOMPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Start building the HTML content
        $html = '
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; }
                table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
                th { background-color: #f2f2f2; }
                .header { text-align: center; margin-bottom: 20px; }
                .header h1 { margin: 0; }
                .header p { font-size: 14px; color: #666; }
            </style>
        </head>
        <body>
            <div class="header">
                <h1>Table Report: ' . htmlspecialchars($table_name) . '</h1>
                <p>Generated on ' . date('Y-m-d H:i:s') . '</p>
            </div>
            <table>
                <thead>
                    <tr>';

        // Fetch the column names dynamically
        while ($field = mysqli_fetch_field($query)) {
            $html .= '<th>' . htmlspecialchars($field->name) . '</th>';
        }

        $html .= '</tr>
                </thead>
                <tbody>';

        // Fetch and display table rows
        while ($row = mysqli_fetch_assoc($query)) {
            $html .= '<tr>';
            foreach ($row as $value) {
                $html .= '<td>' . htmlspecialchars($value) . '</td>';
            }
            $html .= '</tr>';
        }

        $html .= '</tbody>
            </table>
        </body>
        </html>';

        // Load the HTML content into DOMPDF
        $dompdf->loadHtml($html);

        // Set the paper size
        $dompdf->setPaper('A4', 'landscape');

        // Render the PDF
        $dompdf->render();

        // Output the generated PDF (force download)
        $dompdf->stream("table_report_" . $table_name . ".pdf", array("Attachment" => 1)); // 1 means force download
    } else {
        echo "No data found in the specified table or table does not exist!";
    }
} else {
    echo "Table name not specified!";
}
?>
