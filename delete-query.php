<?php

require_once "connection.php";
 //create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM resources WHERE id={$_GET['id']}";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
$con->close();

header("location: admin.php");
exit();

?>