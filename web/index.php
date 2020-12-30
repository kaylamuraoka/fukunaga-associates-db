<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
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
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- Font Awesome kit's code -->
  <script src="https://kit.fontawesome.com/b7705bf7e8.js" crossorigin="anonymous"></script>
  <title>Dashboard</title>
</head>

<body>
  <!-- Navbar content -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
      aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Fukunaga & Associates</a>
    <div class="collapse navbar-collapse" id="navbarToggler">
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
        <!-- Log out -->
        <li class="nav-item">
          <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
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

  <!-- jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>

</body>

</html>