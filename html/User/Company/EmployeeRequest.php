<?php
$path = "../..";
$user = "Company";

require_once "$path/Function/Basic.php";
require_once "$path/Function/Database.php";
startContainer($path, $user);

$db = new Database();
$profile = $db->Execute("select * from companyprofile where User_Id = $_SESSION[Userid]");
if($profile == null){
  $basic->error("First Update the Profile",1);
}
$studreq = $db->Execute_All("SELECT * FROM studentprofile sp INNER JOIN applied ap ON sp.User_Id = ap.User_Id INNER JOIN jobs j ON ap.Job_Id = j.Id WHERE j.User_Id = $_SESSION[Userid]");
?>

</head>

<body>

  <!-- Bordered Table -->
  <div class="card" style="margin-left:35px;margin-right:35px;margin-top:35px;">
                <h5 class="card-header"></h5>
                <h5 class="card-header">Employee Requests</h5>

                <div class="card-body">
                  
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                     <thead>
                        <tr>
                          <th>Candidate Name</th>
                          <th>Candidate Contact</th>
                          <th>Job Role</th>
                          <th>Email</th>
                          <th>Branch</th>
                          <!-- <th>Details</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          foreach($studreq as $stud){
                        ?>
                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $stud['First_Name'].$stud['Last_Name'] ?></strong></td>
                          <td><?php echo $stud['Phone_Number'] ?></td>
                          <td><?php echo $stud['Job_Profile'] ?></td>
                          <td><?php echo $stud['Email'] ?></td>
                          <td><?php echo $stud['Stream'] ?></td>
                          <!-- <td><a class="btn btn-primary" href="EmployeeDetails.php?User_Id =<?php echo $stud['Id'] ?>">View Details</a></td> -->
                        </tr>
                        <?php
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table --> <?php endContainer($path); ?>
</body>
