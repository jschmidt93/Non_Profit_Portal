<?php



include("connection.php");
include("functions.php");
include("header.php");

$createAccountStatus = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $user_name = $_POST['email'];
    $password = $_POST['password'];
    $displayname = $_POST['first_name'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        $createAccountStatus = "Account Created Successfully";

        $query = "insert into users (email, password, first_name, permissions) values ('$user_name', 'MD5($password)', '$displayname')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    } else {
        $createAccountStatus = "Account Information Not Accepted.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<link href="./styles.css" rel="stylesheet" type="text/css" media="all" />
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
</head>

<body>

    <style type="text/css">
        #bg {
            background-image: url("/images/loginPageBackground.jpg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        body,
        html {
            height: 100vh;
            margin: auto;
            overflow: hidden;
        }

        #text {

            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }

        #button {

            padding: 10px;
            width: 100px;
            font-weight: 600;
            color: black;
            background-color: #ff0000;
            border: none;
            border-radius: 20px;

        }

        #box {

            background-color: #353839;
            position: fixed;
            left: 40%;
            right: 50%;
            top: 50%;
            transform: translateY(-50%);
            width: 300px;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 8px;

        }

        .status_message {
            font-weight: 600;
            color: #FC4A1A;
        }
    </style>

    <div id="bg">
        <div id="box">

            <img src="/images/non-profit-portal-logo.png" width=100%>

            <form method="POST">
                <div style="font-size: 20px; margin: 10px; color:#FFFFFF;">Create Account</div>
                <input id="text" type="text" name="email" placeholder="Email"><br><br>
                <input id="text" type="password" name="password" placeholder="Password"><br><br>
                <input id="text" type="text" name="first_name" placeholder="First Name"><br><br>

                <input id="button" type="submit" value="SIGN UP"><br><br>

                <a href="login.php" style="color:#FFFFFF">Login</a><br><br>

                <span class="status_message"><?php echo $createAccountStatus;
                                                ?></span>

            </form>
        </div>
    </div>

</body>

</html>