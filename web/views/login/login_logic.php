<?php
session_start();
$errors = [];
// include connection to the database
include('db/db_connection.php');

// LOG USER IN
if (isset($_POST['username']) && isset($_POST['password'])) {

  // Get username and password from login form
  $username = mysqli_real_escape_string($db_connection, $_POST['username']);
  $password = mysqli_real_escape_string($db_connection, $_POST['password']);

  // validate form
  if (empty($username)) array_push($errors, "Username is required.");
  if (empty($password)) array_push($errors, "Password is required.");

  // if no error in form, log user in
  if (count($errors) == 0) {
    $query = "SELECT * FROM employees WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db_connection, $query);

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['username'] === $username && $row['password'] === $password) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['employee_id'] = $row['employee_id'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['department_name'] = $row['department_name'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['profile_image'] = $row['profile_image'];
          header('Location: ../home.php');
          exit();
      }
    }else {
      array_push($errors, "Incorrect username or password. Try again.");
    }
  }
}
if (isset($_POST['email'])) {
  // Get email
  $email = mysqli_real_escape_string($db_connection, $_POST['email']);
  // ensure that the user exists on our system
  $query = "SELECT email FROM employees WHERE email='$email'";
  $result = mysqli_query($db_connection, $query);

  if (empty($email)) {
    array_push($errors, "Your email is required");
  }else if(mysqli_num_rows($result) <= 0) {
    array_push($errors, "Sorry, no employee exists in our system with that email");
  }
  // generate a unique random token of length 100
  $token = bin2hex(random_bytes(50));

  if (count($errors) == 0) {
    // store token in the password-reset database table against the user's email
    $query = "INSERT INTO password_resets(email, token) VALUES ('$email', '$token')";
    $result = mysqli_query($db_connection, $query);

    // Send email to user with the token in a link they can click on
    $to = $email;
    $subject = "Reset your password";
    $msg = "Hi there, click on this <a href=\"new_password.php?token=" . $token . "\">link</a> to reset your password on our site";
    $msg = wordwrap($msg,70);
    $headers = "From: admin@e@fukunagaengineers.com";
    mail($to, $subject, $msg, $headers);
    header('location: ../login/pending.php?email=' . $email);
  }
}

// ENTER A NEW PASSWORD
if (isset($_POST['new_password'])) {
  $new_pass = mysqli_real_escape_string($db_connection, $_POST['new_password']);
  $new_pass_c = mysqli_real_escape_string($db_connection, $_POST['new_password_c']);

  // Grab to token that came from the email link
  $token = $_SESSION['token'];
  if (empty($new_password) || empty($new_password_c)) array_push($errors, "Password is required");
  if ($new_pass !== $new_pass_c) array_push($errors, "Password does not match");
  if (count($errors) == 0) {
    // select email address of user from the password_reset table
    $query = "SELECT email FROM password_resets WHERE token='$token' LIMIT 1";
    $result = mysqli_query($db_connection, $query);
    $email = mysqli_fetch_assoc($result)['email'];

    if ($email) {
      $query = "UPDATE employees SET password='$new_password' WHERE email='$email'";
      $result = mysqli_query($db_connection, $query);
      header('location: index.php');
    }
  }
}

// Facility Search for Location
if (isset($_POST['facility_name'])) {

  $facility_name = mysqli_real_escape_string($db_connection, $_POST['facility_name']);
  // ensure that the facility exists on our system
  $query = "SELECT * FROM school_facilities WHERE facility_name='$facility_name'";
  $result = mysqli_query($db_connection, $query);

  if (empty($facility_name)) {
    array_push($errors, "A facility name is required");
  }else if(mysqli_num_rows($result) <= 0) {
    array_push($errors, "Sorry, no facility exists in our system with that name");
  }

  if (count($errors) == 0) {
    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['facility_name'] === $facility_name) {
        $_SESSION['facility_name'] = $row['facility_name'];
        $_SESSION['doe_facility_id'] = $row['doe_facility_id'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['district'] = $row['district'];
        $_SESSION['complex_area'] = $row['complex_area'];
        $_SESSION['complex'] = $row['complex'];
        header('Location: facility_maps.php');
        exit();
      }
    }else {
      array_push($errors, "Incorrect facility name or DOE facility Id. Try again.");
    }
  }
}
