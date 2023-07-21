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
require_once "connection.php";
include "header.php";

$npo_id = "";
$npo_name = "";
$npo_type = "";
$npo_description = "";
$npo_address = "";
$npo_city = "";
$npo_state = "";
$npo_email = "";
$npo_phone = "";
$npo_website = "";
$npo_logo_url = "";

if (isset($_GET["id"])) {
    $npo_id = $_GET["id"];
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    // establish connection with database
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // set charset to utf-8
    $conn->set_charset("utf8");

    // create sql
    $sql = "SELECT * FROM organization WHERE id={$npo_id}";
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $npo_name = $row["name"];
        $npo_type = $row["type"];
        $npo_description = $row["description"];
        $npo_address = $row["address"];
        $npo_city = $row["city"];
        $npo_state = $row["state"];
        $npo_email = $row["email"];
        $npo_phone = $row["phone"];
        $npo_website = $row["website"];
        $npo_logo_url = $row["logo_url"];
    }
    //$orgId = $id; // Assign the organization ID separately
}
?>
<div class="wrapper">
<div class="add-npo-box">
    <form onsubmit="handleFormSubmission();" action="modify-query.php?id=<?php echo $npo_id; ?>" method="POST" style="margin: 0 auto;">
        <h1>Modify Non-Profit Organization</h1>

        <label for="name">Non-Profit Name</label>
        <input id="name" class="input" type="text" maxlength="100" name="name" required value="<?php echo $npo_name; ?>" /><br><br>

    <label for="type">Type</label>
    <select id="type" class="input" name="type" required>
        <option value="">Select Type</option>
        <option value="Private" <?php if ($npo_type == "Private") echo "selected"; ?>>Private</option>
        <option value="Specialized" <?php if ($npo_type == "Specialized") echo "selected"; ?>>Specialized</option>
        <option value="Educational" <?php if ($npo_type == "Educational") echo "selected"; ?>>Educational</option>
        <option value="Housing" <?php if ($npo_type == "Housing") echo "selected"; ?>>Housing</option>
        <option value="Charity" <?php if ($npo_type == "Charity") echo "selected"; ?>>Charity</option>
    </select><br><br>

    <label for="description">Description</label>
    <textarea id="description" class="input" name="description" required><?php echo $npo_description; ?></textarea><br><br>

    <label for="address">Address</label>
    <input id="address" class="input" type="text" maxlength="100" name="address" required value="<?php echo $npo_address; ?>" /><br><br>

    <label for="city">City</label>
    <input id="city" class="input" type="text" maxlength="100" name="city" required value="<?php echo $npo_city; ?>" /><br><br>

<label for="state">State</label>
<select id="state" class="input" name="state" required>
<option value="">Select State</option>
        <option value="Alabama" <?php if ($npo_state == "Alabama") echo "selected"; ?>>Alabama</option>
        <option value="Alaska" <?php if ($npo_state == "Alaska") echo "selected"; ?>>Alaska</option>
        <option value="Arizona" <?php if ($npo_state == "Arizona") echo "selected"; ?>>Arizona</option>
        <option value="Arkansas" <?php if ($npo_state == "Arkansas") echo "selected"; ?>>Arkansas</option>
        <option value="California" <?php if ($npo_state == "California") echo "selected"; ?>>California</option>
        <option value="Colorado" <?php if ($npo_state == "Colorado") echo "selected"; ?>>Colorado</option>
        <option value="Connecticut" <?php if ($npo_state == "Connecticut") echo "selected"; ?>>Connecticut</option>
        <option value="Delaware" <?php if ($npo_state == "Delaware") echo "selected"; ?>>Delaware</option>
        <option value="Florida" <?php if ($npo_state == "Florida") echo "selected"; ?>>Florida</option>
        <option value="Georgia" <?php if ($npo_state == "Georgia") echo "selected"; ?>>Georgia</option>
        <option value="Hawaii" <?php if ($npo_state == "Hawaii") echo "selected"; ?>>Hawaii</option>
        <option value="Idaho" <?php if ($npo_state == "Idaho") echo "selected"; ?>>Idaho</option>
        <option value="Illinois" <?php if ($npo_state == "Illinois") echo "selected"; ?>>Illinois</option>
        <option value="Indiana" <?php if ($npo_state == "Indiana") echo "selected"; ?>>Indiana</option>
        <option value="Iowa" <?php if ($npo_state == "Iowa") echo "selected"; ?>>Iowa</option>
        <option value="Kansas" <?php if ($npo_state == "Kansas") echo "selected"; ?>>Kansas</option>
        <option value="Kentucky" <?php if ($npo_state == "Kentucky") echo "selected"; ?>>Kentucky</option>
        <option value="Louisiana" <?php if ($npo_state == "Louisiana") echo "selected"; ?>>Louisiana</option>
        <option value="Maine" <?php if ($npo_state == "Maine") echo "selected"; ?>>Maine</option>
        <option value="Maryland" <?php if ($npo_state == "Maryland") echo "selected"; ?>>Maryland</option>
        <option value="Massachusetts" <?php if ($npo_state == "Massachusetts") echo "selected"; ?>>Massachusetts</option>
        <option value="Michigan" <?php if ($npo_state == "Michigan") echo "selected"; ?>>Michigan</option>
        <option value="Minnesota" <?php if ($npo_state == "Minnesota") echo "selected"; ?>>Minnesota</option>
        <option value="Mississippi" <?php if ($npo_state == "Mississippi") echo "selected"; ?>>Mississippi</option>
        <option value="Missouri" <?php if ($npo_state == "Missouri") echo "selected"; ?>>Missouri</option>
        <option value="Montana" <?php if ($npo_state == "Montana") echo "selected"; ?>>Montana</option>
        <option value="Nebraska" <?php if ($npo_state == "Nebraska") echo "selected"; ?>>Nebraska</option>
        <option value="Nevada" <?php if ($npo_state == "Nevada") echo "selected"; ?>>Nevada</option>
        <option value="New Hampshire" <?php if ($npo_state == "New Hampshire") echo "selected"; ?>>New Hampshire</option>
        <option value="New Jersey" <?php if ($npo_state == "New Jersey") echo "selected"; ?>>New Jersey</option>
        <option value="New Mexico" <?php if ($npo_state == "New Mexico") echo "selected"; ?>>New Mexico</option>
        <option value="New York" <?php if ($npo_state == "New York") echo "selected"; ?>>New York</option>
        <option value="North Carolina" <?php if ($npo_state == "North Carolina") echo "selected"; ?>>North Carolina</option>
        <option value="North Dakota" <?php if ($npo_state == "North Dakota") echo "selected"; ?>>North Dakota</option>
        <option value="Ohio" <?php if ($npo_state == "Ohio") echo "selected"; ?>>Ohio</option>
        <option value="Oklahoma" <?php if ($npo_state == "Oklahoma") echo "selected"; ?>>Oklahoma</option>
        <option value="Oregon" <?php if ($npo_state == "Oregon") echo "selected"; ?>>Oregon</option>
        <option value="Pennsylvania" <?php if ($npo_state == "Pennsylvania") echo "selected"; ?>>Pennsylvania</option>
        <option value="Rhode Island" <?php if ($npo_state == "Rhode Island") echo "selected"; ?>>Rhode Island</option>
        <option value="South Carolina" <?php if ($npo_state == "South Carolina") echo "selected"; ?>>South Carolina</option>
        <option value="South Dakota" <?php if ($npo_state == "South Dakota") echo "selected"; ?>>South Dakota</option>
        <option value="Tennessee" <?php if ($npo_state == "Tennessee") echo "selected"; ?>>Tennessee</option>
        <option value="Texas" <?php if ($npo_state == "Texas") echo "selected"; ?>>Texas</option>
        <option value="Utah" <?php if ($npo_state == "Utah") echo "selected"; ?>>Utah</option>
        <option value="Vermont" <?php if ($npo_state == "Vermont") echo "selected"; ?>>Vermont</option>
        <option value="Virginia" <?php if ($npo_state == "Virginia") echo "selected"; ?>>Virginia</option>
        <option value="Washington" <?php if ($npo_state == "Washington") echo "selected"; ?>>Washington</option>
        <option value="West Virginia" <?php if ($npo_state == "West Virginia") echo "selected"; ?>>West Virginia</option>
        <option value="Wisconsin" <?php if ($npo_state == "Wisconsin") echo "selected"; ?>>Wisconsin</option>
        <option value="Wyoming" <?php if ($npo_state == "Wyoming") echo "selected"; ?>>Wyoming</option>
</select><br><br>

<label for="email">Email</label>
    <input id="email" class="input" type="email" name="email" required value="<?php echo $npo_email; ?>" /><br><br>

    <label for="phone">Phone</label>
    <input id="phone" class="input" type="tel" name="phone" required value="<?php echo $npo_phone; ?>" /><br><br>

    <label for="website">Website</label>
    <input id="website" class="input" type="url" name="website" required value="<?php echo $npo_website; ?>" /><br><br>

    <label for="logo_url">Logo URL</label>
    <input id="logo_url" class="input" type="url" name="logo_url" required value="<?php echo $npo_logo_url; ?>" /><br><br>

    <input type="submit" value="Update" class="general-button" onclick="return confirm('Are you sure you want to make these changes?');">
</form>
    </div>
</div>
<script>
    // JavaScript function to handle the form submission
    function handleFormSubmission() {
      // Show the confirmation message
      alert('Entry updated successfully!');
    }
  </script>
</body>

</html>