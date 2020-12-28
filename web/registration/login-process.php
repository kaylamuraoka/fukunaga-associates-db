<?php

$error = array();

// Validate Email Address Input
$email = validate_input_email($_POST['email']);
if (empty($email)) {
  $error[] = "You forgot to enter your Email.";
};

// Validate Password Input
$password = validate_input_text($_POST['password']);
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
      header("location: index.php");
      exit();
    }
  } else{
    print "You are not a member please register";
  }

} else {
  echo "Please fill out your email and password to login";
}