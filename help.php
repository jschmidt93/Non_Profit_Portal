<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Organization</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styles.css" rel="stylesheet" type="text/css" media="all" />
    <script src="https://kit.fontawesome.com/81c2c05f29.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <style>
        .wrapper {
            width: 50%;
            margin: 0 auto;
        }
        div{
            padding-left: 10%;
            padding-right: 10%;
        }
        h2{
            color: white;
        }
    </style>
</head>

<body style="background-color: #1c1c1c">
<?php

    include "header.php";

    ?>
<div>
    <h2>How to Navigate this Application</h2>

    <h1>If you are a visitor to this page</h1>

    <p>Look through the grid on the homepage and click on an NPO for more information OR use the NPO List from the navigation bar for a searchable list of NPOs</p>

    <h1>If you are an NPO representative</h1>

    <p>Click the "login" button on the navigation bar to create an account or sign in if you already have one. 
        New users can create an account from the login page with the "Create Account" button beneath the password field.

        Once logged in, navigate to the NPO List to find the "Add Organization" button, or search for your NPO for options to modify or delete your NPO.</p>
    </div>
</body>

</html>