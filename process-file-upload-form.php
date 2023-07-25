<?php
//print_r($_FILES['logo']) . '<br>';

function process_upload_file () {
    $destination_directory = 'logos';
    $image_file = 'default-logo.jpg';
    $allowed_file_types = array('png', 'gif', 'jpeg', 'jpg');

    $destination_path = $destination_directory . DIRECTORY_SEPARATOR .$image_file;
    if ($_FILES['logo']['error'] != UPLOAD_ERR_OK) {
        echo 'There was an error upload the file';
        $destination_path = $destination_directory . DIRECTORY_SEPARATOR .$image_file;
    }
    else {
        $source_path = $_FILES['logo']['tmp_name']; 
        $file_extension = end(explode('.', $_FILES['logo']['name']));
        if (!in_array($file_extension, $allowed_file_types)) {
            echo $file_extension . ' is not a valid file type<br>';
        }
        else {
            $image_file = 'np_' . time() . '-gk.'. $file_extension;
            $destination_path = $destination_directory . DIRECTORY_SEPARATOR .$image_file;
            move_uploaded_file($source_path, $destination_path);
        }

    }
    echo $destination_directory . '<br>';
    $elem = '<img src="' . $destination_path . '" "width=500" height="600">';
    echo $elem;
    return $destination_path; //$elem;
}

?>

<html>
    <head>
        <title>
            Display Picture
        </title>
    </head>

    <body>
        <?php echo process_upload_file(); ?>
    </body>
</html>
