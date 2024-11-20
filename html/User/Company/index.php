<head>
  <?php
  $path = "../..";
  $user = "Company";
  require_once "$path/Function/Basic.php";
  require_once "$path/Function/Database.php";
  $db = new Database();
  $user1 = $db->Execute_one("select * from Users where Id = $_SESSION[Userid]");
  startContainer($path, $user);
  ?>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-8 mb-4 order-0">

        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">

                <h5 class="card-title text-primary">Good Morning/Afternoon/Evening! <?php echo $user1["Username"] ?></h5>
                <p class="mb-4">
                  You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                  your profile.
                </p>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img src="<?php echo $path ?>/assets/img/illustrations/man-with-laptop-light.png" height="140"
                  alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="<?php echo $path ?>/assets/img/icons/unicons/chart-success.png" alt="chart success"
                      class="rounded" />
                  </div>
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">
                      <!-- <i class="bx bx-dots-vertical-rounded"></i> -->
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    </div>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Applied Students</span>
                <h3 class="card-title mb-2">7+</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>Today
                  +20.80%</small>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="<?php echo $path ?>/assets/img/icons/unicons/wallet-info.png" alt="Credit Card"
                      class="rounded" />
                  </div>
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">
                      <!-- <i class="bx bx-dots-vertical-rounded"></i> -->
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    </div>
                  </div>
                </div>
                <span>Total Selected</span>
                <h3 class="card-title text-nowrap mb-1">5+</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>Today
                  +28.10%</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Revenue -->
      <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
          <div class="row row-bordered g-0">

            <div class="row g-0">
              <div class="col-md-4">
                <img class="card-img card-img-left" src="<?php echo $path ?>/assets/img/elements/12.jpg"
                  alt="Card image" />
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $user1["Username"] ?></h5>
                  <p class="card-text">
                  <?php echo $user1["Username"] ?> is a leading IT company specializing in innovative software solutions and digital
                    transformation services. With a focus on delivering cutting-edge technology, the company caters to a
                    wide range of industries to drive business efficiency and growth.
                  </p>
                </div>
              </div>
            </div>
            <!-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> -->
          </div>
        </div>
      </div>
      <!--/ Total Revenue -->
      <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
        <div class="row">
          <div class="col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="<?php echo $path ?>/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                      class="rounded" />
                  </div>
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">
                      <!-- <i class="bx bx-dots-vertical-rounded"></i> -->
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    </div>
                  </div>
                </div>
                <span class="d-block mb-1">Ongoing Interviews</span>
                <h3 class="card-title text-nowrap mb-2">3+</h3>
              </div>
            </div>
          </div>
          <div class="col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="<?php echo $path ?>/assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                      class="rounded" />
                      
                  </div>
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">
                      <!-- <i class="bx bx-dots-vertical-rounded"></i> -->
                    </button>
                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">New Employees</span>
                <h3 class="card-title mb-2">4+</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>Last Week
                  +28.14%</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endContainer($path); ?>