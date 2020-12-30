<!-- Include the page header -->
<?php
  include('layouts/header.php');
?>

<!-- This Page renders the Email Entry Form to reset password content below -->
<section id="main-site">
  <h1>Hello</h1>
  <form class="login-form" action="enter_email.php" method="post">
    <h2 class="form-title">Reset password</h2>
    <!-- form validation messages -->
    <?php include('registration/errors.php'); ?>
    
    <!-- Email Input Fields -->
    <label>Please enter your email address</label>
    <div class="form-group">
      <i class="fas fa-envelope"></i>
      <input type="email" required name="email" id="email" class="form-control" placeholder="Email">
    </div>
    <div class="form-group">
      <button type="submit" name="reset-password" class="login-btn">Submit</button>
    </div>
  </form>
</section>

<!-- Include page footer -->
<?php
  include("layouts/footer.php");
?>

