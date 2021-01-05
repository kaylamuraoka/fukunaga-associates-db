<?php
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

