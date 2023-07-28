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
    <title>Modify NPO User</title>
</head>

<body>
<?php
require_once "connection.php";
include "header.php";

$user_id = "";
$user_fname = "";
$user_lname = "";
$email = "";
$password = "";
$permission = "";


if (isset($_GET["id"])) {
    $user_id = $_GET["id"];
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    // establish connection with database
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // set charset to utf-8
    $conn->set_charset("utf8");

    // create sql
    $sql = "SELECT * FROM users WHERE user_id={$user_id}";
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $user_fname = $row["first_name"];
        $user_lname = $row["last_name"];
        $email = $row["email"];
        $password = $row["password"];
        $permission = $row["permissions"];
    }
    //$orgId = $id; // Assign the organization ID separately
}
?>
<div class="wrapper">
<div class="add-user-box">
    <form action="modify_query_user.php?id=<?php echo $user_id; ?>" method="POST" style="margin: 0 auto;">
        <h1>Modify NPO User</h1>

        <label for="first_name">User First Name</label>
        <input id="first_name" class="input" type="text" maxlength="100" name="first_name" required value="<?php echo $user_fname; ?>" /><br><br>
        
    <label for="last_name">User Last Name</label>
    <input id="last_name" class="input" type="text" maxlength="100" name="last_name" required value="<?php echo $user_lname; ?>" /><br><br>
        
    
    <label for="email">Email</label>
    <input id="email" class="input" type="email" name="email" required value="<?php echo $email; ?>" /><br><br>

    <label for="password">Password</label>
    <input id="password" class="input" type="password" name="password" required value="<?php echo $password; ?>" /><br><br>
   
    <label for="">Permission</label>
        <select id="permissions" class="input" name="permissions" required>
            <option value="">Select Type</option>
            <option value="visitor" <?php if ($permission == "visitor") echo "selected"; ?>>Visitor</option>
            <option value="admin" <?php if ($permission == "admin") echo "selected"; ?>>Admin</option>
            <option value="super" <?php if ($permission == "super") echo "selected"; ?>>Super Admin</option>

        </select><br><br>


<input type="submit" value="Update" class="general-button" />
</form>
    </div>
</div>
</body>

</html>