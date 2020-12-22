<?php
// Include config file to connect to MySQL database
  include('./../config/db.php');

  // Define variables and initialize with empty values
  $first_name = $last_name = $email = $password = $confirm_password = "";
  $first_name_err = $last_name_err = $email_err = $password_err = $confirm_password_err = "";

  // Processing form data when form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate first name
    if(empty(trim($_POST["first_name"]))){
        $first_name_err = "First name required. Please enter your first name.";     
    } else{
        $first_name = ucwords(trim($_POST["first_name"]));
    }

    // Validate last name
    if(empty(trim($_POST["last_name"]))){
        $last_name_err = "Last name required. Please enter your last name.";     
    } else{
        $last_name_err = ucwords(trim($_POST["last_name"]));
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
      $email_err = "Please enter your email address.";
    } else {
      // Prepare a select statement
      $sql = "SELECT email FROM users WHERE email = ?";

      if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_email);

        // Set parameters
        $param_email = trim($_POST["email"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
          // Store result
          mysqli_stmt_store_result($stmt);

          if(mysqli_stmt_num_rows($stmt) == 1) {
            $email_err = "An account already exists for the email address you've entered. Please sign in or choose another email address.";
          } else {
            $email = trim($_POST["email"]);
          }

        } else {
          echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysql_stmt_close($stmt);
      }
    }
    
    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password between 6-12 characters (no spaces).";     
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Please enter a password between 6-12 characters (no spaces).";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Password is required.";     
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password does not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($first_name_err) && empty($last_name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {

      // Prepare an insert statement
      $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";

      if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ss", $param_first_name, $param_last_name, $param_email, $param_password);

        // Set parameters
        $param_first_name = $first_name;
        $param_last_name = $last_name;
        $param_email = $email;
        $param_password = password_hash($password, PASSWORD_DEFAULT) // Creates a password hash

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
          // Redirect to login page
          header("location: login/login.php");
        } else {
          echo "Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
      }
    }

    // Close connection
    mysqli_close($link);
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <!-- Bootstrap v4.5 stylesheet -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- Font Awesome kit's code -->
  <script src="https://kit.fontawesome.com/b7705bf7e8.js" crossorigin="anonymous"></script>
</head>
<!-- Custom stylesheet -->
<link rel="stylesheet" type="text/css" href="./../stylesheets/login.css">
</head>

<body>
  <div class="modal-dialog text-center">
    <div class="col-sm-12 main-section">
      <div class="modal-content">
        <div class="col-12 user-img text-center">
          <img src="./../images/user-avatar.jpg">
        </div>
        <div class="col-12 text-center">
          <h2 class="font-weight-bold mb-1">Create an Account</h2>
          <h5 class="mb-4">Please enter your name, email address and password to create an account.</h5>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="col-12" method="POST">
          <div class="form-row">
            <!-- Name Input Fields -->
            <div class="form-group col-6 <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
              <i class="fas fa-user"></i>
              <input type="text" name="first_name" class="form-control" placeholder="First name" value="<?php echo $first_name; ?>" required>
              <span class="help-block"><?php echo $first_name_err; ?></span>
            </div>
            <div class="form-group col-6 <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
              <i class="fas fa-user"></i>
              <input type="text" name="last_name" class="form-control" placeholder="Last name" value="<?php echo $last_name; ?>" required>
              <span class="help-block"><?php echo $last_name_err; ?></span>
            </div>
          </div>
          <!-- Email Input Fields -->
          <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" class="form-control" placeholder="Email Address" value="<?php echo $email; ?>" required>
            <span class="help-block"><?php echo $email_err; ?></span>
          </div>
          <!-- Password Input Field -->
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <i class="fas fa-lock"></i>
            <input type="text" name="password" class="form-control" placeholder="Password (6 to 12 characters)"
             value="<?php echo $password; ?>" required>
             <span class="help-block"><?php echo $password_err; ?></span>
          </div>
          <!-- Confirm Password Input Field -->
          <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <i class="fas fa-lock"></i>
            <input type="text" name="password" class="form-control" placeholder="Confirm Password" value="<?php echo $confirm_password; ?>" required>
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
          </div>
          <!-- Submit Buttons -->
          <button type="submit" name="registration-btn" class="btn"></i>Submit</button>

          <div class="col-12 link">
            <h4>Already have an account? <a href="./login/login.php">Login here</a>.</h4>
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