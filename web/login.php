<!-- Include the page header -->
<?php
  include('layouts/login/header.php');
  include('registration/helper.php');
?>

<?php
$user = array();
require('config/db.php');

if(isset($_SESSION['userID'])){
  $user = get_user_info($conn, $_SESSION['userID']);
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  require('registration/login-process.php');
}
?>

<!-- This Page renders the Login Form content below -->
<section id="registration">
  <div class="form-container">
    <form action="https://fukunaga-associates-db.herokuapp.com/login.php" method="POST" enctype="multipart/form-data" id="log-form">
      <h1>Sign In</h1>
      <h5 class="text-muted pb-4">Sign in with your email and password.</h5>
      <!-- form validation messages -->
      <?php include('registration/errors.php'); ?>
      
      <!-- Email Input Field -->
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
        </div>
          <input type="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required name="email" id="email" class="form-control" placeholder="Email Address">
      </div>
          
      <!-- Password Input Field -->
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-lock"></i></span>
        </div>
        <input type="password" required name="logPassword" id="logPassword" class="form-control" placeholder="Password">
      </div>

      <!-- Forgot Password Link -->
      <a href="enter_email.php" class="my-0">Forgot password?</a>

      <!-- Login Button -->
      <button type="submit" name="login-btn" class="my-4"></i>Sign In</button>
            
      <!-- Create an account -->
      <span>Not yet a member? <a href="register.php">Signup now</a></span>
    </form>
  </div>
</section>
<!-- Include page footer -->
<?php
  include("layouts/login/footer.php");
?>