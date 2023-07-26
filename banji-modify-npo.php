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

        $npo_id = $_GET["id"];
        $update_time = DateTime::timestamp();

        `id` int(11) NOT NULL,
        `name` varchar(255) NOT NULL,
        `type` varchar(100) NOT NULL,
        `description` text NOT NULL,
        `address` varchar(255) NOT NULL,
        `city` varchar(100) NOT NULL,
        `state` varchar(100) NOT NULL,
        `country` varchar(100) NOT NULL DEFAULT 'United States',
        `email` varchar(255) NOT NULL,
        `phone` varchar(20) NOT NULL,
        `website` varchar(500) NOT NULL,
        `logo_url` varchar(500) NOT NULL,
        `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        `last_updated` timestamp NULL DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        $resource_topic = "";
        $resource_description = "";
        $resource_type = "";
        $resource_keywords = "";
        $resource_links = "";
        $resource_user = "";

        $new_name = "";
        $new_type = "";
        $new_description = "";


        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        // establist connection with database
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //set charset to utf-8
        $conn->set_charset("utf8");

        //create sql
        

        function update_name (String $newName) {
            $sql = "UPDATE organizations SET name = ?, last_updated = ? WHERE id = ?";
            $query = $conn->prepare($sql);
            $query->bind_param("ssi", $newName,  $update_time, $npo_id)
            $query->execute();
            $query->close();
        }

        function update_type (String $newType) {
            $sql = "UPDATE organizations SET type = ?, last_updated = ? WHERE id = ?";
            $query = $conn->prepare($sql);
            $query->bind_param("ssi", $newType,  $update_time, $npo_id)
            $query->execute();
            $query->close();
        }

        function update_description (String $newDescription) {
            $sql = "UPDATE organizations SET description = ?, last_updated = ? WHERE id = ?";
            $query = $conn->prepare($sql);
            $query->bind_param("ssi", $newDescription,  $update_time, $npo_id)
            $query->execute();
            $query->close();
        }

        function update_address (String $newAddress) {
            $sql = "UPDATE organizations SET address = ?, last_updated = ? WHERE id = ?";
            $query = $conn->prepare($sql);
            $query->bind_param("ssi", $newAddress,  $update_time, $npo_id)
            $query->execute();
            $query->close();
        }$
        function update_city (String $newcity) {
            $sql = "UPDATE organizations SET city = ?, last_updated = ? WHERE id = ?";
            $query = $conn->prepare($sql);
            $query->bind_param("ssi", $newCity,  $update_time, $npo_id)
            $query->execute();
            $query->close();
        }

        function update_country (String $newCountry) {
            $sql = "UPDATE organizations SET country = ?, last_updated = ? WHERE id = ?";
            $query = $conn->prepare($sql);
            $query->bind_param("ssi", $newCountry,  $update_time, $npo_id)
            $query->execute();
            $query->close();
        }

        function update_email (String $newEmail) {
            $sql = "UPDATE organizations SET email = ?, last_updated = ? WHERE id = ?";
            $query = $conn->prepare($sql);
            $query->bind_param("ssi", $newEmail,  $update_time, $npo_id)
            $query->execute();
            $query->close();
        }

        function update_phone (String $newPhone) {
            $sql = "UPDATE organizations SET phone = ?, last_updated = ? WHERE id = ?";
            $query = $conn->prepare($sql);
            $query->bind_param("ssi", $newPhone,  $update_time, $npo_id)
            $query->execute();
            $query->close();
        }

        function update_website (String $newWebsite) {
            $sql = "UPDATE organizations SET website = ?, last_updated = ? WHERE id = ?";
            $query = $conn->prepare($sql);
            $query->bind_param("ssi", $newWebsite, $update_time,  $npo_id)
            $query->execute();
            $query->close();
        }

        function update_logo (String $newLogo) {
            $sql = "UPDATE organizations SET log_url = ?, last_updated = ? WHERE id = ?";
            $query = $conn->prepare($sql);
            $query->bind_param("ssi", $newLogo,  $update_time, $npo_id)
            $query->execute();
            $query->close();
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