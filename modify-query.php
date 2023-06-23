<?php

require_once "connection.php";

 $topic = $_POST['topic'];
 $description = $_POST['description'];
 $keywords = $_POST['keywords'];
 $type = $_POST['type'];
 $link = $_POST['link'];

 //create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE resources SET topic='{$topic}', description='{$description}', keywords='{$keywords}', type='{$type}', link='{$link}' WHERE id='{$_GET['id']}'";
echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
$con->close();

header("location: admin.php");
exit();

?>