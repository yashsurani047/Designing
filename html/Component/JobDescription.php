<?php
$path = "..";

require_once "$path/Function/Basic.php";
require_once "$path/Function/Database.php";
$basic  = new Basic($path);

$db = new Database();
$sql = "select * from Jobs where Id = ".$_GET['Job_Id'];
$job = $db->Execute_One($sql);
$Jobowner = $db->Execute_One("select * from companyprofile where User_Id = $job[User_Id]");

$Is_Edit = $_SESSION['Userid'] == $job['User_Id'];
$Is_Collage  = $_SESSION['Usertype'] == "Collage";
$Is_Student  = $_SESSION['Usertype'] == "Student";
$Is_Company  = $_SESSION['Usertype'] == "Company";
if($Is_Company){
    $Is_Circulated  = $db->fetch("select * from Circulated where User_Id = ".$_SESSION['Userid']." AND  Job_Id = ".$_GET['Job_Id']) != null? true:false;
}
if($Is_Student){
    $Is_Applied  = $db->fetch("select * from Applied where User_Id = ".$_SESSION['Userid']." AND  Job_Id = ".$_GET['Job_Id']) != null? true:false;
}
// echo $_SESSION['Userid']." AND  Job_Id = ".$_GET['Job_Id'];

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
    <!-- Main Content Starts Here -->
    <div class="col-xl" style="margin-top: 30px; margin-left: 30px; margin-right: 30px;">
        <div class="card mb-4">
            <div class="card-body">
                
                  <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold py-3"><span class="text-muted fw-light"></span> Job Details</h1>
    <?php
        if($Is_Edit){
            ?><button class="btn btn-info" onclick="showEdit()">Edit</button><?php
        }
    ?>
</div>
<script>
    
</script>
              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-6">
                    <div class="card-body">                      
                <h2>Job Description</h2>
                <table>
                    <tr>
                        <th>Company Name</th>
                        <td><?php echo $Jobowner['Company_Name'] ?></td>
                    </tr>
                    <tr>
                        <th>Job Location</th>
                        <td><?php echo $job['Job_Location'] ?> </td>
                    </tr>
                    <tr>
                        <th>Company URL</th>
                        <td><?php echo $Jobowner['Company_URL'] ?></td>
                    </tr>
                    <tr>
                        <th>Selection Process</th>
                        <td><?php echo $job['Selection_Process'] ?></td>
                    </tr>
                    <tr>
                        <th>CTC</th>
                        <td><?php echo $job['CTC'] ?></td>
                    </tr>
                    <tr>
                        <th>Stipend</th>
                        <td><?php echo $job['Stipend'] ?></td>
                    </tr>
                    <tr>
                        <th>Internship</th>
                        <td><?php echo $job['Internship'] ?></td>
                    </tr>
                    <tr>
                        <th>Bond</th>
                        <td><?php echo $job['Bond'] ?></td>
                    </tr>
                    <tr>
                        <th>Job Profile</th>
                        <td><?php echo $job['Job_Profile'] ?></td>
                    </tr>
                    <tr>
                        <th>Date of Joining</th>
                        <td><?php echo $job['Date_Of_Joining'] ?></td>
                    </tr>
                </table>
                    </div>
                  </div>
                  
                </div>
                <!-- Basic with Icons -->
                <div class="col-xxl">
                  <div class="card mb-1">
                    <div class="card-body">
                      
                <h2>Eligibility Criteria</h2>
                <table>
                    <tr>
                        <th>Batch</th>
                        <td><?php echo $job['Batch'] ?></td>
                    </tr>
                    <tr>
                        <th>Eligible Courses</th>
                        <td><?php echo $job['Eligible_Course'] ?></td>
                    </tr>
                    <tr>
                        <th>Registration</th>
                        <td><?php echo $job['Due_Date'] ?></td>
                    </tr>
                </table>

                <h2>Contact Details</h2>
                <table>
                    <tr>
                        <th>Contact Person</th>
                        <td><?php echo $Jobowner['Contact_Information'] ?></td>
                    </tr>
                    <tr>
                        <th>Venue</th>
                        <td><?php echo $job['Venue'] ?></td>
                    </tr>
                    <tr>
                        <th>Date and Time</th>
                        <td><?php echo $job['DateTime'] ?></td>
                    </tr>
                </table>
                
                    </div>
                  </div>

                <?php
                    if($Is_Collage){
                        if($Is_Circulated){
                            ?><h3 class="text-info">Already Posted</h3><?php
                        }
                        else{
                            ?>
                            <form action="<?php echo $path?>/Function/Submit.php" method="post">
                                <input type="hidden" name="submit" value="PublishJob">
                                <button type="submit" class="btn btn-info">Publish to Student</button>
                            </form>
                            <?php
                        }
                    }
                    if($Is_Student){
                        if($Is_Applied){
                            ?><h3 class="text-info">Already Applied</h3><?php
                        }
                        else{
                            ?>
                            <form action="<?php echo $path?>/Function/Submit.php" method="post">
                                <input type="hidden" class="btn btn-info" name="submit" value="ApplyJob">
                                <input type="hidden" class="btn btn-info" name="Job_Id" value="<?php echo $_GET['Job_Id'] ?>">
                                <button type="submit" class="btn btn-success" name = "submit" value="Apply">Apply Job</button>
                                <!-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalScrollable">Apply Job</button> -->
                            </form>
                            <?php //include "$path/User/Student/TnC.php";
                        }
                    }
                    ?>
                    
                    <script>
                            function showEdit() {
                                document.getElementById('jobDescription').style.display = 'none';
                                document.getElementById('jobDescriptionEdit').style.display = 'block';
                            }
                        </script>
                <br>
                <button type="button" class="btn btn-danger" onclick="window.history.go(-1)">Back</button>
                </div>
              </div>
            </div>
            </div>
        </div>
    </div>\