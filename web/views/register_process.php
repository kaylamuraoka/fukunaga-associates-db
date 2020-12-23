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
  $error[] = "Please enter a password between 6-12 characters (no spaces).";
};

// Validate Confirmation of Password Input
$confirm_pwd = validate_input_text($_POST['confirm_pwd']);
if (empty($confirm_pwd)) {
  $error[] = "You forgot to confirm your Password.";
};

if(empty($error)){
  echo 'validate';
} else {
  echo 'not valid';
}

?>