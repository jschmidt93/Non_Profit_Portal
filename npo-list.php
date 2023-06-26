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
  <title>Machine Learning Portal</title>
</head>
<?php include "header.php" ?>
<h1 style="text-align: center;">List of Non-Profit Organizations</h1>
<?php
if (isset($_SESSION['permissions'])) {
  echo '<div class="resource-buttons">
          <a href="add-npo.php">
            <button type="button" class="general-button">Add Organization</button>
          </a>
        </div>
        <h1> Hello ' . $_SESSION["user_id"] . ' </h1>';
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
      <th style="color: white;">email</th>
      <th style="color: white;">phone</th>
      <th style="color: white;">website</th>
      <th style="color: white;">Actions</th> <!-- New column for Modify/Delete buttons -->
    </tr>
  </thead>
</table>
<script type="text/javascript">
  $(document).ready(function() {
    $('#npoTable').dataTable({
      "processing": true,
      "pageLength": 50,
      "ajax": "fetch_data.php",
      "columns": [
        { "data": "id", "searchable": true },
        { "data": "name", "searchable": true },
        { "data": "type", "searchable": true },
        { "data": "description", "searchable": true },
        { "data": "address", "searchable": true },
        { "data": "city", "searchable": true },
        { "data": "state", "searchable": true },
        { "data": "email", "searchable": true },
        { "data": "phone", "searchable": true },
        { "data": "website", "searchable": true },
        {
          "data": null,
          "render": function(data, type, row) {
            var id = data.id;
            var htmlString = `
              <div class="button-container">
                <button class="modify-button" onclick="modifyNPO(${id})">Modify</button>
                <button class="delete-button" onclick="deleteNPO(${id})">Delete</button>
              </div>
            `;
            return htmlString;
          }
        }
      ],
      "initComplete": function () {
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

    $('#npoTable').on('click', '.modify-button', function() {
      var data = $('#npoTable').DataTable().row($(this).parents('tr')).data();
      var id = data.id;
      modifyNPO(id); // Call your modify function
    });

    $('#npoTable').on('click', '.delete-button', function() {
      var data = $('#npoTable').DataTable().row($(this).parents('tr')).data();
      var id = data.id;
      deleteNPO(id); // Call your delete function
    });
  });
</script>
</div>
</html>