<!DOCTYPE html>
<html lang="en" style="background-color:#1c1c1c">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styles.css" rel="stylesheet" type="text/css" media="all" />
    <script src="https://kit.fontawesome.com/81c2c05f29.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <title>Delete Resource</title>
</head>

<body>
    <?php

    if (isset($_GET["id"])) {
        require_once "connection.php";
        include "header.php";

        $resource_id = $_GET["id"];
        $resource_topic = "test";
        $resource_description = "";
        $resource_type = "";
        $resource_keywords = "";
        $resource_links = "";
        $resource_user = "";

        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        // establist connection with database
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //set charset to utf-8
        $conn->set_charset("utf8");

        //create sql
        $sql = "SELECT * FROM resources WHERE id={$resource_id}";
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $resource_id = $row["id"];
            $resource_topic = $row["topic"];
            $resource_description = $row["description"];
            $resource_type = $row["type"];
            $resource_keywords = $row["keywords"];
            $resource_links = $row["link"];
            $resource_user = $row["userID"];
        }
    }
    ?>
    <div class="add-resource-box" style="display: grid;">
        <h1>Modify a Resource</h1>
        <label for="topic">Topic</label>
        <div class="input"><?php echo $resource_topic; ?></div><br><br>

        <label for="description">Description</label>
        <div class="input"><?php echo $resource_description; ?></div><br><br>

        <label for="keywords">Keywords</label>
        <div class="input"><?php echo $resource_keywords; ?></div></textarea><br><br>

        <label for="resource-type">Resource Type</label>
        <div class="input"><?php echo $resource_type; ?></div><br><br>

        <label for="link">Resourse URL</label>
        <div class="input"><?php echo $resource_links; ?></div><br><br>

        <button class="home-button" onclick="location.href='delete-query.php?id=<?php echo $resource_id; ?>';"> Delete </button>
    </div>
</body>

</html>