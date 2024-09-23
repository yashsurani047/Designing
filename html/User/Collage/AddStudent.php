<?php
$path = "../..";
$user = "Collage";

require "$path/functions/basic.php";
startContainer($path, $user);
?>


<div class="tab-content">
  <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
    <div class="card mb-4">
      <h5 class="card-header">Add Student Details</h5>

      <hr class="my-0" />
      <div class="card-body">
        <form id="formAccountSettings" method="POST" onsubmit="return false">
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="firstName" class="form-label">First Name</label>
              <input class="form-control" type="text" id="firstName" name="firstName" placeholder="Enter First Name"
                autofocus />
            </div>
            <div class="mb-3 col-md-6">
              <label for="lastName" class="form-label">Last Name</label>
              <input class="form-control" type="text" name="lastName" id="lastName" placeholder="Enter Last Name" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="lastName" class="form-label">Father Name</label>
              <input class="form-control" type="text" name="lastName" id="lastName" placeholder="Enter Father Name" />
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label" for="phoneNumber">Parents Number</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">IN (+91)</span>
                <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="90********" />
              </div>
            </div>
            <div class="mb-3 col-md-6">
              <label for="email" class="form-label">E-mail</label>
              <input class="form-control" type="text" id="email" name="email" placeholder="example@gmail.com" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="organization" class="form-label">Stream</label>
              <input type="text" class="form-control" id="organization" name="organization" placeholder="MCA" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="organization" class="form-label">Enrollment No.</label>
              <input type="text" class="form-control" id="organization" name="organization" placeholder="MCA" />
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label" for="phoneNumber">Phone Number</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">IN (+91)</span>
                <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="90********" />
              </div>
            </div>
            <div class="mb-3 col-md-6">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="state" class="form-label">State</label>
              <input class="form-control" type="text" id="state" name="state" placeholder="Gujarat" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="zipCode" class="form-label">Zip Code</label>
              <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="360002" maxlength="6" />
            </div>

            <div class="mb-3 col-md-6">
              <label for="language" class="form-label">Language</label>
              <select id="language" class="select2 form-select">
                <option value="">Select Language</option>
                <option value="en">English</option>
                <option value="fr">Gujarati</option>
                <option value="de">Hindi</option>
                <option value="pt">Sanskrit</option>
              </select>
            </div>


          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>
            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  <?php endContainer($path); ?>