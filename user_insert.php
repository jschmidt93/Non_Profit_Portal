<?php

session_start();
require_once "connection.php";


 $fname = $_POST['first_name'];
 $lname = $_POST['last_name'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $permission = $_POST['permissions'];

 


 //create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

 if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
 }else{
   $hash_pass = password_hash($password,PASSWORD_DEFAULT);
   $stmt = $conn->prepare("INSERT INTO users(first_name, last_name, email, password, permissions) values(?,?,?,?,?)");
    $stmt->bind_param("sssss",$fname,$lname,$email,$hash_pass,$permission);
    $stmt->execute();
    echo "New resource added successfully";
    $stmt->close();
    $conn->close();
    header("Location: user_list.php");
      die;
 }



?>