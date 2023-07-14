<?php
    require_once('header.php');
    require_once('html_head_tag_imports.php');
    require_once('connection.php');
    require_once('nonprofit-class.php');
    require_once('database-connection-handler.php');
    require_once('sanitize-input.php');

    //echo '<p>$_GET[] = ';
    //print_r($_GET) . '</p>' . PHP_EOL;
    if(session_id() == '') { 
        session_start(); 
        $_SESSION['id'] = $_GET['id'];
    }
    
/*
    function id_handler () {
        $id = '';
        if (is_null($_SESSION['nonprofit']) == false) {
            $id = unserialize($_SESSION['nonprofit'])->get_id();
        }
        else if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
        }
        return $id;
    } // close get_id
*/
    function get_nonprofit (int $id) {
        //echo '<br>ID:' . $id . '<br>';
        $conn = db_connect();
        $sql = 'SELECT '
            . 'name, type, description, address, city, state, phone, email, website, logo_url '
            . 'FROM organization WHERE id = ?'; 
        //echo 'SQL: ' . $sql . '<br>';

        $query = $conn->prepare($sql);
        $query->bind_param('i', $id);
        $query->execute();
        $query->bind_result($name, $type, $description, $address, $city, $state, $phone, $email, $website, $logo_url);
        while ($query->fetch()) {
            //echo $name . $type . $description . $address . $city . $state . $phone . $email . $website . $logo_url . '<br>' .PHP_EOL;
            $nonprofit = new Nonprofit(intval($id), $name, $type, $description, $address, $city, $state, $email, $phone, $website, $logo_url);
            //echo $nonprofit . '<br>' . PHP_EOL;
        }
        $query->close();
        $conn->close();
       // if (is_null($nonprofit)) {
       //     echo '<br>Empty result from view-npo::get_nonprofit<br>' . PHP_EOL;
       // }
        $_SESSION['nonprofit'] = serialize($nonprofit);
        return $nonprofit;
    } // close get_nonprofit

    //$id = 0;
    //if (isset($_SESSION['nonprofit'])) { $id = unserialize($_SESSION['nonprofit']); }
    //else { 
     //   $id = intval($_GET['id']); 
    //}
    //echo 
    $nonprofit = get_nonprofit(intval($_GET['id']));
    //echo $nonprofit . '<br>';
    $styled_page_heading = '<div><h1 class="mt-5 mb-3">' . $nonprofit->get_name() . ' Information</h1></div>';
    $page_title = '<title>' . $nonprofit->get_name() . ' Information</title>';
?>

<html>
    <head>
        <?php 
            echo $html_head_tag_imports;
            echo $page_title;
        ?>
    </head>
    <body style="background-color: #1c1c1c">
        <?php // echo $nonprofit . '<br>'; ?>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $styled_page_heading; ?>
                        <div class="form-group">
                            <p><?php echo  $nonprofit->clickable_logo(); ?></p>
                            </div>
                            <div class="form-group">
                                <label> Type </label>
                                <p><b><?php echo $nonprofit->get_type(); ?></b></p>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <p><b><?php echo $nonprofit->get_description() ; ?></b></p>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <p><b><?php echo $nonprofit->print_address(); ?></b></p>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <p><b><?php echo $nonprofit->get_phone(); ?></b></p>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <p><b><?php echo $nonprofit->get_email(); ?></b></p>
                            </div> 
                            <div class="form-group">
                                <label>Website</label><br>
                                <button class="btn btn-primary" style="margin-bottom: 15px;" onclick="window.open('<?php echo $nonprofit->get_website(); ?>');"> Open in new tab </button>
                            </div>   
                            <div id="demo" style="width: 100%;"></div>
                        </div>
                    <p>
                        <a href="index.php" class="btn btn-primary">Back</a> 
                        <a href="npo-update-form.php" class="btn btn-primary">Update</a>
                        <!--<a href="modify-npo.php" class="btn btn-primary">Update</a>-->
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>