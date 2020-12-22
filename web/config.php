<?php
/* Database credentials. To connect to MySQL server we need to use this database configuation file */
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

define('_DBHOST',$url["host"]);
define('_DBUSER', $url["user"]);  
define('_DBPASSWD', $url["pass"]);  
define('_DBNAME', substr($url["path"], 1));

/* Attempt to connect to MySQL database */
$conn = new mysqli( _DBHOST, _DBUSER, _DBPASSWD, _DBNAME);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
?>