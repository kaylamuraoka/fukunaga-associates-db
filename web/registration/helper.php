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
function upload_profile($path, $filename){
  $targetDir = $path;
  $default = "default_avatar.png";

  // get filename
  $filename = basename($filename['name']);
  $targetFilePath = $targetDir.$filename;
  // Returns extension of uploaded image
  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

  if(!empty($filename)){
    // Allow certain file format
    $allowType = array('jpg','png','jpeg','gif','pdf');

    if(in_array($fileType, $allowType)){
      // upload file to the server
      if(move_uploaded_file($filename['tmp_name'], $targetFilePath)){
        return $targetFilePath;
      }
    }
  }

  // return default image
  return $path.$default;
}