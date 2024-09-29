<?php
$path = "../..";
$user = "Company";

require_once "$path/Function/Basic.php";
startContainer($path, $user);
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
                          <th>Employee Name</th>
                          <th>Employee Role</th>
                          <th>Employee Type</th>
                          <th>Jioning Date</th>
                          <th>Employee CTC</th>
                          <th>Details</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Rajan Mehta</strong>
                          </td>
                          <td>Marketing Management</td>
                          <td>
                           Office-Regular
                          </td>
                          <td>01/04/2025</td>
                          <td>
                               4.5Lpa
                          </td>
                          <td>
                          <a class="btn btn-primary" href="ViewRequest.php">
                                  View Details
                                </a>
                          </td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>Nayan Patoliya</strong></td>
                          <td>Web Developer</td>
                          <td>
                          Office-Regular
                          </td>
                          <td>
                            01/09/2026
                          </td>
                          <td>
                            20Lpa
                          </td>
                         
                          <td>
                          <a class="btn btn-primary" href="ViewRequest.php">
                                  View Details
                                </a>
                          </td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>Karan Savaliya</strong></td>
                          <td>Hr Manager</td>
                          <td>
                           Online-WFh
                          </td>
                          <td>02/05/2024</td>
                          <td>
                              2.3Lpa
                          </td>
                         
                          <td>
                          <a class="btn btn-primary" href="ViewRequest.php">
                                  View Details
                                </a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Yug Tarpara</strong>
                          </td>
                          <td>Marketing Hr</td>
                          <td>
                           Office-Regular
                          </td>
                          <td>
                            04/04/2030
                          </td>
                          <td>
                            1.7Lpa
                          </td>
                         
                        
                          <td>
                          <a class="btn btn-primary" href="ViewRequest.php">
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
