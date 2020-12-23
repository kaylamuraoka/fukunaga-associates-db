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
        <p class="p-1 m-0 font-ubuntu text-black-50">Please enter your name, email address and password to create an account.</p>
        <span class="font-ubuntu text-black-50">Already have an account? <a href="login.php">Login here</a>.</span>
      </div>
      <div class="upload-profile-image">
        <div class="text-center">
          <div class="d-flex justify-content-center">
            <i class="fas fa-camera"></i>
          </div>
          <img src="../assets/images/profile/user-avatar.jpg" class="img rounded-circle" alt="profile">
          <small class="form-text text-black-50">Choose Image</small>
          <input type="file" class="form-control-file" name="profileUpload" id="upload-profile">
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Include page footer -->
<?php
  include("layouts/footer.php");
?>