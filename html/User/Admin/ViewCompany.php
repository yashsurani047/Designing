<?php
$path = "../..";
$user = "Admin";
require_once "$path/Function/Basic.php";
require_once "$path/Function/Database.php";
$db = new Database();
$companies = $db->Execute("select * from companyprofile p1 inner join companyprofile2 p2  on p1.User_Id = p2.User_Id ");
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
                          <th>Details</th>
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
                          <td>
                          <a class="btn btn-primary" href="../../User/Company/Profile.php?Id=<?php echo $company['User_Id']?>">
                                  View Details
                                </a>
                          </td>
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