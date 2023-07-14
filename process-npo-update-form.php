<?php
    require_once('header.php');
    require_once('html_head_tag_imports.php');
    require_once('connection.php');
    require_once('nonprofit-class.php');
    require_once('database-connection-handler.php');
    require_once('sanitize-input.php');
    //require_once('view-npo.php'); // for testing only

    if(session_id() == '') { session_start(); }
    //echo $nonprofit;

    function update_nonprofit (int $id) {
        //echo '<br>npo-update-form $_POST Array Contents:<br>';
        //echo print_r($_POST);

        $name = sanitize_input($_POST['name']);
        $type = sanitize_input($_POST['type']);
        $description = sanitize_input($_POST['description']);
        $address = sanitize_input($_POST['address']);
        $city = sanitize_input($_POST['city']);
        $state = sanitize_input($_POST['state']);
        $email = sanitize_input($_POST['email']);
        $phone = sanitize_input($_POST['phone']);
        $website = sanitize_input($_POST['website']);
        $logo_url = sanitize_input($_POST['logo_url']);

        //echo '<br>Post Variables: ' . $name . ' ' . $type . ' ' . $description . ' ' . $address . ' ' . $city 
        //. ' ' . $state . ' ' . $phone . ' ' . $email . ' ' . $website . ' ' . $logo_url. '<br>' .PHP_EOL;
        //echo '<br>ID:' . $id . '<br>';
        $conn = db_connect();
        $sql = 'UPDATE organization SET ' 
            . 'name = ?, '
            . 'type = ?, '
            . 'description = ?, '
            . 'address = ?, '
            . 'city = ?, '
            . 'state = ?, '
            . 'phone = ?, '
            . 'email = ?, '
            . 'website = ?, '
            . 'logo_url = ?, '
            . 'last_updated = CURRENT_TIMESTAMP() '
            . 'WHERE id = ?'; 
        //echo $sql;
        $query = $conn->prepare($sql);
        $query->bind_param('ssssssssssi', $name, $type, $description, $address, $city, $state, $phone, $email, $website, $logo_url, $id); 
        //ssssssssi', $name,$type,$description, $address,$city,$state, $phone,$email,$website, $logo_url, $id); //, $logo_url, $id);
        $query->execute();
        $query->close();
        $conn->close();
    } // close update_nonprofit
    $nonprofit = unserialize($_SESSION['nonprofit']);
    //echo 'passing id ' .$nonprofit->get_id();
    update_nonprofit($nonprofit->get_id());
   
    header('npo-view.php', true, 301);
    exit();
?>