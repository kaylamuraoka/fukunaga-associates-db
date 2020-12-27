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
  // sql query
  $query = "SELECT userID, firstName, lastName, email, password, profileImg FROM users WHERE email=?";

} else {
  echo "Please fill out your email and password to login";
}