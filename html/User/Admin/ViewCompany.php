<?php
// $path = "../..";
// $user = "Admin";
// require_once "$path/Function/Basic.php";
// require_once "$path/Function/Database.php";
// $db = new Database();
// $students = $db->Execute_All("select * from studentprofile");

// startContainer($path, $user);
// $th = new TableHelper();
// $th->table("Available Companies" , "select p1.User_Id, Company_Name, Industry_Sector, Company_Address, HR_Name, HR_Contact, Company_URL from companyprofile p1 inner join companyprofile2 p2  on p1.User_Id = p2.User_Id", 0, 1, 1);
// // $th->table("Users" , "select Id, Usertype,Email,Password,Created_at from Users", 1, 1, 1);
//  endContainer($path); ?>


<?php
$path = "../..";
$user = "Admin";
require_once "$path/Function/Basic.php";
require_once "$path/Function/Database.php";
$db = new Database();
$companies = $db->Execute_All("select * from companyprofile p1 inner join companyprofile2 p2  on p1.User_Id = p2.User_Id ");
startContainer($path, $user);
?>

<div class="card" style="margin-left:35px;margin-right:35px;margin-top:35px;">
                <h5 class="card-header"></h5>
                <h5 class="card-header">Available Companies</h5>

                <div class="card-body">
                  
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                     <thead>
                        <tr>
                          <th>Company Name</th>
                          <th>Company Type</th>
                          <th>Company Branch</th>
                          <th>Hr Name</th>
                          <th>HR Contact</th>
                          <th>Website Link</th>
                          <!-- <th>Details</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          foreach($companies as $company){
                        ?>
                        <tr>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $company['Company_Name'] ?></strong>
                          </td>
                          <td><?php echo $company['Industry_Sector']?></td>
                          <td><?php echo $company['Company_Address']?> </td>
                          <td><?php echo $company['HR_Name'] ?></td>
                          <td><?php echo $company['HR_Contact'] ?></td>
                          <td><a href="http://<?php echo $company['Company_URL'] ?>" title="<?php echo $company['Company_URL'] ?>">GOTO Web</a></td>
                          <td><a href="./Operation.php?Com_Id=<?php echo $company['User_Id'] ?>">Delete</a></td>
                          <!-- <td><a class="btn btn-primary" href="../../User/Company/Profile.php?Id=<?php echo $company['User_Id']?>">View Details</a></td> -->
                        </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

<?php endContainer($path); ?>