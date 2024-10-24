<?php

function JobList($user,$path, $purpose = "all"){
require_once "$path/Function/Database.php";

$db = new Database();
switch($purpose){
  case "all" : $JobDrive = $db->Execute("select * from Jobs"); break;
  case "applied" : $JobDrive = $db->Execute("select * from Jobs j inner join applied a on j.Id = a.Job_Id where a.User_Id = '$_SESSION[Userid]'"); break;
  case "available" : $JobDrive = $db->Execute("SELECT j.*, j.Id AS Job_Id FROM Jobs j LEFT JOIN applied a ON j.Id = a.Job_Id AND a.User_Id = $_SESSION[Userid] WHERE a.Job_Id IS NULL OR j.User_Id =$_SESSION[Userid]"); break;
}
    ?>

    <div class="card" style="margin-left:35px;margin-right:35px;margin-top:35px;">
                <h5 class="card-header"></h5>
                <?php 
                if($user == "Company"){
                ?>
                <h5 class="card-header">Posted Job Opportunities</h5>
                <?php
                }
                else{
                  ?>
                  <h5 class="card-header">Available Job Opportunities</h5>
                  <?php 
                }
                ?>

                <div class="card-body">
                <?php 
                if($user == "Company"){
                ?>
                  <a class="btn btn-primary" href="<?php echo $path ?>/User/Company/AddNewJob.php">New Job/ Internship</a><br><br>
                  <?php
                }
                ?>  
                <div class="table-responsive text-nowrap">
                  <?php
                  if($JobDrive == null){
                    ?>
                    <center><h2>No JobDrive</h2></center>
                    <?php
                  }
                  else{
                   ?>
                    <table class="table table-bordered">
                     <thead>
                        <tr>
                          <th>Job Roles</th>
                          <th>CTC</th>
                          <th>Internship</th>
                          <th>Stipend</th>
                          <th>Bond</th>
                          <th>Amount/Document</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach($JobDrive as $job){
                        ?>
                        <tr>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $job['Job_Profile'] ?></strong>
                          </td>
                          <td><?php echo $job['CTC'] ?></td>
                          <td><?php echo  $job['Internship'] ?></td>
                          <td><?php echo $job['Stipend'] ?></td>
                          <td><?php echo $job['Bond'] ?></td>
                          <td><?php echo $job['Term'] ?></td>
                          <td>
                          <a class="btn btn-primary" href="JobDescription.php?Job_Id=<?php echo $job['Job_Id'] ?>">View Details</a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <?php } ?>
                  </div>
                </div>
              </div>

    <?php

}


function AppliedJobList($user){
    echo "
    <!-- Hoverable Table rows -->
     <div class='card' style='margin-top:30px; margin-left:30px; margin-right:30px;'>
                <h5 class='card-header'>Already Applied</h5>
                <div class='table-responsive text-nowrap'>
                  <table class='table table-hover'>
                    <thead>
                      <tr>
                        <th>Company Name</th>
                        <th>Job Role</th>
                        <th>Work Mode</th>
                        <th>Ctc</th>
                        <th>Internship</th> <!-- yes(hover:paid,unpaid),no -->
                        <th>Bond</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody class='table-border-bottom-0'>
                      <tr>
                        <td><i class='fab fa-angular fa-lg text-danger me-3'></i> <strong>Amazon Ltd</strong></td>
                        <td>Marketing Management</td>
                        <td>
                         Offline
                        </td>
                        <td>
                          4.50 Lpa
                        </td>
                        <td>
                         6 Months
                        </td>
                        <td>
                         2 year
                        </td>
                        <td>
                          <div>
                          <a type='button' href='./JobDescription.php' class='btn btn-info'>View Details</a>
                        </div>
                      </td>
                      </tr>

                      <tr>
                        <td><i class='fab fa-angular fa-lg text-danger me-3'></i> <strong>Riwzon Pvt.Ltd</strong></td>
                        <td>Marketing Management</td>
                        <td>
                         Offline
                        </td>
                        <td>
                          17.00 Lpa
                        </td>
                        <td>
                         6 Months
                        </td>
                        <td>
                         3 year
                        </td>
                        <td>
                          <div>
                          <a type='button' href='.\JobDescription.php' class='btn btn-info'>View Details</a>
                        </div>
                      </td>
                      </tr>

                      <tr>
                        <td><i class='fab fa-angular fa-lg text-danger me-3'></i> <strong>IBM</strong></td>
                        <td>Marketing Management</td>
                        <td>
                         Offline
                        </td>
                        <td>
                          9.50 Lpa
                        </td>
                        <td>
                         6 Months
                        </td>
                        <td>
                         2 year
                        </td>
                        <td>
                          <div>
                          <a type='button' href='./JobDescription.php' class='btn btn-info'>View Details</a>
                        </div>
                      </td>
                      </tr>

                      <tr>
                        <td><i class='fab fa-angular fa-lg text-danger me-3'></i> <strong>Lenskart.com</strong></td>
                        <td>Marketing Management</td>
                        <td>
                         Offline
                        </td>
                        <td>
                          6.50 Lpa
                        </td>
                        <td>
                         6 Months
                        </td>
                        <td>
                         2 year
                        </td>
                        <td>
                          <div>
                          <a type='button' href='./JobDescription.php' class='btn btn-info'>View Details</a>
                        </div>
                      </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Hoverable Table rows -->
    <!-- Main Content Ends Here -->
    ";

}

function Employees($user){

}