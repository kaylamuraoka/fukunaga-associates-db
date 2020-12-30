<?php
// Initialize the session
session_start();

// Unset session variables
unset($_SESSION["userID"]);

// Destroy the session.
session_destroy();

// Redirect to login page
header("location: login.php");
exit();
?>

