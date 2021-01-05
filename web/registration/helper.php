<?php

function validate_input_text($textValue){
  if(!empty($textValue)){
    // if variable is not empty
    // remove white spaces before and after text 
    $trim_text = trim($textValue);
    // remove illegal characters from text
    $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_STRING);
    return $sanitize_str;
  }
  // if empty return empty string
  return '';
}

function validate_input_email($emailValue){
  // if variable is not empty
  // remove white spaces before and after text 
  if(!empty($emailValue)){
    $trim_text = trim($emailValue);
    // remove illegal characters from text
    $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_EMAIL);
    return $sanitize_str;
  }
  // if empty return empty string
  return '';
}

// profile image
function upload_profile($path, $file){
  $targetDir = $path;
  $default = "default_avatar.png";

  // get the filename
  $filename = basename($file['name']);
  $targetFilePath = $targetDir.$filename;
  // Returns extension of uploaded image
  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

  if(!empty($filename)){
    // Allow certain file format
    $allowType = array('jpg','png','jpeg','gif','pdf');

    if(in_array($fileType, $allowType)){
      // upload file to the server
      if(move_uploaded_file($file['tmp_name'], $targetFilePath)){
        return $targetFilePath;
      }
    }
  }

  // return default image
  return $path.$default;
}

// Get user info
function get_user_info($conn, $userID){

  $query = "SELECT firstName, lastName, email, profileImg FROM users WHERE userID = ?";

  // Initialize a statement
  $stmt = mysqli_stmt_init($conn);

  // Prepare SQL statement
  mysqli_stmt_prepare($stmt, $query);

  // Bind parameter
  mysqli_stmt_bind_param($stmt, 'i', $userID);

  // Execute prepared statement
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  $row = mysqli_fetch_array($result);
  return empty($row) ? false : $row;
}

// Update user info
function update_user_info($conn, $userID){

  $query = "UPDATE users SET userID=231 WHERE userID = ?";

  // Initialize a statement
  $stmt = mysqli_stmt_init($conn);

  // Prepare SQL statement
  mysqli_stmt_prepare($stmt, $query);

  // Bind parameter
  mysqli_stmt_bind_param($stmt, 'i', $userID);

  
}