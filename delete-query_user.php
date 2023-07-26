
<?php
require 'connection.php';
// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "DELETE FROM users WHERE USER_ID = " . $_POST['id'];
$result = $conn->query($sql);

$conn->close();
header("location: user_list.php");
?>
