<?php
$path = "../..";
$user = "Admin";
require_once "$path/Function/Basic.php";
require_once "$path/Function/Database.php";
$db = new Database();
$students = $db->Execute_All("select * from studentprofile");

startContainer($path, $user);
?>

<div class="card" style="margin-left:35px;margin-right:35px;margin-top:35px;">
                <h5 class="card-header"></h5>
                <h5 class="card-header">Total Student</h5>

                <div class="card-body">
                  
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                     <thead>
                        <tr>
                          <th>Student Name</th>
                          <th>Father Name</th>
                          <th>Student Branch</th>
                          <th>Contact</th>
                          <th>Student Email</th>
                          <th>State</th>
                          <!-- <th>Details</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($students as $stud){
                          ?>
                        <tr>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $stud['First_Name']." ".$stud['Last_Name'] ?></strong>
                          </td>
                          <td><?php echo $stud['Father_Name'] ?></td>
                          <td><?php echo $stud['Stream'] ?></td>
                          <td><?php echo $stud['Phone_Number'] ?></td>
                          <td><?php echo $stud['Email'] ?></td>
                          <td><?php echo $stud['State'] ?></td>
                          <!-- <td><a class="btn btn-primary" href="../../User/Student/Profile.php?Id=<?php echo $stud['User_Id'] ?>">View Details</a></td> -->
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

<?php endContainer($path); ?>