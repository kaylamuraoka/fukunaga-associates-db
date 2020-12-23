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
  return "";
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
  return "";
}