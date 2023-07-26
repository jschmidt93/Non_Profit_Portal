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
    if (isset($_GET["user_id"])) {
        require_once "connection.php";
        include "header.php";
        $user_id = $_GET["user_id"];
        $user_first = "";
        $user_last = "";
        $email = "";
        $user_permission = "";


        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        // establist connection with database
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //set charset to utf-8
        $conn->set_charset("utf8");

        //create sql

        $sql = "SELECT * FROM users WHERE id={$user_id}";
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $user_id = $row["user_id"];
            $user_first = $row["first_name"];
            $user_last = $row["last_name"];
            $email = $row["email"];
            $user_permission = $row["permissions"];
            $user_name = $user_first." "+ $user_last;
        }
    }
    ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3"><?php echo $user_name; ?></h1>
              
                    <p><a href="index.php" class="btn btn-primary">Back</a>
                    <a href="modify-user.php?id=<?php echo $user_id; ?>" class="btn btn-primary">Modify</a></p>
                    
                </div>
            </div>
        </div>
    </div>
</body>

</html>