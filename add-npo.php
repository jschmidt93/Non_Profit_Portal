<!DOCTYPE html>
<html lang="en" style="background-color:#1c1c1c">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styles.css" rel="stylesheet" type="text/css" media="all" />
    <title>Add An Organization</title>
</head>
<body>
<?php include('header.php'); ?>

<div class="add-npo-box" style="margin: 0 auto;">
<form onsubmit="handleFormSubmission();" action="npo-insert.php" method="POST">

    <h1>Add An Organization</h1>

    <label for="name">Non-Profit Name</label>
    <input id="name" class="input" type="text" maxlength="100"name="name" required/><br><br>

    <label for="type">Type</label>
<select id="type" class="input" name="type" required>
  <option value="">Select Type</option>
  <option value="Private">Private</option>
  <option value="Specialized">Specialized</option>
  <option value="Educational">Educational</option>
  <option value="Housing">Housing</option>
  <option value="Charity">Charity</option>
</select><br><br>

<label for="description">Description</label>
<textarea id="description" class="input" name="description" required></textarea><br><br>

<label for="address">Address</label>
<input id="address" class="input" type="text" maxlength="100" name="address" required/><br><br>

<label for="city">City</label>
<input id="city" class="input" type="text" maxlength="100" name="city" required/><br><br>
  
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
<input id="email" class="input" type="email" name="email" required/><br><br>

<label for="phone">Phone</label>
<input id="phone" class="input" type="tel" name="phone" required/><br><br>

<label for="website">Website</label>
<input id="website" class="input" type="url" name="website" required/><br><br>

<label for="logo_url">Logo URL</label>
<input id="logo_url" class="input" type="url" name="logo_url" required/><br><br>


    <input onclick="return confirm('Are You Sure You Want To Add This Non-Profit Organization?');" type="submit" value="Submit" class="general-button"/>
</form>
</div>

<script>
    // JavaScript function to handle the form submission
    function handleFormSubmission() {
      // Show the confirmation message
      alert('Non-Profit Organization Added Successfully!');
    }
  </script>

</body>
</html>