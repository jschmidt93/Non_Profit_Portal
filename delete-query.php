
<?php
require 'connection.php';
// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "DELETE FROM organization WHERE ID = " . $_POST['id'];
$result = $conn->query($sql);

$conn->close();
header("location: admin_npo-list.php");
?>
