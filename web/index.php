<?php

session_start();
include('layouts/header.php');
include('registration/helper.php');

$user = array();

if(isset($_SESSION['userID'])){
  require('mysqli_connect.php');
  $user = get_user_info($conn, $_SESSION['userID']);
}

?>

<section id="main-site">
  <div class="container py-5">
    <div class="row">
      <div class="col-4 offset-4 shadow py-4"><div class="upload-profile-image d-flex justify-content-center pb-5">
        <div class="text-center">
          <img class="img rounded-circle" style="width: 200px; height: 200px;" src="<?php echo isset($user['profileImg']) ? $user['profileImg']:'./assets/images/profile/default_avatar.png';?>" alt="profile">
          <h4 class="py-3">
            <?php
            if(isset($user['firstName'])){
              printf('%s %s', $user['firstName'], $user['lastName']);
            }
            ?>
          </h4>
        </div>
      </div>
    </div>
  </div>
</section>
print "Welcome";