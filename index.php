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

  <title>Non-Profit Organization Portal</title>

</head>
<body>

<?php include "header.php"; 
require_once "connection.php";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// establist connection with database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//set charset to utf-8
$conn->set_charset("utf8");
//create sql


$sql = "SELECT * FROM organization ORDER BY RAND()";
$result = $conn->query($sql);

if(isset($_POST['filter_option'])){
if($_POST['filter_option'] == 'private'){
  $sql = "SELECT * FROM organization WHERE type LIKE 'Private'";
  $result = $conn->query($sql);
}else if($_POST['filter_option'] == 'charity'){
  $sql = "SELECT * FROM organization WHERE type LIKE 'Charity'";
  $result = $conn->query($sql);
}else if($_POST['filter_option'] == 'specialized'){
  $sql = "SELECT * FROM organization WHERE type LIKE 'Specialized'";
  $result = $conn->query($sql);
}else if($_POST['filter_option'] == 'educational'){
  $sql = "SELECT * FROM organization WHERE type LIKE 'Educational'";
  $result = $conn->query($sql);
}else if($_POST['filter_option'] == 'housing'){
  $sql = "SELECT * FROM organization WHERE type LIKE 'Housing'";
  $result = $conn->query($sql);
}else if($_POST['filter_option'] == 'showall'){
  $sql = "SELECT * FROM organization";
  $result = $conn->query($sql);
}
}

?>

<h1 style="text-align:center">Welcome To The Non-Profit Organizations Portal</h1>

<form name="npo_filter" method="POST" style="text-align: center;">
  <select name="filter_option" id="filter_option" onchange="this.form.submit()">
    <option value="all" selected="selected">Filter By Type</option>
    <option value="private">Private</option>
    <option value="charity">Charity</option>
    <option value="specialized">Specialized</option>
    <option value="educational">Educational</option>
    <option value="housing">Housing</option>
    <option value="showall">Show All</option>
  </select>

<main>

<?php

while ($row = mysqli_fetch_assoc($result)) {
  
 ?>
 <a style="text-decoration: none" href=<?php echo'view-npo.php?id='. $row["id"];?>>
        <div class="card">
          <div class="card-item">
          <p style="font-size: 14px;" class="npo_type"><?php echo $row["type"]; ?></p>
          <p><b><?php echo '<img src="logos/' . $row["logo"] .'" style="max-width: 300px;">'; ?></b></p>
             <!-- <img src= <?php echo $row["logo"] ?> style="max-width: 200px;"> -->
              <p style="font-size: 20px; padding:1em;" class="topic_name"><?php echo $row["name"]; ?></p>
              
              </a>
              </div>
            </div></br>
            <?php
}
            ?>
          </main>
</html>
