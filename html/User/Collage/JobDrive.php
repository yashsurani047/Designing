<?php
$path = "../..";
$user = "College";

require "$path/functions/basic.php";
startContainer($path, $user);
?>
    </head>

<body>

  <!-- Bordered Table -->
  <div class="card" style="margin-left:35px;margin-right:35px;margin-top:35px;">
                <h5 class="card-header"></h5>
                <div class="card-body">
                  
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                     <thead>
                        <tr>
                          <th>Company Name</th>
                          <th>Job Role</th>
                          <th>Company Working Time</th>
                          <th>Company Working Mode</th>
                          <th>Company CTC</th>
                          <th>Actions</th>
                          <th>Details</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Amazon Ecommerce</strong>
                          </td>
                          <td>Stock Handler</td>
                          <td>
                            09:00-AM To 05:00-PM
                          </td>
                          <td>Offline(Office)</td>
                          <td>
                           10.30Lpa    
                          </td>
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
                          <td>
                          <a class="btn btn-primary" href="CompanyDetails.php">
                                  View Details
                                </a>
                          </td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>Riwzon Pvt.Ltd</strong></td>
                          <td>Stock Manager</td>
                          <td>
                          09:00-AM To 05:00-PM
                          </td>
                          <td>    
                            Offline(Office)
                          </td>
                          <td>
                           15Lpa
                          </td>
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
                          <td>
                          <a class="btn btn-primary" href="CompanyDetails.php">
                                  View Details
                                </a>
                          </td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>Enforce Technology</strong></td>
                          <td>Digital Marketing</td>
                          <td>
                          09:00-AM To 05:00-PM
                          </td>
                          <td>
                            Office
                          </td>
                          <td>
                            6.45Lpa
                          </td>
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
                          <td>
                          <a class="btn btn-primary" href="CompanyDetails.php">
                                  View Details
                                </a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Nestle Foods</strong>
                          </td>
                          <td>Manufacturer handler</td>
                          <td>
                          09:00-AM To 05:00-PM

                          </td>
                          <td>
                            Offline(Office)
                          </td>
                          <td>
                            3.45Lpa
                          </td>
                         
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
                          <td>
                          <a class="btn btn-primary" href="CompanyDetails.php">
                                  View Details
                                </a>
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
