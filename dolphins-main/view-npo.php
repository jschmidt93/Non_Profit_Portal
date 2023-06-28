<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Resource</title>
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
        }
    }
    ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3"><?php echo $resource_topic; ?></h1>
                    <div class="form-group">
                        <label> keywords </label>
                        <p><b><?php echo $resource_keywords; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <p><b><?php echo $resource_description; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Resource Type</label>
                        <p><b><?php echo $resource_type; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Resource</label><br>
                        <button class="btn btn-primary" style="margin-bottom: 15px;" onclick="window.open('<?php echo $resource_links ?>');"> Open in new tab </button>
                        <!-- <iframe src="<?php echo $resource_links ?>" style="height: 500px; width: 100%; margin-top: 20px;"></iframe> -->
                        <div id="demo" style="width: 100%;"></div>
                        <script>
                            const type = '<?php echo $resource_type; ?>';
                            const link = '<?php echo $resource_links; ?>';
                            if (type == 'video') {
                                fetch('https://www.youtube.com/oembed?url='+link+'&format=json&maxwidth=600&maxheight=600')
                                    .then(res => res.json())
                                    .then((res) => {
                                        const html = res.html
                                        document.getElementById("demo").innerHTML = html;
                                    });

                            } else {
                                document.write('<iframe src="' + link + '" style="height: 500px; width: 100%; margin-top: 20px;"></iframe>');
                            }
                        </script>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>