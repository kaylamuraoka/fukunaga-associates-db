<!-- Include the page header -->
<?php
  include('layouts/header.php');
?>

<!-- registration area -->
    <section id="register">
      <div class="row m-0">
        <div class="col-lg-4 offset-lg-2">
          <div class="text-center pb-5">
            <h1 class="login-title text-dark">Create an Account</h1>
            <p class="p-1 m-0 font-ubuntu text-black-50">Please enter your name, email address and password to create an
              account.</p>
            <span class="font-ubuntu text-black-50">Already have an account? <a href="login.php">Login here</a>.</span>
          </div>
          <div class="upload-profile-image d-flex justify-content-center pb-5">
            <div class="text-center">
              <div class="d-flex justify-content-center">
                <i class="fas fa-camera camera-icon"></i>
              </div>
              <img src="../assets/images/profile/default_avatar.png" style="width:200px; height:200px"
                class="img rounded-circle" alt="profile">
              <small class="form-text text-black-50">Choose Image</small>
              <input type="file" class="form-control-file" name="profileUpload" id="upload-profile">
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <form action="register.php" method="post" enctype="multipart/form-data" id="reg-form">
              <div class="form-row">
                <div class="col">
                  <input type="text" required name="firstName" id="firstName" class="form-control"
                    placeholder="First Name*">
                </div>
                <div class="col">
                  <input type="text" required name="lastName" id="lastName" class="form-control"
                    placeholder="Last Name*">
                </div>
              </div>

              <div class="form-row my-4">
                <div class="col">
                  <input type="email" required name="email" id="email" class="form-control" placeholder="Email*">
                </div>
              </div>

              <div class="form-row my-4">
                <div class="col">
                  <input type="password" required name="password" id="password" class="form-control"
                    placeholder="Password*">
                </div>
              </div>

              <div class="form-row my-4">
                <div class="col">
                  <input type="password" required name="confirm_pwd" id="confirm_pwd" class="form-control"
                    placeholder="Confirm Password*">
                  <div id="confirm_error" class="invalid-feedback"></div>
                </div>
              </div>

              <div class="form-check form-check-inline">
                <input type="checkbox" name="agreement" class="form-check-input" required>
                <label for="agreement" class="form-check-label font-ubuntu text-black-50">I agree to the <a
                    href="#">terms and conditions</a> (*)</label>
              </div>

              <div class="submit-btn text-center my-5">
                <button type="submit" class="btn btn-warning rounded-pill text-dark px-5">Continue</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </section>


<!-- Include page footer -->
<?php
  include("layouts/footer.php");
?>