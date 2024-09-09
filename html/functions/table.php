<?php

function JobList($user){
    echo "
    <!-- Hoverable Table rows -->
     <div class='card' style='margin-top:30px; margin-left:30px; margin-right:30px;'>
                <h5 class='card-header'>Available Companies For Applaying</h5>
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
                          <a type='button' href='JobDescription.php' class='btn btn-info'>View Details</a>
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
                          <a type='button' href='./JobDescription.php' class='btn btn-info'>View Details</a>
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
