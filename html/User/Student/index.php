<head>
  <?php
  $path = "../..";
  $user = "Student";

  require "$path/functions/basic.php";
  startContainer($path, $user);
  ?>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar layout-without-menu">
    <div class="layout-container">
      <!-- Layout container -->
      <div class="layout-page">


        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Layout Demo -->
            <div class="layout-demo-wrapper">

              <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                  <div class="row">
                    <div class="col-lg-8 mb-4 order-0">
                      <div class="card">
                        <div class="d-flex align-items-end row">
                          <div class="col-sm-7">
                            <div class="card-body">
                              <h5 class="card-title text-primary">Congratulations Yash Surani 🎉</h5>
                              <p class="mb-4">
                                You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                                your profile.
                              </p>

                              <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                            </div>
                          </div>
                          <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                              <img src="<?php echo $path ?>/assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" yellow-star-rating-15605
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 order-1">
                      <div class="row">
                        <div class="col-lg-6 col-md-12 col-6 mb-2">
                          <div class="card">
                            <div class="card-body">
                              <div class="card-title d-flex align-items-start justify-content-between">
                                <img src="<?php echo $path?>/assets/img/illustrations/Rating.png" height="35" alt="View Badge User" />
                              </div>
                              <span>Ratings</span>
                              <?php include("$path/Partial/Rating.php"); ?>
                              <span class="fw-semibold d-block mb-1">Your Rating (12,628)</span>
                              <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                          <div class="card">
                            <div class="card-body">
                              <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                  <img src="<?php echo $path ?>/assets/img/illustrations/Skills.png" alt="Your Skills"
                              
                                    class="rounded" />
                                </div>

                              </div>
                              <span>Skills</span>
                              <h6 class="mt-2">FullStack | ReactJs | Flutter</h6>
                              <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Total Revenue -->
                    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                      <div class="card">
                        <div class="row row-bordered g-0">
                       
                        <div class="col-md">

                  <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
                      <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
                      <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="<?php echo $path ?>/assets/img/illustrations/1.avif" alt="First slide" height="350px" />
                        <div class="carousel-caption d-none d-md-block">
                         
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo $path ?>/assets/img/illustrations/2.avif" alt="Second slide" height="350px"/>
                        <div class="carousel-caption d-none d-md-block">
                        
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo $path ?>/assets/img/illustrations/3.avif" alt="Third slide" height="350px"/>
                        <div class="carousel-caption d-none d-md-block">
                        
                        </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </a>
                  </div>
                </div>
                       
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
                                  <img src="<?php echo $path ?>/assets/img/illustrations/Participates.png" alt="Credit Card"
                                    class="rounded" />
                                </div>
                                <div class="dropdown">
                                  <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">

                                  </button>

                                </div>
                              </div>
                              <span class="d-block mb-1">Participates</span>
                              <h3 class="card-title text-nowrap mb-2">(2)</h3>
                              <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> 14.82%</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-6 mb-4">
                          <div class="card">
                            <div class="card-body">
                              <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                  <img src="<?php echo $path ?>/assets/img/illustrations/Applying.png" alt="Credit Card"
                                    class="rounded" />
                                </div>
                                <div class="dropdown">


                                  </button>

                                </div>
                              </div>
                              <span class="fw-semibold d-block mb-1">Applying</span>
                              <h3 class="card-title mb-2">(3)</h3>
                              <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
                            </div>
                          </div>
                        </div>
                        <!-- </div>
                            <div class="row"> -->
                       
                      </div>
                    </div>
                  </div>
                </div>
                <!-- / Content -->
              </div>
              <!--/ Layout Demo -->
            </div>
            <!-- / Content -->

            <!--  Header Starts here-->
            <?php endContainer($path); ?>
            <!-- Header Ends Here -->

</body>

</html>