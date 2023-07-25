<?php 
?>
<html>
    <head>
        <title>File Upload Form</title>
    </head>
    <body>
        <form action="process-file-upload-form.php" method="POST" enctype="multipart/form-data">
            <label for="logo">Upload Logo</label>
            <input id="logo" name="logo" class="input" type="file"/>
            <input type="submit" value="Upload" accept="image/x-png,image/gif,image/jpeg/image/jpg" class="home-button"/>
        </form>
    </body>
</html>