<!DOCTYPE html>
<html lang="en" style="background-color: #1c1c1c">

<head>

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
  <style>
    .dataTables_length select {
      background-color: white !important;
    }

    .dataTables_filter input {
      background-color: white !important;
      color: black;
    }

    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
      color: white;
    }

    .crud_button {
      font: bold 11px Arial;
      text-decoration: none;
      background-color: #EEEEEE;
      color: #333333;
      padding: 2px 6px 2px 6px;
      border-top: 1px solid #CCCCCC;
      border-right: 1px solid #333333;
      border-bottom: 1px solid #333333;
      border-left: 1px solid #CCCCCC;
      margin: 10px;
    }

    .crud_button :hover {
      color: #bdbdbd;
    }
  </style>
</head>

<?php include "header.php" ?>

<h1 style="text-align: center;">List of Resources</h1>

<?php
if (isset($_SESSION['role'])) {
  echo ' <div class="resource-buttons">

  <a href="add-resource.php">
      <button type="button" class="general-button">Add Resource</button></a>
</div>

<h1> Hello ' . $_SESSION["displayname"] . ' </h1>';
}

?>

<table id="resourceTable" class="display" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th style="color: white;">id</th>
      <th style="color: white;">topic</th>
      <th style="color: white;">description</th>
      <th style="color: white;">type</th>
      <th style="color: white;">keywords</th>
      <th style="color: white;"></th>
    </tr>
  </thead>
</table>
<script type="text/javascript">
  $(document).ready(function() {
    $('#resourceTable').dataTable({
      "processing": true,
      "pageLength": 50,
      "ajax": "fetch_data.php",
      "columns": [{
          data: 'id'
        },
        {
          data: null,
          "render": function(o) {
            var id = o.id;
            var topic = o.topic;
            var htmlString = `
                            <a href=view-resources.php?id=` + id + `>` + topic + `</a>
                            `;
            return htmlString;
          }
        },
        {
          data: 'description'
        },
        {
          data: 'type'
        },
        {
          data: 'keywords'
        },
        {
          data: null,
          "render": function(o) {
            var id = o.id;
            var resource_creator = o.instructor_id;
            var user_id = '<?php if (isset($_SESSION['user_id'])) echo $_SESSION['user_id']; ?>';
            var user_role = '<?php if (isset($_SESSION['role'])) echo $_SESSION['role']; ?>';
            var htmlString = '';
            if (user_role == 'admin' || user_id == resource_creator) {
              htmlString = `
                              <span>
                                  <a class= "crud_button" href=view-resources.php?id=` + id + `> Display </a>
                                  <a class= "crud_button" href=modify-resource.php?id=` + id + `> Modify </a>
                                  <a class= "crud_button" href=delete-resource.php?id=` + id + `> Delete </a>
                              </span>`;
            }
            return htmlString;
          }
        }
      ]
    });
  });
</script>
</div>

</html>