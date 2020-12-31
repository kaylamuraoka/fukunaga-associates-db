<!-- Include the page header -->
<?php
  include('layouts/header.php');
?>

<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('registration/register-process.php');
  }
?>

<!-- registration area -->
<section id="register">
  <div class="row m-0">
    <div class="col-lg-12">
      <div class="text-center pb-5">
        <h1 class="login-title text-dark">Create Account</h1>
        <p class="p-1 m-0 font-ubuntu text-black-50">Welcome! It's quick and easy to set up an account.</p>
      </div>

      <!-- Upload Photo Section -->
      <div class="upload-profile-image d-flex justify-content-center pb-5">
        <div class="text-center">
          <div class="d-flex justify-content-center">
            <i class="fas fa-camera camera-icon"></i>
          </div>
          <img src="../assets/images/profile/default_avatar.png" style="width:auto; height:200px" class="img rounded-circle" alt="profile">
          <small class="form-text text-black-50">Choose Image</small>
          <input type="file" form="reg-form" class="form-control-file" name="profileUpload" id="upload-profile">
        </div>
      </div>

      <!-- Registration Form -->
      <div class="d-flex justify-content-center">
        <form action="https://fukunaga-associates-db.herokuapp.com/register.php" method="POST" enctype="multipart/form-data" id="reg-form">

          <?php include('registration/errors.php'); ?>
          
          <!-- Input fields for name -->
          <div class="form-row">
            <div class="col">
              <input type="text" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>" required name="firstName" id="firstName" class="form-control" placeholder="First Name*">
            </div>
            <div class="col">
              <input type="text" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>" required name="lastName" id="lastName" class="form-control" placeholder="Last Name*">
            </div>
          </div>

          <!-- Input field for email -->
          <div class="form-row my-4">
            <div class="col">
              <input type="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required name="email" id="email" class="form-control" placeholder="Email*">
            </div>
          </div>

          <!-- Input field for password-->
          <div class="form-row my-4">
            <div class="col">
              <input type="password" required name="password" id="password" class="form-control" placeholder="Password*">
              <!-- Strong Password Validation -->
              <small class="text-black-50">Password must meet the following requirements:</small><br>
              <small id="pwdLength"><i id="lengthCheck" class="fas"></i> 8-20 characters</small><br>
              <small id="pwdCapital"><i id="capCheck" class="fas"></i> At least one capital letter</small><br>
              <small id="pwdNum"><i id="numCheck" class="fas"></i> At least one number</small><br>
              <small id="pwdSpaces"><i id="spacesCheck" class="fas"></i> No spaces</small><br>
            </div>
          </div>

          <!-- Input field for confirm password -->
          <div class="form-row my-4">
            <div class="col">
              <input type="password" required name="confirm_pwd" id="confirm_pwd" class="form-control" placeholder="Confirm Password*">
              <small id="pwd-validation"></small>
            </div>
          </div>

          <span class="text-black-50">By clicking "Submit," you agree to the storage and handling of your data by this website in accordance with our <a href="#">Privacy Policy</a></span>

          <!-- Submit button -->
          <button type="submit" class="my-4">Submit</button>

          <span class="text-black-50">Already a member? <a class="link" href="login.php">Login here</a></span>

        </form>
      </div>
    </div>
  </div>
</section>

<!-- Include page footer -->
<?php
  include("layouts/footer.php");
?>
