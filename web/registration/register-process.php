<?php
// include helper functions
require("helper.php");

// Error variable
$error = array();
$errors = array();
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
$profileImg = upload_profile('./assets/images/profile/', $files);

if (empty($error)) {
  // register a new user
  $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
  require("config/db.php");

  // first check the database to make sure 
  // a user does not already exist with the same email
  $query = "SELECT email FROM users WHERE email=?";

  // Initialize a statement
  $stmt = mysqli_stmt_init($conn);
  
  // Prepare SQL statement
  mysqli_stmt_prepare($stmt, $query);

  // Bind input text box values
  mysqli_stmt_bind_param($stmt, 's', $email);

  // Execute prepared statement
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  $row = mysqli_fetch_array($result);
  if ($row > 0 ) {
    // if $row is greater than 0, (means the email exists)
    array_push($errors, "Email already exists, you can try logging in with this email address.");
    echo "Error: email already exists";
  }
  else {
    // Make a query
    $query = "INSERT INTO users (userID, firstName, lastName, email, password, profileImg, createdAt, updatedAt) VALUES ('',?,?,?,?,?,NOW(),NOW())";

    // Initialize a statement
    $stmt = mysqli_stmt_init($conn);

    // Secure database from SQL injection
    // Prepare SQL statement
    mysqli_stmt_prepare($stmt, $query);

    // Bind input text box values
    mysqli_stmt_bind_param($stmt, 'sssss', $firstName, $lastName, $email, $hashed_pass, $profileImg);

    // Execute prepared statement
    mysqli_stmt_execute($stmt);

    // Check if successfully inserted
    if(mysqli_stmt_affected_rows($stmt)==1){
      // start a new session
      session_start();

      // create session variable
      $_SESSION['userID'] = mysqli_insert_id($conn);
    
      header('location: ../login.php');
      exit();
    } else { 
      // Error while registration
      print "Error while registration...!";
    }
  }
} else{
  print 'not validated';
}

?>