<?php
/* Database credentials. To connect to MySQL server we need to use this database configuation file */
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

try {
  // Connection variable
  $conn = new mysqli($server, $username, $password, $db);

  // encoded language
  mysqli_set_charset($conn, 'utf8');

} catch (Exception $ex) {
  print "An Exception occurred. Message: ".$ex->getMessage();
} catch (Error $e) {
  print "The system is busy please try again later";
}