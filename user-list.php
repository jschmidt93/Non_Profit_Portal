<!DOCTYPE html>
<html lang="en" style="background-color: #1c1c1c">
<head>
  <meta charset="utf-8">
  <link rel="icon" href="/images/npo-favicon.png" type="image/x-icon">
  <link href="./styles.css" rel="stylesheet" type="text/css" media="all" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/81c2c05f29.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
  <title>List of Non-Profit Organizations Users</title>

  <style>
    .table-container {
      width: 100%;
      overflow-x: auto;
    }

    #userTable_wrapper{
      overflow-x: hidden;
    }

    #userTable {
      width: 100%;
      table-layout: fixed;
    }

    #userTable td {
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

  $loggedInUserID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
  ?>

  <h1 style="text-align: center;">List of Non-Profit Organizations Users</h1>
  <?php
  if  ( $_SESSION['permissions'] === 'super') {
    echo '<div class="resource-buttons">
            <a href="add-user.php">
              <button type="button" class="general-button">Add User</button>
            </a>
          </div>';
    if (isset($_SESSION["first_name"])) {
      echo '<h1> Hello ' . $_SESSION["first_name"] . '! </h1>';
    }
  }
  ?>
  <div class="table-container">
    <table id="userTable" class="display" cellspacing="0">
      <thead>
        <tr>
          <th style="color: white;">User_id</th>
          <th style="color: white;">First Name</th>
          <th style="color: white;">Last Name</th>
          <th style="color: white;">Email</th>
          <th style="color: white;">Permission</th>
          <th style="color: white;">Delete/Modify</th>

        </tr>
      </thead>
      <tbody>
        <?php
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // Create table with data from each row
          while ($row = $result->fetch_assoc()) {
            echo '<tr;">
                    <td>' . $row["user_id"] . '</td>
                    <td>' . $row["first_name"] . '</td>
                    <td>' . $row["last_name"] . '</td>
                    <td>' . $row["email"] . '</td>
                    <td>' . $row["permissions"] . '</td>
                    <td>';

            if (isset($_SESSION['permissions']) && $_SESSION['permissions'] == 'super') {
              echo '<form action="delete-query-user.php" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this item?\');">
                      <input type="hidden" name="id" value="' . $row["user_id"] . '">
                      <input type="submit" id="admin_buttons" name="delete" value="Delete" />
                    </form>
                    <form action="modify-user.php?id=' . $row["user_id"] . '" method="POST">
                      <input type=\'hidden\' name=\'id\' value=\'' . $row["user_id"] . '\'>
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
      var table = $('#userTable').DataTable({
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