<?php
$path = "../..";
$user = "Admin";
require_once "$path/Function/Basic.php";
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
                          <th>Hr Name</th>
                          <th>Contact</th>
                          <th>Website Link</th>
                          <th>Details</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>LansKart.com</strong>
                          </td>
                          <td>Pvt.Ltd</td>
                          <td>
                           Piyush Bansal
                          </td>
                          <td>
                            9098765430
                          </td>
                          <td>
                           www.lanskart.com    
                          </td>
                          <td>
                          <a class="btn btn-primary" href="../../User/Company/Profile.php">
                                  View Details
                                </a>
                          </td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>Amazon</strong></td>
                          <td>Pvt.Ltd</td>
                          <td>
                            Pritam Roy
                          </td>
                          <td>
                            9754546678
                          </td>
                          <td>
                            www.amazon.com
                          </td>
                         
                          <td>
                          <a class="btn btn-primary" href="../../User/Company/Profile.php">
                                  View Details
                                </a>
                          </td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>Tencent</strong></td>
                          <td>TM</td>
                          <td>
                            Krishna Agarwal
                          </td>
                          <td>
                            8756475645
                          </td>
                          <td>
                            www.tencent.com
                          </td>
                         
                          <td>
                          <a class="btn btn-primary" href="../../User/Company/Profile.php">
                                  View Details
                                </a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Reliance Indestries</strong>
                          </td>
                          <td>Mohit Sharma</td>
                          <td>
                             Rishi Singh
                          </td>
                          <td>
                            8778565434
                          </td>
                          <td>
                            www.ril.com
                          </td>
                         
                        
                          <td>
                          <a class="btn btn-primary" href="../../User/Company/Profile.php">
                                  View Details
                                </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

<?php endContainer($path); ?>