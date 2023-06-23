<!DOCTYPE html>
<html lang="en" style="background-color:#1c1c1c">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styles.css" rel="stylesheet" type="text/css" media="all" />
    <title>Add A Resource</title>
</head>
<body>
<?php include('header.php'); ?>

<div class="add-resource-box" style="margin: 0 auto;">
<form action="resource-insert.php" method="POST">

    <h1>Add A Resource</h1>

    <label for="topic">Topic</label>
    <input id="topic" class="input" type="text" maxlength="100"name="topic" required/><br><br>

    <label for="description">Description</label>
    <textarea  rows="10" cols="50" id="description" class="input" type="text" maxlength="2000" name="description" required></textarea><br><br>

    <label for="keywords">Keywords</label>
    <textarea rows="10" cols="50" id="keywords" class="input" type="text" maxlength="255" name="keywords" required></textarea><br><br>

    <label for="resource-type">Resource Type</label>
    <select id="resource-type" class="input" name="type" required>
        <option value="" disabled selected>Select Resource Type</option>
            <option value="blog">Article</option>
            <option value="image">Image</option>
            <option value="book">Online Book</option>
            <option value="video">Video</option>
            <option value="website">Website</option>
    </select><br><br>

    <label for="link">Resourse URL</label>
    <input id="link" class="input" type="url" maxlength="500" name="link" required/><br><br>

    <input type="submit" value="Submit" class="general-button"/>
</form>
</div>


</body>
</html>