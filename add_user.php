<!DOCTYPE html>
<html lang="en" style="background-color:#1c1c1c">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styles.css" rel="stylesheet" type="text/css" media="all" />
    <title>Add A User</title>
</head>
<body>
<?php include('header.php'); ?>

<div class="add-user-box" style="margin: 0 auto;">
<form action="user_insert.php" method="POST">

    <h1>Add A User</h1>

    <label for="first_name">User First Name</label>
    <input id="first_name" class="input" type="text" maxlength="100"name="first_name" required/><br><br>

    <label for="last_name">User Last Name</label>
    <input id="last_name" class="input" type="text" maxlength="100"name="last_name" required/><br><br>

    
    <label for="email">Email</label>
    <input id="email" class="input" type="email" name="email" required/><br><br>

    <label for="last_name">Password</label>
    <input id="password" class="input" type="password" maxlength="100"name="password" required/><br><br>

<label for="permissions">Permissions</label>
<select id="permissions" class="input" name="permissions" required>
  <option value="">Select Permission Level</option>
  
  <option value="visitor">Visitor</option>
  <option value="admin">Admin</option>
  <option value="super">Super Admin</option>
  
</select><br><br>


    <input type="submit" value="Submit" class="general-button"/>
</form>
</div>


</body>
</html>