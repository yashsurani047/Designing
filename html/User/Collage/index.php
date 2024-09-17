<head>
<?php
$path = "../..";
$user = "College";

require "$path/functions/basic.php";
startContainer($path, $user);
?>
 </head>

<body>

  <!-- Bordered Table -->
  <div class="card" style="margin-left:30px;margin-right:35px;margin-top:35px;">
                <h5 class="card-header"></h5>
                <div class="card-body">
                  
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                   
                    <div style="text-align:right;">
                   <a class="btn btn-primary" style="margin-bottom:20px;margin-right: 0px;" href="AddStudent.php">Add Student</a>
                   </div>
                     <thead>
                        <tr>
                          <th>Student Name</th>
                          <th>College/University Name</th>
                          <th>Student Stream</th>
                          <th>Enroll.No</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Nayan Patoliya</strong>
                          </td>
                          <td>Gurukul University</td>
                          <td>MCA</td>
                          <td>
                          2021004472
                          </td>
                          <td><span class="badge bg-label-primary me-1">Active</span></td>
                          <td>
                            <div class="dropdown">
                              <button
                                type="button"
                                class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                >
                                <a class="dropdown-item" href="javascript:void(0);"
                                  ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>Gagan Shah</strong></td>
                          <td>Marwadi University</td>
                          <td>B.com</td>
                          <td>
                         2021004435
                          </td>
                          <td><span class="badge bg-label-success me-1">Completed</span></td>
                          <td>
                            <div class="dropdown">
                              <button
                                type="button"
                                class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                >
                                <a class="dropdown-item" href="javascript:void(0);"
                                  ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>Vivek Sidapara</strong></td>
                          <td>Atmiya Unoversity</td>
                          <td>BCA</td>
                          <td>
                             2021005434
                          </td>
                          <td><span class="badge bg-label-info me-1">Suspended</span></td>
                          <td>
                            <div class="dropdown">
                              <button
                                type="button"
                                class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                >
                                <a class="dropdown-item" href="javascript:void(0);"
                                  ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Milan Vekariya</strong>
                          </td>
                          <td>Parul University</td>
                          <td>Bsc.IT</td>
                          <td>
                           2021004473
                          </td>
                          <td><span class="badge bg-label-warning me-1">Pending</span></td>
                          <td>
                            <div class="dropdown">
                              <button
                                type="button"
                                class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                >
                                <a class="dropdown-item" href="javascript:void(0);"
                                  ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table -->
 <?php endContainer($path); ?>
</body>
