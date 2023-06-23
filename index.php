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

  <title>Machine Learning Portal</title>

</head>
<body>

<?php include "header.php"; 
require_once "connection.php";
$resource_id = "";
$resource_topic = "";
$resource_description = "";
$resource_type = "";
$resource_keywords = "";
$resource_links = "";
$resource_userID = "";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// establist connection with database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//set charset to utf-8
$conn->set_charset("utf8");
//create sql


$sql = "SELECT * FROM resources ORDER BY RAND()";
$result = $conn->query($sql);

if(isset($_POST['filter_option'])){
if($_POST['filter_option'] == 'intro'){
  $sql = "SELECT * FROM resources WHERE topic LIKE '%intro%' OR keywords LIKE '%intro%'";
  $result = $conn->query($sql);
}else if($_POST['filter_option'] == 'super_unsuper'){
  $sql = "SELECT * FROM resources WHERE topic LIKE '%supervised%' OR keywords LIKE '%supervised%'";
  $result = $conn->query($sql);
}else if($_POST['filter_option'] == 'python'){
  $sql = "SELECT * FROM resources WHERE topic LIKE '%python%' OR keywords LIKE '%python%'";
  $result = $conn->query($sql);
}else if($_POST['filter_option'] == 'regression'){
  $sql = "SELECT * FROM resources WHERE topic LIKE '%regression%' OR keywords LIKE '%regression%'";
  $result = $conn->query($sql);
}else if($_POST['filter_option'] == 'neural'){
  $sql = "SELECT * FROM resources WHERE topic LIKE '%neural%' OR keywords LIKE '%neural%'";
  $result = $conn->query($sql);
}else if($_POST['filter_option'] == 'decision'){
  $sql = "SELECT * FROM resources WHERE topic LIKE '%decision%' OR keywords LIKE '%decision%'";
  $result = $conn->query($sql);
}else if($_POST['filter_option'] == 'applications'){
  $sql = "SELECT * FROM resources WHERE topic LIKE '%applications%' OR keywords LIKE '%applications%'";
  $result = $conn->query($sql);
}else if($_POST['filter_option'] == 'videos'){
  $sql = "SELECT * FROM resources WHERE type LIKE '%video%'";
  $result = $conn->query($sql);
}else if($_POST['filter_option'] == 'websites'){
  $sql = "SELECT * FROM resources WHERE type LIKE '%website%'";
  $result = $conn->query($sql);
}else if($_POST['filter_option'] == 'blogs'){
  $sql = "SELECT * FROM resources WHERE type LIKE '%blog%'";
  $result = $conn->query($sql);
}
}

?>

<h1 style="text-align:center">Welcome To The Machine Learning Portal</h1>

<form name="resource_filter" method="POST" style="text-align: center;">
  <select name="filter_option" id="filter_option" onchange="this.form.submit()">
    <option value="all" selected="selected">Filter Resources</option>
    <option value="intro">Intro To Machine Learning</option>
    <option value="super_unsuper">Supervised & Unsupervised</option>
    <option value="python">Python</option>
    <option value="regression">Regression</option>
    <option value="neural">Neural Networks</option>
    <option value="decision">Decision Trees</option>
    <option value="applications">Applications</option>
    <option value="videos">Videos</option>
    <option value="websites">Websites</option>
    <option value="blogs">Blogs</option>
  </select>

<main>

<?php
require "fetch-thumbnail.php";
while ($row = mysqli_fetch_assoc($result)) {
  if($row['type'] == 'video'){
    $url = $row['link'];
    $resource_tn = getImg($url);
  }
  elseif($row["thumbnail"] == NULL){
    $resource_tn = "https://techbullion.com/wp-content/uploads/2021/05/technology-5917370_1280.png";
  } else {
    $resource_tn = $row["thumbnail"]; ;
  }
 ?>
 <a style="text-decoration: none" href=<?php echo'view-npo.php?id='. $row["id"];?>>
        <div class="card">
          <div class="card-item">
          <p style="font-size: 14px;" class="resource_type"><?php echo $row["type"]; ?></p>
              <img src=<?php echo $resource_tn ?> style="width: 250px; height: 180px;">
              <p style="font-size: 20px; padding:1em;" class="topic_name"><?php echo $row["topic"]; ?></p>
              
              </a>
              </div>
            </div></br>
            <?php
}
            ?>
          </main>
</html>
