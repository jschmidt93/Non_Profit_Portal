<?php

require_once "connection.php";

$user_fname = $_POST['first_name'];
$user_lname = $_POST['last_name'];
$permission = $_POST['permissions'];
$password = $_POST['password'];
$email = $_POST['email'];


 //create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE users SET first_name='{$user_fname}', last_name='{$user_lname}', permissions='{$permission}', password='{$password}', email='{$email}' WHERE user_id='{$_GET['user_id']}'";
echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
$con->close();

header("location: user_list.php");
exit();

?>