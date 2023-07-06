<?php

session_start();
require_once "connection.php";

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
 $logo_url = $_POST['logo_url'];

 if(isset($_SESSION['user_id'])){
  $created_by = $_SESSION['user_id'];
 }
 


 //create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

 if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
 }else{

   $stmt = $conn->prepare("INSERT INTO organization(id, name, type, description, address, city, state, email, phone, website, logo_url, created_by) values(NULL,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssssssi",$name,$type,$description,$address,$city,$state,$email,$phone,$website,$logo_url,$created_by);
    $stmt->execute();
    echo "New resource added successfully";
    $stmt->close();
    $conn->close();
    header("Location: npo-list.php");
      die;
 }



?>