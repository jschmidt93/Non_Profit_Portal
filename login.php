<?php



include("connection.php");
include("functions.php");
include("header.php");

$loginAttemptStatus = "";
$isAdmin = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        //read from database
        $query = "SELECT * FROM users where email = '$user_name' limit 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] == $password) {
                    $loginAttemptStatus = "Login Successful";
                    echo "Login successful";
                    $isAdmin = true;
                    $_SESSION['user_id'] = $user_data['user_id'];
                    $_SESSION['permissions'] = $user_data['permissions'];
                    $_SESSION['first_name'] = $user_data['first_name']; 

                    header("Location: index.php");
                    die;
                }
            }
        }

        $loginAttemptStatus = "Invalid Credentials";
    } else {
        echo "Account Information Not Accepted.";
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
    <title>Login</title>
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
            color: black;
            font-weight: 600;
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
                <div style="font-size: 20px; margin: 10px; color:#FFFFFF">Login</div>
                <input id="text" type="text" name="email" placeholder="Email"><br><br>
                <input id="text" type="password" name="password" placeholder="Password"><br><br>

                <input id="button" type="submit" value="LOGIN"><br><br>

                <a href="create_account.php" style="color:#FFFFFF">Create Account</a><br><br>

                <span class="status_message"><?php echo $loginAttemptStatus;
                                                ?></span>
            </form>
        </div>
    </div>
</body>

</html>