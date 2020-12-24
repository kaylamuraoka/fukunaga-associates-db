<?php
// include helper functions
require("helper.php");

// Error variable
$error = array();

// Validate First Name Input
$firstName = validate_input_text($_POST['firstName']);
if (empty($firstName)) {
  $error[] = "You forgot to enter your First Name.";
};

// Validate Last Name Input
$lastName = validate_input_text($_POST['lastName']);
if (empty($lastName)) {
  $error[] = "You forgot to enter your Last Name.";
};

// Validate Email Address Input
$email = validate_input_email($_POST['email']);
if (empty($email)) {
  $error[] = "You forgot to enter your Email.";
};

// Validate Password Input
$password = validate_input_text($_POST['password']);
if (empty($password)) {
  $error[] = "Please enter a password with 8 or more characters (no spaces).";
};

// Validate Confirmation of Password Input
$confirm_pwd = validate_input_text($_POST['confirm_pwd']);
if (empty($confirm_pwd)) {
  $error[] = "You forgot to confirm your Password.";
};

$files = $_FILES['profileUpload'];
$profileImg = upload_profile('./../assets/images/profile/', $files);

if (empty($error)) {
  // register a new user
  $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
  require("../config/db.php");

  // Make a query
  $query = "INSERT INTO `users` (`userID`, `firstName`, `lastName`, `email`, `password`, `profileImg`, `createdAt`, `updatedAt`)";
  $query = "VALUES ('',?,?,?,?,?,NOW(),NOW())";

  // Initialize a statement
  $q = mysqli_stmt_init($conn);

  // Secure database from SQL injection
  // Prepare SQL statement
  mysqli_stmt_prepare($q, $query);

  // Bind input text box values
  mysqli_stmt_bind_param($q, 'sssss', $firstName, $lastName, $email, $hashed_pass, $profileImg);

  // Execute statement
  mysqli_stmt_execute($q);

  // Check if successfully inserted
  if(mysqli_stmt_affected_rows($q)==1){
    echo "record successfully inserted...!";
  } else{
    echo "Error while registration...!";
  }

} else{
  echo 'not validated';
}

?>