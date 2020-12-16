<?php
  // Database
  include('./config/db.php');

  // Set session
  session_start();
  if(isset($_POST['recors-limit'])){
    $_SESSION['records-limit'] = $_POST['records-limit'];
  }

  // The $limit variable sets the dynamic limit for displaying the result via the pagination and select dropdown.
  $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 5;
  // Current pagination page number
  $page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
  // To get the offset or paginationStart we deduct the current page from 1 and divide it by the page limit.
  $paginationStart = ($page - 1) * $limit;
  // Limit query
  $schools = $conn->query("SELECT * FROM schools_view LIMIT $paginationStart, $limit")->fetchAll();

  // Get total records
  $sql = $conn->query("SELECT COUNT(doe_code) AS school_code FROM schools_view")->fetchAll();
  $allRecords = $sql[0]['school_code'];

  // Calculate total pages
  // ceil() function rounds the number up to the nearest integer
  $totalPages = ceil($allRecords / $limit);

  // Prev + Next
  $prev = $page - 1;
  $next = $page + 1;
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./stylesheets/main.css" />
    <title>Schools Page</title>
  </head>
  <body>
    <div class="container mt-5">
      <h2 class="text-center mb-5">DOE Schools Information</h2>

      <!-- Select dropdown -->
      <div class="d-flex flex-row-reverse bd-highlight mb-3">
            <form action="index.php" method="post">
                <select name="records-limit" id="records-limit" class="custom-select">
                    <option disabled selected>Records Limit</option>
                    <?php foreach([5,7,10,12] as $limit) : ?>
                    <option
                        <?php if(isset($_SESSION['records-limit']) && $_SESSION['records-limit'] == $limit) echo 'selected'; ?>
                        value="<?= $limit; ?>">
                        <?= $limit; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>

        <!-- Datatable -->
        <table class="table table-bordered mb-5">
          <thead>
              <tr class="table-success">
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
          <tbody>
            <?php foreach($schools as $school): ?>
                <tr>
                    <th scope="row"><?php echo $school['doe_code']; ?></th>
                    <td><?php echo $school['name']; ?></td>
                    <td><?php echo $school['address']; ?></td>
                    <td><?php echo $school['phone']; ?></td>
                    <td><?php echo $school['fax']; ?></td>
                    <td><?php echo $school['principal']; ?></td>
                    <td><?php echo $school['grade_range']; ?></td>
                    <td><?php echo $school['type']; ?></td>
                    <td><?php echo $school['website']; ?></td>
                    <td><?php echo $school['complex']; ?></td>
                    <td><?php echo $school['complex_area']; ?></td>
                    <td><?php echo $school['district']; ?></td>
                    <td><?php echo $school['island']; ?></td>
                    <td><?php echo $school['charter']; ?></td>
                    <td><?php echo $school['esis_name']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <nav aria-label="Page navigation example mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>">Previous</a>
                </li>

                <?php for($i = 1; $i <= $totalPages; $i++ ): ?>
                <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                    <a class="page-link" href="index.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                </li>
                <?php endfor; ?>

                <li class="page-item <?php if($page >= $totalPages) { echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page >= $totalPages){ echo '#'; } else {echo "?page=". $next; } ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script>
      $(document).ready(function () {
        $('#records-limit').change(function(){
          $('form').submit();
        });
      });
    </script>

  </body>
</html>
