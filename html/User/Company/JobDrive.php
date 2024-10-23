<head>
<?php
$path = "../..";
$user = "Company";

require_once "$path/Function/Basic.php";
require_once "$path/Function/Database.php";
startContainer($path, $user);

$db = new Database();
$JobDrive = $db->Execute("select * from Jobs where User_Id = " . $_SESSION['Userid']);

?>
<body>
<div class="card" style="margin-left:35px;margin-right:35px;margin-top:35px;">
                <h5 class="card-header"></h5>
                <h5 class="card-header">Posted Job Opportunities</h5>

                <div class="card-body">
                  
                <a class="btn btn-primary" href="<?php echo $path ?>/User/Company/AddNewJob.php">New Job/ Internship</a><br><br>
                <div class="table-responsive text-nowrap">
                  <?php
                  if($JobDrive == null){
                    ?>
                    <center><h2>No JobDrive Posted</h2></center>
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
                          <a class="btn btn-primary" href="JobDescription.php?Job_Id=<?php echo $job['Id'] ?>">View Details</a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table --> <?php endContainer($path); ?>
</body>
