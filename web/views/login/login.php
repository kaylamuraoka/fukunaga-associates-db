<?php 
  // Include connection to database
  include('./../../config/db_conn.php');
  session_start();

  // Log user in
  if (isset($_POST['username']) && isset($_POST['password'])) {
    // Get username and password from login form
    $myUsername = mysqli_real_escape_string($conn, $_POST['username']);
    $myPassword = mysqli_real_escape_string($conn, $_POST['password']);
    
    // If no error in form, log user in
    if (count($errors) == 0) {
      $query = "SELECT * FROM users WHERE username = '$myUsername' AND password = '$myPassword'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($result);

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row
        if ($count === 1) {
          session_register("myUsername");
          $_SESSION['login_user'] = $myUsername;
          header('Location: ./../home.php');
        } else {
          $error = "Your Username or Password is invalid. Try again.");
        }
    }
  }
?>

<!-- The Page renders the content below -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap v4.5 stylesheet -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- Font Awesome kit's code -->
  <script src="https://kit.fontawesome.com/b7705bf7e8.js" crossorigin="anonymous"></script>
</head>
<!-- Custom stylesheet -->
<link rel="stylesheet" type="text/css" href="./../../stylesheets/login.css">
</head>

<body>
  <div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
      <div class="modal-content">
        <div class="col-12 user-img">
          <img src="./../../images/user-avatar.jpg">
        </div>
        <form action = "" class="col-12" method="POST">
          <!-- Username Input Fields -->
          <div class="form-group">
            <i class="fas fa-user"></i>
            <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
          </div>
          <!-- Password Input Fields -->
          <div class="form-group">
            <i class="fas fa-lock "></i>
            <input type="text" name="password" class="form-control" placeholder="Enter Password" required>
          </div>
          <!-- Login Button -->
          <button type="submit" name="login-btn" class="btn"><i class="fas fa-sign-in-alt icon"></i>Login</button>
          <!-- Forgot Password Link -->
          <div class="col-12 forgot">
            <a>Forgot Password?</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery and Bootstrap Bundle -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
      crossorigin="anonymous"></script>

</body>

</html>