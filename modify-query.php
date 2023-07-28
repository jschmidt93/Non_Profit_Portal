<?php

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

$name = $_POST['name'];
$type = $_POST['type'];
$description = $_POST['description'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$website = $_POST['website'];
$logo = trim(process_upload_file());
$npo_admin = $_POST['npo_admin'];
echo 'logo:' . $logo . '<br>';

 //create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE organization SET name='{$name}', type='{$type}', description='{$description}', address='{$address}', city='{$city}', state='{$state}', email='{$email}', phone='{$phone}', website='{$website}', logo='{$logo}', created_by='{$npo_admin}' WHERE id='{$_GET['id']}'";
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