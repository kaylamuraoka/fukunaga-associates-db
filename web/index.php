<?php

require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

// Our web handlers
$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('index.twig');
});

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

// Create connection
$conn = new mysqli($server, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
  echo "Connected successfully";
  
  $sql = "SELECT * FROM district";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    echo "This is the District Table:";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - District: " . $row["name"]. "<br>";
    }
  } else {
    echo "0 results";
  }

  $sql = "SELECT id, name, district_id FROM complex_area";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    echo "This is the Complex Area Table:";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - name: " . $row["name"]. " - District: " . $row["district_id"]. "<br>";
    }
  } else {
    echo "0 results";
  }

  $sql = "SELECT id, first_name, complex_area_id FROM superintendent";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    echo "This is the Superintendent Table:";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - first name: " . $row["first_name"]. " - Complex Area ID: " . $row["complex_area_id"]. "<br>";
    }
  } else {
    echo "0 results";
  }

  $sql = "SELECT * FROM complex";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    echo "This is the Complex Table:";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - name: " . $row["name"]. " - Complex Area ID: " . $row["complex_area_id"]. "<br>";
    }
  } else {
    echo "0 results";
  }

   $sql = "SELECT doe_code, name FROM school";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    echo "This is the School Table:";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "doe_code: " . $row["doe_code"]. " - name: " . $row["name"]. "<br>";
    }
  } else {
    echo "0 results";
  }

  $conn->close();

$app->run();


