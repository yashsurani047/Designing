<head>
<?php
$path = "../..";
$user = "Company";

require "$path/functions/basic.php";
startContainer($path, $user);
?>
    </head>

<body>

<div class="card" style="margin-left:35px;margin-right:35px;margin-top:35px;">
                <h5 class="card-header"></h5>
                <h5 class="card-header">Available Colleges</h5>

                <div class="card-body">
                  
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                     <thead>
                        <tr>
                          <th>College Name</th>
                          <th>College / University</th>
                          <th>TPO Head</th>
                          <th>Contact</th>
                          <th>Website Link</th>
                          <th>Details</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>IIT - Delhi</strong>
                          </td>
                          <td>IIT Institute</td>
                          <td>
                             Sachin Bansal
                          </td>
                          <td>
                            9098765430
                          </td>
                          <td>
                           www.iitdelhi.com    
                          </td>
                          <td>
                          <a class="btn btn-primary" href="../../User/Company/ViewCollege.php">
                                  View Details
                                </a>
                          </td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>IIt-Bombay</strong></td>
                          <td>IIt Bombay Institute</td>
                          <td>
                          Binny Bansal
                          </td>
                          <td>
                            9754546678
                          </td>
                          <td>
                            www.iitbombay.com
                          </td>
                         
                          <td>
                          <a class="btn btn-primary" href="../../User/Company/ViewCollege.php">
                                  View Details
                                </a>
                          </td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>IIt-Roorkee</strong></td>
                          <td>IIt-Roorkee Institute</td>
                          <td>
                            Piyush Bansal
                          </td>
                          <td>
                            8756475645
                          </td>
                          <td>
                            www.iitroorkee.com
                          </td>
                         
                          <td>
                          <a class="btn btn-primary" href="../../User/Company/ViewCollege.php">
                                  View Details
                                </a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Lovely University</strong>
                          </td>
                          <td>Lovely University</td>
                          <td>
                              Nikhil Kamath
                          </td>
                          <td>
                            8778565434
                          </td>
                          <td>
                            www.lovelyuniversity.in
                          </td>
                         
                        
                          <td>
                          <a class="btn btn-primary" href="../../User/Company/ViewCollege.php">
                                  View Details
                                </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table --> <?php endContainer($path); ?>
</body>
