<?php
$path = "../..";
$user = "Admin";
require_once "$path/Function/Basic.php";
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
                          <th>College/university Name</th>
                          <th>Student Branch</th>
                          <th>Student Batch</th>
                          <th>Contact</th>
                          <th>Student Email</th>
                          <th>Details</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Rajan Mehta</strong>
                          </td>
                          <td>M.S.U Baroda</td>
                          <td>B.Tech</td>
                          <td>
                            1-Semester
                          </td>
                          <td>
                            9098765430
                          </td>
                          <td>
                          RajanM01@msu.ac.in
                          </td>
                          <td>
                          <a class="btn btn-primary" href="../../User/Student/Profile.php">
                                  View Details
                                </a>
                          </td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>Yash Soni</strong></td>
                          <td>Ahmedabad University</td>
                          <td>M.Pharm</td>
                          <td>
                           3-Semester
                          </td>
                          <td>
                            9754546678
                          </td>
                          <td>
                            ysoni@ahu.ac.in
                          </td>
                         
                          <td>
                          <a class="btn btn-primary" href="../../User/Student/Profile.php">
                                  View Details
                                </a>
                          </td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>Krina Patel</strong></td>
                          <td>  Karnavati University</td>
                          <td>
                          B.sc-Micro
                          </td>
                          <td>
                          4-Semester
                          </td>
                          <td>
                            9056575748
                          </td>
                          <td>
                           krina@kau.ac.in
                          </td>
                         
                          <td>
                          <a class="btn btn-primary" href="../../User/Student/Profile.php">
                                  View Details
                                </a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Mihir Dobariya</strong>
                          </td>
                          <td>Nirma University</td>
                          <td>
                             MCA
                          </td>
                          <td>
                            6-Semester
                          </td>
                          <td>
                            8909876543
                          </td>
                          <td>
                           mihird@nirma.adu.in
                          </td>
                         
                        
                          <td>
                          <a class="btn btn-primary" href="../../User/Student/Profile.php">
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