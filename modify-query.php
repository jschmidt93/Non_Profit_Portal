<?php

require_once "connection.php";

$name = $_POST['name'];
$type = $_POST['type'];
$description = $_POST['description'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$website = $_POST['website'];
$logo_url = $_POST['logo_url'];

 //create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE organization SET name='{$name}', type='{$type}', description='{$description}', address='{$address}', city='{$city}', state='{$state}', email='{$email}', phone='{$phone}', website='{$phone}', logo_url='{$logo_url}' WHERE id='{$_GET['id']}'";
echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
$con->close();

header("location: npo-list.php");
exit();

?>