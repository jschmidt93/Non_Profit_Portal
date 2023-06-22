<?php

  $nav_selected = "SCANNER"; 
  $left_buttons = "YES"; 
  $left_selected = "RELEASES"; 

  include("./nav.php");
  global $db;

  ?>
  
<!DOCTYPE html>
<script>
</script>
<html>
  <head>
    <link rel="icon" href="https://static.thenounproject.com/png/1428657-200.png" type="image/icon type">
    <title>organization</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;900&display=swap" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function () {
        $('#organization thead tr').clone(true).appendTo( '#organization thead' );
        $('#organization thead tr:eq(1) th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });

      var table = $('#organization').DataTable({
         initComplete: function () {
             // Apply the search
             this.api()
                 .columns()
                 .every(function () {
                     var that = this;

                     $('input', this.header()).on('keyup change clear', function () {
                         if (that.search() !== this.value) {
                             that.search(this.value).draw();
                         }
                     });
                 });
             },
         });


      $('a.toggle-vis').on('click', function (e) {
      e.preventDefault();

      // Get the column API object
      var column = table.column($(this).attr('data-column'));

      // Toggle the visibility
      column.visible(!column.visible());
      });
     });
    </script>
</head>
<body>

<header class="inverse">
    <div class="container">
        <h1><span class="accent-text">NPO</span></h1>
    </div>
</header>
</div>
<div style="padding-top: 10px; padding-bottom: 30px; width:90%; margin:auto; overflow:auto">
    <table id="schools" class="display compact">
        <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Description</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
            <th>Creation_date</th>
            <th>Last_update</th>
            <th>Delete/Update</th>
          </tr>
        </thead>
        <tbody>
          <!-- Populating table with data from the database-->
          <?php


            $sql = "SELECT * FROM organization";
            $result = mysqli_query($db, $sql);

            if ($result->num_rows > 0) {
              // Create table with data from each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $row["Name"]. "</td>
                <td>" . $row["Type"]."</td>
                <td>". $row["Description"]. "</td>
                <td>" .$row["Address"]. "</td>
                <td>" . $row["City"]."</td>
                <td>" . $row["State"]. "</td>
                <td>" . $row["Country"]. "</td>
                <td>" . $row["Email"]. "</td>
                <td>" . $row["Phone"]. "</td>
                <td>" . $row["Website"]. "</td>
                <td>" . $row["Creation_date"]. "</td>
                <td>" . $row["Last_update"]. "</td>
                <td>
                  <form action='' method='POST'>
                    <input type='hidden' name='id' value='". $row["id"] . "'>
                    <input type='submit' id='admin_buttons' name='delete/update' value='Delete/Update'/>
                  </form>
                </td>
                </tr>";
              }
            }
          
            ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
