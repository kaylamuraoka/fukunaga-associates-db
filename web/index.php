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
  
  $sql = "SELECT * FROM schools_view";
  $result = $conn->query($sql);

  echo '<table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">DOE Code</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Fax</th>
                <th scope="col">Principal</th>
                <th scope="col">Grade Range</th>
                <th scope="col">Type</th>
                <th scope="col">Website</th>
                <th scope="col">Complex</th>
                <th scope="col">Complex Area</th>
                <th scope="col">District</th>
                <th scope="col">Island</th>
                <th scope="col">Charter</th>
                <th scope="col">Esis Name</th>
              </tr>
            </thead>
            <tbody>';
         
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo '<tr>';
      echo '<th scope="row">'.$row["doe_code"].'</th>';
      echo '<td>'.$row["name"].'</td>';
      echo '<td>'.$row["address"].'</td>';
      echo '<td>'.$row["phone"].'</td>';
      echo '<td>'.$row["fax"].'</td>';
      echo '<td>'.$row["principal"].'</td>';
      echo '<td>'.$row["grade_range"].'</td>';
      echo '<td>'.$row["type"].'</td>';
      echo '<td>'.$row["website"].'</td>';
      echo '<td>'.$row["complex"].'</td>';
      echo '<td>'.$row["complex_area"].'</td>';
      echo '<td>'.$row["district"].'</td>';
      echo '<td>'.$row["island"].'</td>';
      echo '<td>'.$row["charter"].'</td>';
      echo '<td>'.$row["esis_name"].'</td>';
      echo '</tr>';
    }
    echo '</tbody>
        </table>'; 
  } else {
    echo '<tr>
            <td colspan="15">0 results found</td>

          </tr>
        </tbody>
      </table>'; 
  }

  // $sql = "SELECT complex_area.id, complex_area.name, CONCAT(complex_area.address, " ", complex_area.city, ", HI ", complex_area.zip_code) AS address, complex_area.phone,     complex_area.fax, district.name AS district FROM complex_area LEFT JOIN district ON complex_area.district_id=district.id";
  // $result = $conn->query($sql);
  
  // if ($result->num_rows > 0) {
  //   echo "This is the Complex Area Table:";
  //   // output data of each row
  //   while($row = $result->fetch_assoc()) {
  //     echo "id: " . $row["id"]. " - name: " . $row["name"]. " - Address: " . $row["address"]. " - Phone: " . $row["phone"]. " - Fax: " . $row["fax"]. " - District: " . $row["district"]. "<br>";
  //   }
  // } else {
  //   echo "0 results";
  // }

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


