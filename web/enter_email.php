<!-- Include the page header -->
<?php
  include('layouts/header.php');
?>

<!-- This Page renders the Email Entry Form to reset password content below -->
<section id="registration">
  <div class="form-container">
    <form action="enter_email.php" method="post">
      <h1>Reset your password</h2>
      <!-- Directions -->
      <h5 class="text-muted pb-4">To reset your password, enter your email address and we'll send you an email with instructions.</h5>

      <!-- form validation messages -->
      <?php include('registration/errors.php'); ?>

      <!-- Email Input Field -->
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
        </div>
          <input type="email" required name="email" id="email" class="form-control" placeholder="Email Address">
      </div>
        <!-- Submit -->
        <button type="submit" name="reset-password">Next</button>

        <!-- Back to login -->
       <a href="login.php">Go Back</a>
    </form>  
  </div>
</section>

<!-- Include page footer -->
<?php
  include("layouts/footer.php");
?>