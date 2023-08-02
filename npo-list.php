<!DOCTYPE html>
<html lang="en" style="background-color: #1c1c1c">
<head>
<link rel="icon" href="/images/npo-favicon.png" type="image/x-icon">
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
  <title>List of Non-Profit Organizations</title>

  <style>
    .table-container {
      width: 100%;
      overflow-x: auto;
    }

    .table-container th, .table-container td{
      padding: 8px;
      text-align: center;

    }

    #npoTable_wrapper{
      overflow-x: hidden;
    }

    #npoTable {
      width: 100%;
      table-layout: fixed;
    }

    #npoTable td {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      max-width: 200px; /* Adjust the max-width value as per your preference */
    }
  </style>
</head>

<body>
  <?php
  include_once "header.php";
  require_once "connection.php";


  $loggedInUserEmail = isset($_SESSION['email']) ? $_SESSION['email'] : null;
  ?>

  <h1 style="text-align: center;">List of Non-Profit Organizations</h1>
  <?php
  if (isset($_SESSION['permissions']) && ($_SESSION['permissions'] === 'admin' || $_SESSION['permissions'] === 'super')) {
    echo '<div class="resource-buttons">
            <a href="add-npo.php">
              <button type="button" class="general-button">Add Organization</button>
            </a>
          </div>';
    if (isset($_SESSION["first_name"])) {
      echo '<h1> Hello ' . $_SESSION["first_name"] . '! </h1>';
    }
  }
  ?>
  <div class="table-container">
    <table id="npoTable" class="display" cellspacing="0">
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
          <th style="color: white;">logo</th>
          <th style="color: white;">creation_date</th>
          <th style="color: white;">last_updated</th>
          <?php if (isset($_SESSION['permissions']) && $_SESSION['permissions'] == 'super'){
          echo '<th style="color: white;">manager</th>';}
          ?>
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
                    <td><div onclick="window.location.href=\'view-npo.php?id='.$row["id"].'\';">' . $row["id"] . '</div></td>
                    <td><div onclick="window.location.href=\'view-npo.php?id='.$row["id"].'\';">' . $row["name"] . '</div></td>
                    <td><div onclick="window.location.href=\'view-npo.php?id='.$row["id"].'\';">' . $row["type"] . '</div></td>
                    <td><div onclick="window.location.href=\'view-npo.php?id='.$row["id"].'\';">' . $row["description"] . '</div></td>
                    <td><div onclick="window.location.href=\'view-npo.php?id='.$row["id"].'\';">' . $row["address"] . '</div></td>
                    <td><div onclick="window.location.href=\'view-npo.php?id='.$row["id"].'\';">' . $row["city"] . '</div></td>
                    <td><div onclick="window.location.href=\'view-npo.php?id='.$row["id"].'\';">' . $row["state"] . '</div></td>
                    <td><div onclick="window.location.href=\'view-npo.php?id='.$row["id"].'\';">' . $row["country"] . '</div></td>
                    <td><div onclick="window.location.href=\'view-npo.php?id='.$row["id"].'\';">' . $row["email"] . '</div></td>
                    <td><div onclick="window.location.href=\'view-npo.php?id='.$row["id"].'\';">' . $row["phone"] . '</div></td>
                    <td><div onclick="window.location.href=\'view-npo.php?id='.$row["id"].'\';">' . $row["website"] . '</div></td>
                    <td><div onclick="window.location.href=\'view-npo.php?id='.$row["id"].'\';">' . $row["logo"] . '</div></td>
                    <td><div onclick="window.location.href=\'view-npo.php?id='.$row["id"].'\';">' . $row["creation_date"] . '</div></td>
                    <td><div onclick="window.location.href=\'view-npo.php?id='.$row["id"].'\';">' . $row["last_updated"] . '</div></td>
                    <td>';
                    if (isset($_SESSION['permissions']) && $_SESSION['permissions'] == 'super') {
                      echo '<div onclick="window.location.href=\'view-npo.php?id='.$row["id"].'\';">' . $row["created_by"] . '</div></td>
                      <td>';
                      ;
                  }
        
            if (isset($_SESSION['permissions']) && $_SESSION['permissions'] == 'super') {
              echo '<form action="delete-query.php" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this item?\');">
                      <input type="hidden" name="id" value="' . $row["id"] . '">
                      <input type="submit" id="admin_buttons" name="delete" value="Delete" />
                    </form>
                    <form action="modify-npo.php?id=' . $row["id"] . '" method="POST">
                      <input type=\'hidden\' name=\'id\' value=\'' . $row["id"] . '\'>
                      <input type=\'submit\' id=\'admin_buttons\' name=\'update\' value=\'Modify\'/>
                    </form>
                    ';
            }
        
            if (isset($_SESSION['permissions']) && $_SESSION['permissions'] == 'admin' && $loggedInUserEmail == $row['created_by']) {
              echo '<form action=\'delete-query.php\' method=\'POST\' onsubmit="return confirm(\'Are you sure you want to delete this item?\');">
                      <input type=\'hidden\' name=\'id\' value=\'' . $row["id"] . '\'>
                      <input type=\'submit\' id=\'admin_buttons\' name=\'delete\' value=\'Delete\'/>
                    </form>
                    <form action="modify-npo.php?id=' . $row["id"] . '" method="POST" >
                      <input type="hidden" name="id" value="' . $row["id"] . '">
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
  </div>

  <script>
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
</body>
</html>
