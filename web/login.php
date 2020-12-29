<!-- Include the page header -->
<?php
  include('layouts/header.php');
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
  <div class="modal-dialog text-center">
    <div class="col-sm-10 col-md-9 col-lg-9 my-4">
      <div class="modal-content">
        <div class="col-12 user-img">
          <img src="<?php echo isset($user['profileImg']) ? $user['profileImg']:'./assets/images/profile/default_avatar.png';?>" class="img rounded-circle" alt="profile">
        </div>
        <h1 class="login-title text-light">Login</h1>
        <form action="https://fukunaga-associates-db.herokuapp.com/login.php" method="POST" enctype="multipart/form-data" id="log-form">
          <?php include('registration/errors.php'); ?>
          <!-- Email Input Fields -->
          <div class="form-group">
            <i class="fas fa-envelope"></i>
            <input type="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required name="email" id="email" class="form-control" placeholder="Email">
          </div>
          <!-- Password Input Fields -->
          <div class="form-group">
            <i class="fas fa-lock"></i>
            <input type="password" required name="logPassword" id="logPassword" class="form-control" placeholder="Password">
            <!-- Forgot Password Link -->
            <div class="row">
              <div class="col float-left">
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="rememberMe" class="form-check-input">
                  <label for="rememberMe" class="form-check-label font-ubuntu text-light font-weight-bold">Remember me</label>
                </div>
              </div>
              <div class="col float-right">
                <a class="link font-weight-bold" href="#">Forgot Password?</a>
              </div>  
            </div>
          </div>
          <!-- Login Button -->
          <button type="submit" name="login-btn" class="btn"><i class="fas fa-sign-in-alt icon"></i>Sign In</button>
        </form>
        <!-- Create an account -->
        <p class="font-ubuntu text-light font-weight-bold">Don't have an account? <a class="link font-weight-bold" href="register.php">Sign Up</a></p>
      </div>
    </div>
  </div>

<!-- Include page footer -->
<?php
  include("layouts/footer.php");
?>