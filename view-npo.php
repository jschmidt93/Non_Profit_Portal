<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Organization</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styles.css" rel="stylesheet" type="text/css" media="all" />
    <script src="https://kit.fontawesome.com/81c2c05f29.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <style>
        .wrapper {
            width: 50%;
            margin: 0 auto;
        }
    </style>
</head>

<body style="background-color: #1c1c1c">
    <?php

    //check existence of id parameter before processing
    if (isset($_GET["id"])) {
        require_once "connection.php";
        include "header.php";
        $npo_id = $_GET["id"];
        $npo_logo = "";
        $npo_name = "";
        $npo_type = "";
        $npo_description = "";
        $npo_phone = "";
        $npo_website = "";

        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        // establist connection with database
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //set charset to utf-8
        $conn->set_charset("utf8");

        //create sql

        $sql = "SELECT * FROM organization WHERE id={$npo_id}";
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $npo_id = $row["id"];
            $npo_logo = $row["logo_url"];
            $npo_name = $row["name"];
            $npo_type = $row["type"];
            $npo_description = $row["description"];
            $npo_phone = $row["phone"];
            $npo_website = $row["website"];
        }
    }
    ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                        <p><b><?php echo '<img src="'.$npo_logo.'" style="max-width: 300px;">'; ?></b></p>
                    </div>
                    <h1 class="mt-5 mb-3"><?php echo $npo_name; ?></h1>
                    <div class="form-group">
                        <label> Organization Type </label>
                        <p><b><?php echo $npo_type; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <p><b><?php echo $npo_description; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <p><b><?php echo $npo_phone; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Website</label>
                        <p><b><?php echo $npo_website; ?></b></p>
                    </div>
                    
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>