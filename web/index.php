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
  <!-- Navbar content -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
      aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Fukunaga & Associates</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <!-- Home -->
        <li class="nav-item active">
          <a class="nav-link" href="#"><i class="fas fa-home"></i> Home<span class="sr-only">(current)</span></a>
        </li>
        <!-- Calendar -->
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-calendar-alt"></i> Calendar</a>
        </li>
        <!-- News & Updates -->
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-bell"></i> News & Updates</a>
        </li>
        <!-- Projects -->
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-folder-open"></i> Projects</a>
        </li>
        <!-- Tasks -->
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-tasks"></i> Tasks</a>
        </li>
        <!-- Settings -->
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-cog"></i> Settings</a>
        </li>
      </ul>
    </div>
  </nav>

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