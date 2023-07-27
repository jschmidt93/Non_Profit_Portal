<?php

session_start();
require_once "connection.php";

function process_upload_file () {
  $destination_directory = 'logos';
  $image_file = 'default-logo.jpg';
  $allowed_file_types = array('png', 'gif', 'jpeg', 'jpg');

  $destination_path = $destination_directory . DIRECTORY_SEPARATOR .$image_file;
  if ($_FILES['logo']['error'] != UPLOAD_ERR_OK) {
      echo 'There was an error upload the file';
      $destination_path = $destination_directory . DIRECTORY_SEPARATOR .$image_file;
  }
  else {
      $source_path = $_FILES['logo']['tmp_name']; 
      $file_extension = end(explode('.', $_FILES['logo']['name']));
      echo gettype($file_extension) . '<br>';
      if (!in_array($file_extension, $allowed_file_types)) {
          echo $file_extension . ' is not a valid file type<br>';
      }
      else {
          $image_file = 'np_' . time() . '_gk.'. $file_extension;
          echo gettype($image_file) . '<br>';
          $destination_path = $destination_directory . DIRECTORY_SEPARATOR .$image_file;
          move_uploaded_file($source_path, $destination_path);
      }
  }
  $elem = '<img src="' . $destination_path . '" "width=500" height="600">';
  echo '<p>' . $elem . '</p>';
  return $image_file; //$elem;
}

$created_by = "";
 $name = $_POST['name'];
 $type = $_POST['type'];
 $description = $_POST['description'];
 $address = $_POST['address'];
 $city = $_POST['city'];
 $state = $_POST['state'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $website = $_POST['website'];
 $logo = process_upload_file();

 if(isset($_SESSION['user_id'])){
  $created_by = $_SESSION['user_id'];
 }
 


 //create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

 if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
 }else{

  $stmt = $conn->prepare("INSERT INTO organization(name, type, description, address, city, state, email, phone, website, logo, created_by) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssssis", $name, $type, $description, $address, $city, $state, $email, $phone, $website, $logo, $created_by);
$stmt->execute();

    echo "New resource added successfully";
    $stmt->close();
    $conn->close();
    header("Location: npo-list.php");
      die;
 }



?>