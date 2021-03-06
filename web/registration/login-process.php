<?php

$error = array();
$errors = array(); 
// Validate Email Address Input
$email = validate_input_email($_POST['email']);
if (empty($email)) {
  $error[] = "You forgot to enter your Email.";
};

// Validate Password Input
$password = validate_input_text($_POST['logPassword']);
if (empty($password)) {
  $error[] = "You forgot to enter your password.";
};

if(empty($error)){
  // Make a sql query
  $query = "SELECT userID, firstName, lastName, email, password, profileImg FROM users WHERE email=?";

  // Initialize a statement
  $stmt = mysqli_stmt_init($conn);

  // Prepare SQL statement
  mysqli_stmt_prepare($stmt, $query);

  // Bind parameter
  mysqli_stmt_bind_param($stmt, 's', $email);

  // Execute prepared statement
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  
  if(!empty($row)) {
    // Verify password
    if(password_verify($password, $row['password'])) {
      // Password is correct, so start a new session
      session_start();

      // Store data in session variables
      $_SESSION["loggedin"] = true;
      $_SESSION['userID'] = $row['userID'];
      
      // Redirect user to home page
      header("location: index.php");
      exit();
    } else{
      // password is incorrect
      array_push($errors, "Incorrect email or password.");
    }
  } else{
    array_push($errors, "It looks like you're not yet a member! Click on the bottom link to signup.");
  }
} else {
  array_push($errors, "Please fill out your email and password to login");
}