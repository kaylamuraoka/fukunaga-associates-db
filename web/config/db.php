<?php
/* Database credentials. To connect to MySQL server we need to use this database configuation file */
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);

/* Attempt to connect to MySQL database */
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}

// try{
   
//    $conn = new mysqli(_DBHOST, _DBUSER, _DBPASSWD, _DBNAME);

//    // encoded language
//    mysqli_set_charset($conn, 'utf8');

// } catch (Exception $ex) {
//    // if there if any problem with the connection
//    print "An Exception occurred. Message: ".$ex->getMessage();
// } catch (Error $e){
//    print "The system is busy please try again later.";
// }