<?php include "../functions/basic.php"; ?>
<?php include "../functions/Student.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Basic Details</title>
</head>
<body>
    <!-- Header Portion Starts -->
    <?php headtag(); StudHeader(); ?> 
    <!-- Header Portion Ends-->

    <!-- Main Content Starts Here -->
    <div class="col-xl" style="margin-top: 30px; margin-left: 30px; margin-right: 30px;">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Company Basic Details</h5>
                <small class="text-muted float-end">Merged input group</small>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class="bx bx-user"></i>
                            </span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                   placeholder="John Doe" aria-label="John Doe"
                                   aria-describedby="basic-icon-default-fullname2" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Company</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text">
                                <i class="bx bx-buildings"></i>
                            </span>
                            <input type="text" id="basic-icon-default-company" class="form-control"
                                   placeholder="ACME Inc." aria-label="ACME Inc."
                                   aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-email">Email</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input type="text" id="basic-icon-default-email" class="form-control"
                                   placeholder="john.doe" aria-label="john.doe"
                                   aria-describedby="basic-icon-default-email2" />
                            <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                        </div>
                        <div class="form-text">You can use letters, numbers & periods</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text">
                                <i class="bx bx-phone"></i>
                            </span>
                            <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                   placeholder="658 799 8941" aria-label="658 799 8941"
                                   aria-describedby="basic-icon-default-phone2" />
                        </div>
                    </div>
                    <!-- <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-message">Message</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text">
                                <i class="bx bx-comment"></i>
                            </span>
                            <textarea id="basic-icon-default-message" class="form-control"
                                      placeholder="Hi, Do you have a moment to talk Joe?"
                                      aria-label="Hi, Do you have a moment to talk Joe?"
                                      aria-describedby="basic-icon-default-message2"></textarea>
                        </div>
                    </div> -->
                    <!-- pop up model starts-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                        Next
                    </button>
                    <!-- pop up model ends -->
                    <?php include "./TnC.php"; ?>
                </form>
            </div>
        </div>
    </div>
    <!-- Main Content Ends Here -->

    <!-- Footer Portion Starts -->
    <?php Footer() ?>
    <!-- Footer Portion Ends -->
</body>
</html>
