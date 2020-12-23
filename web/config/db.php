<?php
/* Database credentials. To connect to MySQL server we need to use this database configuation file */
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

define('_DBHOST',$url["host"]);
define('_DBUSER', $url["user"]);  
define('_DBPASSWD', $url["pass"]);  
define('_DBNAME', substr($url["path"], 1));

try{
   /* Attempt to connect to MySQL database */
   $conn = new mysqli(_DBHOST, _DBUSER, _DBPASSWD, _DBNAME);

   // encoded language
   mysqli_set_charset($conn, 'utf8');

} catch (Exception $ex) {
   // if there if any problem with the connection
   print "An Exception occurred. Message: ".$ex->getMessage();
} catch (Error $e){
   print "The system is busy please try again later.";
}