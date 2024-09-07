<?php
$path = "../";
$user = "College";

require "$path/functions/basic.php";
startContainer($path, $user);
?>
<div class="tab-content">
        <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
           <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
                <div class="card-body">
                  <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img
                      src="assets/img/avatars/1.png"
                      alt="user-avatar"
                      class="d-block rounded"
                      height="100"
                      width="100"
                      id="uploadedAvatar"
                    />
                    <div class="button-wrapper">
                    </div>
                  </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                  <form id="formAccountSettings" method="POST" onsubmit="return false">
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">Company Name</label>
                        <input
                          class="form-control"
                          type="text"
                          id="firstName"
                          name="firstName"
                          placeholder=""
                          autofocus
                        />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Job Role</label>
                        <input class="form-control" type="text" name="lastName" id="lastName" placeholder="" />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Job Type</label>
                        <input class="form-control" type="text" name="lastName" id="lastName" placeholder="" />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Company Type</label>
                        <input class="form-control" type="text" name="lastName" id="lastName" placeholder="" />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label" for="phoneNumber">Company Number</label>
                        <div class="input-group input-group-merge">
                          <span class="input-group-text">IN (+91)</span>
                          <input
                            type="text"
                            id="phoneNumber"
                            name="phoneNumber"
                            class="form-control"
                            placeholder=""
                          />
                        </div>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Company E-mail</label>
                        <input
                          class="form-control"
                          type="text"
                          id="email"
                          name="email"
                          placeholder=""
                        />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="organization" class="form-label">CTC</label>
                        <input
                          type="text"
                          class="form-control"
                          id="organization"
                          name="organization"
                          placeholder="MCA"
                        />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                        <div class="input-group input-group-merge">
                          <span class="input-group-text">IN (+91)</span>
                          <input
                            type="text"
                            id="phoneNumber"
                            name="phoneNumber"
                            class="form-control"
                            placeholder="90********"
                          />
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
                        <input
                          type="text"
                          class="form-control"
                          id="zipCode"
                          name="zipCode"
                          placeholder="360002"
                          maxlength="6"
                        />
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
                      <button type="submit" class="btn btn-primary me-2">Accept</button>
                    </div>
                  
                  </form>
                </div>
                <!-- /Account -->
              </div>
             </div>
        <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
            <div class="card">
                
                    </div>
                  </div>
                </div>
              </div>
        </div>
      </div>
      

      <?php endContainer($path); ?>
