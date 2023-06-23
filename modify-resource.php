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
    <title>Modify Resource</title>
</head>

<body>
    <?php
    if (isset($_GET["id"])) {
        require_once "connection.php";
        include "header.php";

        $resource_id = $_GET["id"];
        $resource_topic = "";
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
    <div class="add-resource-box">
        <form action="modify-query.php?id=<?php echo $resource_id;?>" method="POST">

            <h1>Modify a Resource</h1>

            <label for="topic">Topic</label>
            <input id="topic" class="input" type="text" maxlength="100 "name="topic" value="<?php echo $resource_topic; ?>" required /><br><br>

            <label for="description">Description</label>
            <textarea  rows="10" cols="50" id="description" class="input" type="text" name="description" maxlength="2000" required><?php echo $resource_description; ?></textarea><br><br>

            <label for="keywords">Keywords</label>
            <textarea rows="10" cols="50" id="keywords" class="input" type="text" maxlength="255" name="keywords" required><?php echo $resource_keywords; ?></textarea><br><br>

            <label for="resource-type">Resource Type</label>
            <select id="resource-type" class="input" name="type" required>
                <option value="" disabled>Select Resource Type</option>
                <option value="blog" <?php if($resource_type == "blog") echo 'selected'?>>Article</option>
                <option value="image" <?php if($resource_type == "image") echo 'selected'?>>Image</option>
                <option value="book" <?php if($resource_type == "book") echo 'selected'?>>Online Book</option>
                <option value="video" <?php if($resource_type == "video") echo 'selected'?>>Video</option>
                <option value="website" <?php if($resource_type == "website") echo 'selected'?>>Website</option>
            </select><br><br>

            <label for="link">Resourse URL</label>
            <input id="link" class="input" type="url" maxlength="500" name="link" value="<?php echo $resource_links; ?>" required /><br><br>

            <input type="submit" value="Submit" class="home-button" />
        </form>
    </div>
</body>

</html>