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
    <title>Modify Non-Profit Organization</title>
</head>

<body>
<?php

if (isset($_GET["id"])) {
    require_once "connection.php";
    include "header.php";

    $id = $_GET["id"];

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    // establish connection with database
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // set charset to utf-8
    $conn->set_charset("utf8");

    // create sql
    $sql = "SELECT * FROM organization WHERE id={$id}";
    $result = $conn->query($sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $name = $row["name"];
        $type = $row["type"];
        $description = $row["description"];
        $address = $row["address"];
        $city = $row["city"];
        $state = $row["state"];
        $email = $row["email"];
        $phone = $row["phone"];
        $website = $row["website"];
        $logo_url = $row["logo_url"];
    }
    $orgId = $id; // Assign the organization ID separately
}
?>

<div class="add-npo-box">
    <form action="modify-query.php?id=<?php echo $orgId; ?>" method="POST" style="margin: 0 auto;">
        <h1>Modify Non-Profit Organization</h1>

        <label for="name">Non-Profit Name</label>
        <input id="name" class="input" type="text" maxlength="100" name="name" required value="<?php echo $name; ?>" /><br><br>

    <label for="type">Type</label>
    <select id="type" class="input" name="type" required>
        <option value="">Select Type</option>
        <option value="Private" <?php if ($type == "Private") echo "selected"; ?>>Private</option>
        <option value="Specialized" <?php if ($type == "Specialized") echo "selected"; ?>>Specialized</option>
        <option value="Educational" <?php if ($type == "Educational") echo "selected"; ?>>Educational</option>
        <option value="Housing" <?php if ($type == "Housing") echo "selected"; ?>>Housing</option>
        <option value="Charity" <?php if ($type == "Charity") echo "selected"; ?>>Charity</option>
    </select><br><br>

    <label for="description">Description</label>
    <textarea id="description" class="input" name="description" required><?php echo $description; ?></textarea><br><br>

    <label for="address">Address</label>
    <input id="address" class="input" type="text" maxlength="100" name="address" required value="<?php echo $address; ?>" /><br><br>

    <label for="city">City</label>
    <input id="city" class="input" type="text" maxlength="100" name="city" required value="<?php echo $city; ?>" /><br><br>

<label for="state">State</label>
<select id="state" class="input" name="state" required>
<option value="">Select State</option>
        <option value="Alabama" <?php if ($state == "Alabama") echo "selected"; ?>>Alabama</option>
        <option value="Alaska" <?php if ($state == "Alaska") echo "selected"; ?>>Alaska</option>
        <option value="Arizona" <?php if ($state == "Arizona") echo "selected"; ?>>Arizona</option>
        <option value="Arkansas" <?php if ($state == "Arkansas") echo "selected"; ?>>Arkansas</option>
        <option value="California" <?php if ($state == "California") echo "selected"; ?>>California</option>
        <option value="Colorado" <?php if ($state == "Colorado") echo "selected"; ?>>Colorado</option>
        <option value="Connecticut" <?php if ($state == "Connecticut") echo "selected"; ?>>Connecticut</option>
        <option value="Delaware" <?php if ($state == "Delaware") echo "selected"; ?>>Delaware</option>
        <option value="Florida" <?php if ($state == "Florida") echo "selected"; ?>>Florida</option>
        <option value="Georgia" <?php if ($state == "Georgia") echo "selected"; ?>>Georgia</option>
        <option value="Hawaii" <?php if ($state == "Hawaii") echo "selected"; ?>>Hawaii</option>
        <option value="Idaho" <?php if ($state == "Idaho") echo "selected"; ?>>Idaho</option>
        <option value="Illinois" <?php if ($state == "Illinois") echo "selected"; ?>>Illinois</option>
        <option value="Indiana" <?php if ($state == "Indiana") echo "selected"; ?>>Indiana</option>
        <option value="Iowa" <?php if ($state == "Iowa") echo "selected"; ?>>Iowa</option>
        <option value="Kansas" <?php if ($state == "Kansas") echo "selected"; ?>>Kansas</option>
        <option value="Kentucky" <?php if ($state == "Kentucky") echo "selected"; ?>>Kentucky</option>
        <option value="Louisiana" <?php if ($state == "Louisiana") echo "selected"; ?>>Louisiana</option>
        <option value="Maine" <?php if ($state == "Maine") echo "selected"; ?>>Maine</option>
        <option value="Maryland" <?php if ($state == "Maryland") echo "selected"; ?>>Maryland</option>
        <option value="Massachusetts" <?php if ($state == "Massachusetts") echo "selected"; ?>>Massachusetts</option>
        <option value="Michigan" <?php if ($state == "Michigan") echo "selected"; ?>>Michigan</option>
        <option value="Minnesota" <?php if ($state == "Minnesota") echo "selected"; ?>>Minnesota</option>
        <option value="Mississippi" <?php if ($state == "Mississippi") echo "selected"; ?>>Mississippi</option>
        <option value="Missouri" <?php if ($state == "Missouri") echo "selected"; ?>>Missouri</option>
        <option value="Montana" <?php if ($state == "Montana") echo "selected"; ?>>Montana</option>
        <option value="Nebraska" <?php if ($state == "Nebraska") echo "selected"; ?>>Nebraska</option>
        <option value="Nevada" <?php if ($state == "Nevada") echo "selected"; ?>>Nevada</option>
        <option value="New Hampshire" <?php if ($state == "New Hampshire") echo "selected"; ?>>New Hampshire</option>
        <option value="New Jersey" <?php if ($state == "New Jersey") echo "selected"; ?>>New Jersey</option>
        <option value="New Mexico" <?php if ($state == "New Mexico") echo "selected"; ?>>New Mexico</option>
        <option value="New York" <?php if ($state == "New York") echo "selected"; ?>>New York</option>
        <option value="North Carolina" <?php if ($state == "North Carolina") echo "selected"; ?>>North Carolina</option>
        <option value="North Dakota" <?php if ($state == "North Dakota") echo "selected"; ?>>North Dakota</option>
        <option value="Ohio" <?php if ($state == "Ohio") echo "selected"; ?>>Ohio</option>
        <option value="Oklahoma" <?php if ($state == "Oklahoma") echo "selected"; ?>>Oklahoma</option>
        <option value="Oregon" <?php if ($state == "Oregon") echo "selected"; ?>>Oregon</option>
        <option value="Pennsylvania" <?php if ($state == "Pennsylvania") echo "selected"; ?>>Pennsylvania</option>
        <option value="Rhode Island" <?php if ($state == "Rhode Island") echo "selected"; ?>>Rhode Island</option>
        <option value="South Carolina" <?php if ($state == "South Carolina") echo "selected"; ?>>South Carolina</option>
        <option value="South Dakota" <?php if ($state == "South Dakota") echo "selected"; ?>>South Dakota</option>
        <option value="Tennessee" <?php if ($state == "Tennessee") echo "selected"; ?>>Tennessee</option>
        <option value="Texas" <?php if ($state == "Texas") echo "selected"; ?>>Texas</option>
        <option value="Utah" <?php if ($state == "Utah") echo "selected"; ?>>Utah</option>
        <option value="Vermont" <?php if ($state == "Vermont") echo "selected"; ?>>Vermont</option>
        <option value="Virginia" <?php if ($state == "Virginia") echo "selected"; ?>>Virginia</option>
        <option value="Washington" <?php if ($state == "Washington") echo "selected"; ?>>Washington</option>
        <option value="West Virginia" <?php if ($state == "West Virginia") echo "selected"; ?>>West Virginia</option>
        <option value="Wisconsin" <?php if ($state == "Wisconsin") echo "selected"; ?>>Wisconsin</option>
        <option value="Wyoming" <?php if ($state == "Wyoming") echo "selected"; ?>>Wyoming</option>
</select><br><br>

<label for="email">Email</label>
    <input id="email" class="input" type="email" name="email" required value="<?php echo $email; ?>" /><br><br>

    <label for="phone">Phone</label>
    <input id="phone" class="input" type="tel" name="phone" required value="<?php echo $phone; ?>" /><br><br>

    <label for="website">Website</label>
    <input id="website" class="input" type="url" name="website" required value="<?php echo $website; ?>" /><br><br>

    <label for="logo_url">Logo URL</label>
    <input id="logo_url" class="input" type="url" name="logo_url" required value="<?php echo $logo_url; ?>" /><br><br>

    <input type="submit" value="Update" class="general-button" />
</form>
    </div>
</body>

</html>