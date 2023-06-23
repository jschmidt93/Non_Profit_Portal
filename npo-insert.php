<?php

require_once "connection.php";

 $topic = $_POST['topic'];
 $description = $_POST['description'];
 $keywords = $_POST['keywords'];
 $type = $_POST['type'];
 $link = $_POST['link'];

 //create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

 if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
 }else{

   $stmt = $conn->prepare("INSERT INTO resources(id, topic, description, type, keywords, link, instructor_id) values(NULL,?,?,?,?,?,1)");
    $stmt->bind_param("sssss",$topic,$description,$type,$keywords,$link);
    $stmt->execute();
    echo "New resource added successfully";
    $stmt->close();
    $conn->close();
    header("Location: resource-list.php");
      die;
 }



?>