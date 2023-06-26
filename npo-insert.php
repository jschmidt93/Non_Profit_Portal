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

 if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
 }else{

   $stmt = $conn->prepare("INSERT INTO organization(id, name, type, description, address, city, state, email, phone, website, logo_url) values(NULL,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssssss",$name,$type,$description,$address,$city,$state,$email,$phone,$website,$logo_url);
    $stmt->execute();
    echo "New resource added successfully";
    $stmt->close();
    $conn->close();
    header("Location: npo-list.php");
      die;
 }



?>