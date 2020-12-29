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
 <section id="login">
  <div class="modal-dialog text-center">
    <div class="col-sm-10 col-md-9 col-lg-8 main-section">
      <div class="modal-content">
        <div class="col-12 user-img">
          <img src="<?php echo isset($user['profileImg']) ? $user['profileImg']:'./assets/images/profile/default_avatar.png';?>" class="img rounded-circle" alt="profile">
        </div>
        <form action="https://fukunaga-associates-db.herokuapp.com/login.php" method="POST" enctype="multipart/form-data" id="log-form">
          <!-- Email Input Fields -->
          <div class="form-group">
            <i class="fas fa-envelope"></i>
            <input type="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required name="email" id="email" class="form-control" placeholder="Email">
          </div>
          <!-- Password Input Fields -->
          <div class="form-group">
            <i class="fas fa-lock"></i>
            <input type="password" required name="password" id="password" class="form-control" placeholder="Password">
            <!-- Forgot Password Link -->
            <div class="row forgot">
              <div class="col float-left">
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="rememberMe" class="form-check-input">
                  <label for="rememberMe" class="form-check-label font-ubuntu text-black-50">Remember me</label>
                </div>
              </div>
              <div class="col float-right">
                <div class="forgot">
                  <a>Forgot Password?</a>
                </div>
              </div>  
            </div>
          </div>
          <!-- Login Button -->
          <div class="submit-btn text-center my-5">
            <button type="submit" name="login-btn" class="btn"><i class="fas fa-sign-in-alt icon"></i>Login</button>
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