<!-- Include the page header -->
<?php
  include('layouts/login/header.php');
?>

<!-- This Page renders the Email Entry Form to reset password content below -->
<section id="registration">
  <div class="form-container">
    <form action="new_pass.php" method="post">
      <h1>New password</h2>
      <!-- Directions -->
      <h5 class="text-muted pb-4">Enter a new password for your account.</h5>

      <!-- form validation messages -->
      <?php include('registration/errors.php'); ?>

      <!-- Password Input Field -->
      <!-- Input field for password-->
      <div class="input-group mb-0">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-lock"></i></span>
        </div>
        <input type="password" required name="password" id="password" class="form-control" placeholder="Password">
      </div>
      <!-- Strong Password Validation -->
      <div class="text-left mb-4">
        <small class="text-black-50">Password requirements:</small><br>
        <small id="pwdLength"><i id="lengthCheck" class="fas"></i> 8-20 characters</small><br>
        <small id="pwdCapital"><i id="capCheck" class="fas"></i> At least one capital letter</small><br>
        <small id="pwdNum"><i id="numCheck" class="fas"></i> At least one number</small><br>
        <small id="pwdSpaces"><i id="spacesCheck" class="fas"></i> No spaces</small><br>
      </div>
      
      <!-- Input field for confirm password -->
      <div class="input-group mb-0">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-lock"></i></span>
        </div>
        <input type="password" required name="confirm_pwd" id="confirm_pwd" class="form-control" placeholder="Confirm Password">
      </div>
      <small id="pwd-validation" class="pb-4"></small>

      <!-- Submit -->
        <button type="submit" name="new_password">Submit</button>

        <!-- Back to login -->
       <a href="login.php">Go Back to login</a>
    </form>  
  </div>
</section>

<!-- Include page footer -->
<?php
  include("layouts/login/footer.php");
?>