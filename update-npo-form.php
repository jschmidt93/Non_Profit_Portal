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
    }

    // Need session info 
    ?>
    <div class="add-resource-box">
        <form action="modify-npo.php?id=<?php echo $resource_id;?>" method="POST">

            <h1>Update and NPO Data</h1>

            <label for="name">name</label>
            <input id="name" class="input" type="text" maxlength="100" name="name" value="<?php echo $resource_topic; ?>" required /><br><br>

            <label for="type">type</label>
            <input id="type" class="input" type="text" maxlength="100" name="type" value="<?php echo $resource_topic; ?>" required /><br><br>

            <label for="description">Description</label>
            <textarea  rows="10" cols="50" id="description" class="input" type="text" name="description" maxlength="2000" required><?php echo $resource_description; ?></textarea><br><br>

            <label for="address">address</label>
            <input id="address" class="input" type="text" maxlength="100" name="address" value="<?php echo $resource_topic; ?>" required /><br><br>

            <label for="city">city</label>
            <input id="city" class="input" type="text" maxlength="100 "name="city" value="<?php echo $resource_topic; ?>" required /><br><br>

            <label for="state">state</label>
            <input id="state" class="input" type="text" maxlength="100" name="state" value="<?php echo $resource_topic; ?>" required /><br><br>

            <label for="country">country</label>
            <input id="country" class="input" type="text" maxlength="100 "name="country" value="<?php echo $resource_topic; ?>" required /><br><br>

            <label for="email">email</label>
            <input id="email" class="input" type="text" maxlength="100" name="email" value="<?php echo $resource_topic; ?>" required /><br><br>

            <label for="phone">phone</label>
            <input id="phone" class="input" type="text" maxlength="100 "name="phone" value="<?php echo $resource_topic; ?>" required /><br><br>

            <label for="website">website</label>
            <input id="website" class="input" type="text" maxlength="100" name="website" value="<?php echo $resource_topic; ?>" required /><br><br>

            <label for="country">country</label>
            <input id="country" class="input" type="text" maxlength="100 "name="country" value="<?php echo $resource_topic; ?>" required /><br><br>


            <input type="submit" value="Submit" class="home-button" />
        </form>
    </div>
</body>

</html>