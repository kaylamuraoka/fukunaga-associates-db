<?php
  // Initialize the session
  session_start();
  // Include connection to the database
  include('./../../config/db_conn.php');

  session_start();
  $errors = [];

  if (isset($_POST['username']) && isset($_POST['password'])) {

    // Get username and password from login form
    $myUsername = mysqli_real_escape_string($conn, $_POST['username']);
    $myPassword = mysqli_real_escape_string($conn, $_POST['password']);

  // validate form
  if (empty($myUsername)) array_push($errors, "Username is required.");
  if (empty($myPassword)) array_push($errors, "Password is required.");

  // if no error in form, log user in
  if (count($errors) == 0) {
    $query = "SELECT * FROM users WHERE username = '$myUsername' AND password = '$myPassword'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['username'] === $myUsername && $row['password'] === $myPassword) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['employee_id'] = $row['password'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['email'] = $row['email'];
        header('Location: ./../home.php');
        exit();
      }
    } else {
      array_push($errors, "Incorrect username or password. Try again.");
    }
  }
}

// if (isset($_POST['email'])) {
//   // Get email
//   $email = mysqli_real_escape_string($conn, $_POST['email']);
//   // ensure that the user exists on our system
//   $query = "SELECT email FROM employees WHERE email='$email'";
//   $result = mysqli_query($conn, $query);

//   if (empty($email)) {
//     array_push($errors, "Your email is required");
//   }else if(mysqli_num_rows($result) <= 0) {
//     array_push($errors, "Sorry, no employee exists in our system with that email");
//   }
//   // generate a unique random token of length 100
//   $token = bin2hex(random_bytes(50));

//   if (count($errors) == 0) {
//     // store token in the password-reset database table against the user's email
//     $query = "INSERT INTO password_resets(email, token) VALUES ('$email', '$token')";
//     $result = mysqli_query($conn, $query);

//     // Send email to user with the token in a link they can click on
//     $to = $email;
//     $subject = "Reset your password";
//     $msg = "Hi there, click on this <a href=\"new_password.php?token=" . $token . "\">link</a> to reset your password on our site";
//     $msg = wordwrap($msg,70);
//     $headers = "From: admin@e@fukunagaengineers.com";
//     mail($to, $subject, $msg, $headers);
//     header('location: ../login/pending.php?email=' . $email);
//   }
// }

// // ENTER A NEW PASSWORD
// if (isset($_POST['new_password'])) {
//   $new_pass = mysqli_real_escape_string($conn, $_POST['new_password']);
//   $new_pass_c = mysqli_real_escape_string($conn, $_POST['new_password_c']);

//   // Grab to token that came from the email link
//   $token = $_SESSION['token'];
//   if (empty($new_password) || empty($new_password_c)) array_push($errors, "Password is required");
//   if ($new_pass !== $new_pass_c) array_push($errors, "Password does not match");
//   if (count($errors) == 0) {
//     // select email address of user from the password_reset table
//     $query = "SELECT email FROM password_resets WHERE token='$token' LIMIT 1";
//     $result = mysqli_query($conn, $query);
//     $email = mysqli_fetch_assoc($result)['email'];

//     if ($email) {
//       $query = "UPDATE employees SET password='$new_password' WHERE email='$email'";
//       $result = mysqli_query($conn, $query);
//       header('location: index.php');
//     }
//   }
// }
?>