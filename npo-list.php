<!DOCTYPE html>
<html lang="en" style="background-color: #1c1c1c">
<head>
  <meta charset="utf-8">
  <link href="./styles.css" rel="stylesheet" type="text/css" media="all" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/81c2c05f29.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
  <title>Non-Profit Organizations</title>
</head>

<?php
include_once "header.php"; 
require_once "connection.php";

$loggedInUserID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] :null;
  // Block unauthorized users from accessing the page
 // if (isset($_SESSION['permissions'])) {
   // if ($_SESSION['permissions'] != 'admin') {
    //  http_response_code(403);
    //  die('Forbidden');
   // }
 // } else {
   // http_response_code(403);
  //  die('Forbidden');
 // }
 ?>


<h1 style="text-align: center;">List of Non-Profit Organizations</h1>
<?php
if (isset($_SESSION['permissions']) && $_SESSION['permissions'] === 'admin') {
  echo '<div class="resource-buttons">
          <a href="add-npo.php">
            <button type="button" class="general-button">Add Organization</button>
          </a>
        </div>
        <h1> Hello User ' . $_SESSION["user_id"] . ' </h1>';
}
?>
<table id="npoTable" class="display" width="100%" cellspacing="0">
  <thead>
    <tr>
    <th style="color: white;">id</th>
    <th style="color: white;">name</th>
    <th style="color: white;">type</th>
    <th style="color: white;">description</th>
    <th style="color: white;">address</th>
    <th style="color: white;">city</th>
    <th style="color: white;">state</th>
    <th style="color: white;">country</th>
    <th style="color: white;">email</th>
    <th style="color: white;">phone</th>
    <th style="color: white;">website</th>
    <th style="color: white;">logo_url</th>
    <th style="color: white;">creation_date</th>
    <th style="color: white;">last_updated</th>
      <th style="color: white;">actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    $sql = "SELECT * FROM organization";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Create table with data from each row
      while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row["id"]. '</td>
                <td>' . $row["name"]. '</td>
                <td>' . $row["type"].'</td>
                <td>'. $row["description"]. '</td>
                <td>' .$row["address"]. '</td>
                <td>' . $row["city"].'</td>
                <td>' . $row["state"]. '</td>
                <td>' . $row["country"]. '</td>
                <td>' . $row["email"]. '</td>
                <td>' . $row["phone"]. '</td>
                <td>' . $row["website"]. '</td>
                <td>' . $row["logo_url"]. '</td>
                <td>' . $row["creation_date"]. '</td>
                <td>' . $row["last_updated"]. '</td>
                <td>';

                if (isset($_SESSION['permissions']) && $_SESSION['permissions'] == 'super') {
                  echo '<form action=\'delete-query.php\' method=\'POST\'>
                          <input type=\'hidden\' name=\'id\' value=\''.$row["id"].'\'>
                          <input type=\'submit\' id=\'admin_buttons\' name=\'delete\' value=\'Delete\'/>
                        </form>
                        <form action=\'modify-npo.php\' method=\'POST\'>
                          <input type=\'hidden\' name=\'id\' value=\''.$row["id"].'\'>
                          <input type=\'submit\' id=\'admin_buttons\' name=\'update\' value=\'Modify\'/>
                        </form>';
                }
        
        if (isset($_SESSION['permissions']) && $_SESSION['permissions'] == 'admin' && $loggedInUserID == $row['created_by']) {
          echo '<form action=\'delete-query.php\' method=\'POST\'>
                  <input type=\'hidden\' name=\'id\' value=\''.$row["id"].'\'>
                  <input type=\'submit\' id=\'admin_buttons\' name=\'delete\' value=\'Delete\'/>
                </form>
                <form action=\'modify-npo.php\' method=\'POST\'>
                  <input type=\'hidden\' name=\'id\' value=\''.$row["id"].'\'>
                  <input type=\'submit\' id=\'admin_buttons\' name=\'update\' value=\'Modify\'/>
                </form>';
        }

        echo '</td></tr>';
      }
    } else {
      echo "<tr><td colspan='14'>0 results</td></tr>";
    }
    $result->close();
    ?>
  </tbody>
</table>

<script type="text/javascript">
 $(document).ready(function () {

  var table = $('#npoTable').DataTable({
    initComplete: function () {
      this.api().columns().every(function () {
        var column = this;
        var header = $(column.header());

        // Create the search input box for each column
        var searchInput = $('<input type="text" class="form-control form-control-sm dt-input" placeholder="Search">')
          .appendTo(header)
          .on('keyup change', function () {
            column.search($(this).val(), false, false, true).draw();
          });
      });
    }
  });
});

</script>
</div>
</html>
