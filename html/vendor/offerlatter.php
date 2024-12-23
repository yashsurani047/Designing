<?php
require 'autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

session_start();
include('../Function/Database.php'); // Include database configuration
$db = new Database();

// Check if the necessary GET parameter is passed
if (isset($_GET['Hiring_Id'])){
    $_GET['hiring_id'] = $_GET['Hiring_Id'];
}
if (isset($_GET['hiring_id'])) {
    $hiring_id = $_GET['hiring_id'];  // Get the hiring record ID
    
    // Step 1: Fetch the Hiring details (Job_Id and User_Id) based on hiring_id
    $query = "
        SELECT 
            h.Job_Id, 
            h.User_Id
        FROM 
            hiring h
        WHERE 
            h.Id = " . (int)$hiring_id;
    
    $result = mysqli_query($db->GetConnection(), $query);

    // Check if we got the hiring data
    if ($result && mysqli_num_rows($result) > 0) {
        $hiring_data = mysqli_fetch_assoc($result);
        $job_id = $hiring_data['Job_Id'];
        $user_id = $hiring_data['User_Id'];

        // Step 2: Fetch Student, Job, and Company details based on the fetched Job_Id and User_Id
        $query_details = "
            SELECT
                s.User_Id,
                CONCAT(s.First_Name, ' ', s.Last_Name) AS Student_Name,
                s.Phone_Number AS Student_Phone,
                s.Email AS Student_Email,
                s.Stream AS Student_Stream,
                j.Job_Profile,
                j.CTC,
                j.Job_Location,
                j.Internship,
                j.Stipend,
                j.Selection_Process,
                j.Bond,
                j.Term,
                j.Date_Of_Joining,
                c.Company_Name,
                c.Company_URL,
                c.Company_Address,
                c.Contact_Information AS Company_Contact,
                c2.HR_Name,
                c2.HR_Contact,
                c2.Job_Location AS Company_Job_Location,
                c2.Eligibility_Criteria
            FROM 
                hiring h
            INNER JOIN 
                studentprofile s ON h.User_Id = s.User_Id
            INNER JOIN 
                jobs j ON h.Job_Id = j.Id
            INNER JOIN 
                companyprofile c ON j.User_Id = c.User_Id
            INNER JOIN 
                companyprofile2 c2 ON j.User_Id = c2.User_Id
            WHERE 
                h.Job_Id = " . (int)$job_id . " AND 
                h.User_Id = " . (int)$user_id;

        $result_details = mysqli_query($db->GetConnection(), $query_details);

        // Check if the query returned results
        if ($result_details && mysqli_num_rows($result_details) > 0) {
            // Fetch the details for the offer letter
            $row = mysqli_fetch_assoc($result_details);

            // Initialize DOMPDF
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);
            $dompdf = new Dompdf($options);

            // Start building the HTML content for the offer letter
            $html = '
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
                    .container { width: 80%; margin: 0 auto; }
                    h1, h2, p { margin: 0 0 10px 0; }
                    .header { text-align: center; margin-bottom: 20px; }
                    .offer-details { margin: 20px 0; }
                    .offer-details table { width: 100%; border-collapse: collapse; }
                    .offer-details th, .offer-details td { padding: 8px; text-align: left; border: 1px solid #ddd; }
                    .offer-details th { background-color: #f2f2f2; }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="header">
                        <h1>Offer Letter</h1>
                        <p><strong>' . htmlspecialchars($row['Company_Name']) . '</strong></p>
                        <p><strong>' . htmlspecialchars($row['Company_Address']) . '</strong></p>
                        <p>Contact: ' . htmlspecialchars($row['Company_Contact']) . '</p>
                    </div>

                    <div class="offer-details">
                        <h2>Dear ' . htmlspecialchars($row['Student_Name']) . ',</h2>
                        <p>We are pleased to extend an offer for the position of <strong>' . htmlspecialchars($row['Job_Profile']) . '</strong> at <strong>' . htmlspecialchars($row['Company_Name']) . '</strong>.</p>
                        <p>Below are the details of your offer:</p>
                        <table>
                            <tr><th>Job Profile</th><td>' . htmlspecialchars($row['Job_Profile']) . '</td></tr>
                            <tr><th>CTC</th><td>' . htmlspecialchars($row['CTC']) . '</td></tr>
                            <tr><th>Job Location</th><td>' . htmlspecialchars($row['Job_Location']) . '</td></tr>
                            <tr><th>Stipend</th><td>' . htmlspecialchars($row['Stipend']) . '</td></tr>
                            <tr><th>Internship</th><td>' . htmlspecialchars($row['Internship']) . '</td></tr>
                            <tr><th>Bond</th><td>' . htmlspecialchars($row['Bond']) . '</td></tr>
                            <tr><th>Term</th><td>' . htmlspecialchars($row['Term']) . '</td></tr>
                            <tr><th>Joining Date</th><td>' . htmlspecialchars($row['Date_Of_Joining']) . '</td></tr>
                        </table>
                    </div>

                    <p>We look forward to welcoming you to the team!</p>
                    <p>Sincerely,</p>
                    <p><strong>' . htmlspecialchars($row['HR_Name']) . '</strong><br>' .
                    htmlspecialchars($row['Company_Name']) . '<br>Contact: ' . htmlspecialchars($row['HR_Contact']) . '</p>
                </div>
            </body>
            </html>';

            // Load the HTML content into DOMPDF
            $dompdf->loadHtml($html);

            // Set the paper size
            $dompdf->setPaper('A4', 'portrait');

            // Render the PDF
            $dompdf->render();

            // Output the generated PDF (force download)
            $dompdf->stream("offer_letter_" . $row['Student_Name'] . ".pdf", array("Attachment" => 1)); // 1 means force download
        } else {
            echo "No details found for the student and job in the hiring record!";
        }
    } else {
        echo "No hiring data found for the given hiring_id!";
    }
} else {
    echo "Hiring ID not specified!";
}
?>
