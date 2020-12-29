<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
include('layouts/header.php');
include('registration/helper.php');

$user = array();
// If the user is not logged in redirect to the login page...
if(isset($_SESSION['userID'])){
  require('config/db.php');
  $user = get_user_info($conn, $_SESSION['userID']);
} else {
  header('Location: login.php');
	exit;
}

?>

<section id="main-site">
  <div class="container py-5">
    <div class="row">
      <div class="col-4 offset-4 shadow py-4">
        <div class="upload-profile-image d-flex justify-content-center pb-5">
          <div class="text-center">
            <img class="img rounded-circle" style="width: 200px; height: 200px;" src="<?php echo isset($user['profileImg']) ? $user['profileImg']:'./assets/images/profile/default_avatar.png';?>" alt="profile">
            <h4 class="py-3">
              <h5>Welcome back, 
              <?php
              if(isset($user['firstName'])){
              printf('%s %s', $user['firstName'], $user['lastName']);
              }
              ?>
              </h5>
            </h4>
          </div>
        </div>
          
        <!-- logged in user information -->
        <div class="user-info px-3">
          <ul class="font-ubuntu navbar-nav">
            <li class="nav-link"><b>First Name: </b><span><?php echo isset($user['firstName']) ? $user['firstName']:'';?></span></li>
            <li class="nav-link"><b>Last Name: </b><span><?php echo isset($user['lastName']) ? $user['lastName']:'';?></span></li>
            <li class="nav-link"><b>Email: </b><span><?php echo isset($user['email']) ? $user['email']:'';?></span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>