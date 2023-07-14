<?php
    require_once('header.php');
    require_once('html_head_tag_imports.php');
    require_once('connection.php');
    require_once('nonprofit-class.php');
    require_once('database-connection-handler.php');
    require_once('sanitize-input.php');

    if(session_id() == '') { 
        session_start(); 
        $_SESSION['id'] = $_POST['id'];
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

    //echo '$_SESSION ARRAY CONTENTS:<br>';
    //print_r($_SESSION['nonprofit']);
    $nonprofit = get_nonprofit(intval($_POST['id']));
    //$nonprofit = unserialize($_SESSION['nonprofit']);
    $page_heading = 'Update ' . $nonprofit->get_name() . ' Form';
    $page_title = '<title>Update ' . $nonprofit->get_name() . '</title>';
?>

<!DOCTYPE html>
    <head>
        <?php 
            echo $html_head_tag_imports;
            echo $page_title;
        ?>
    </head>
    <body>
        <div class="add-resource-box">
            <form action="process-npo-update-form.php?id=<?php echo $nonprofit->get_id(); ?>" method="POST">
                <h1>Update Form</h1>
                <label for="name">Name</label>
                <input id="name" name="name" class="input" type="text" maxlength="50" value=" <?php echo $nonprofit->get_name(); ?> "/>
                <br><br>

                <label for="type">Type</label>
                <!--<input id="type" name="type" class="input" type="text" maxlength="50" value=" <?php echo $nonprofit->get_type(); ?>" required/>-->
                <select name="type" id="type" required>
                    <option value="all" selected="selected">Nonprofit Type</option>
                    <option value="private">Private</option>
                    <option value="charity">Charity</option>
                    <option value="specialized">Specialized</option>
                    <option value="educational">Educational</option>
                    <option value="housing">Housing</option>
                   <!-- <option value="showall">Show All</option>-->
                </select>
                <br><br>

                <style>
                    .textarea-container {
                        position: relative;
                    }

                    .custom-textarea {
                        position: absolute;
                        top: 0;
                        left: 0;
                    }
                </style>

                <div class="textarea-container">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="textarea" type="text" rows="10" cols="80" maxlength="2000" autocomplete="on" spellcheck="on" required>
                        <?php echo $nonprofit->get_description(); ?>
                    </textarea>
                    <br><br>
                </div>

                <label for="address">Address</label>
                <input id="address" name="address" class="input" type="text" maxlength="50" value=" <?php echo $nonprofit->get_address(); ?> "/>
                <br><br>

                <label for="city">City</label>
                <input id="city" name="city" class="input" type="text" maxlength="50" value=" <?php echo $nonprofit->get_city(); ?>" required/>
                <br><br>
                
                <label for="state">State</label>
                <select id="state" class="input" name="state" required>
                    <option value="">Select State</option>
                    <option value="Alabama">Alabama</option>
                    <option value="Alaska">Alaska</option>
                    <option value="Arizona">Arizona</option>
                    <option value="Arkansas">Arkansas</option>
                    <option value="California">California</option>
                    <option value="Colorado">Colorado</option>
                    <option value="Connecticut">Connecticut</option>
                    <option value="Delaware">Delaware</option>
                    <option value="Florida">Florida</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Hawaii">Hawaii</option>
                    <option value="Idaho">Idaho</option>
                    <option value="Illinois">Illinois</option>
                    <option value="Indiana">Indiana</option>
                    <option value="Iowa">Iowa</option>
                    <option value="Kansas">Kansas</option>
                    <option value="Kentucky">Kentucky</option>
                    <option value="Louisiana">Louisiana</option>
                    <option value="Maine">Maine</option>
                    <option value="Maryland">Maryland</option>
                    <option value="Massachusetts">Massachusetts</option>
                    <option value="Michigan">Michigan</option>
                    <option value="Minnesota">Minnesota</option>
                    <option value="Mississippi">Mississippi</option>
                    <option value="Missouri">Missouri</option>
                    <option value="Montana">Montana</option>
                    <option value="Nebraska">Nebraska</option>
                    <option value="Nevada">Nevada</option>
                    <option value="New Hampshire">New Hampshire</option>
                    <option value="New Jersey">New Jersey</option>
                    <option value="New Mexico">New Mexico</option>
                    <option value="New York">New York</option>
                    <option value="North Carolina">North Carolina</option>
                    <option value="North Dakota">North Dakota</option>
                    <option value="Ohio">Ohio</option>
                    <option value="Oklahoma">Oklahoma</option>
                    <option value="Oregon">Oregon</option>
                    <option value="Pennsylvania">Pennsylvania</option>
                    <option value="Rhode Island">Rhode Island</option>
                    <option value="South Carolina">South Carolina</option>
                    <option value="South Dakota">South Dakota</option>
                    <option value="Tennessee">Tennessee</option>
                    <option value="Texas">Texas</option>
                    <option value="Utah">Utah</option>
                    <option value="Vermont">Vermont</option>
                    <option value="Virginia">Virginia</option>
                    <option value="Washington">Washington</option>
                    <option value="West Virginia">West Virginia</option>
                    <option value="Wisconsin">Wisconsin</option>
                    <option value="Wyoming">Wyoming</option>
                </select><br><br>

                <label for="email">Email</label>
                <input id="email" name="email" class="input" type="email" maxlength="50"0 value=" <?php echo $nonprofit->get_email(); ?>" required/>
                <br><br>
                
                <label for="email">Phone</label>
                <input id="phone" name="phone" class="input" type="tel" maxlength="50" value=" <?php echo $nonprofit->get_phone(); ?>" required/>
                <br><br>

                <label for="website">Website</label>
                <input id="website" name="website" class="input" type="text" maxlength="500" value=" <?php echo $nonprofit->get_website(); ?>" required/>
                <br><br>

                <label for="logo_url">Logo Url</label>
                <input id="logo_url" name="logo_url" class="input" type="text" maxlength="500" value=" <?php echo $nonprofit->get_logo_url(); ?> "/>
                <br><br>

                <input type="submit" value="Submit" class="home-button"/>
            </form>
        </div>
    </body>
</html>