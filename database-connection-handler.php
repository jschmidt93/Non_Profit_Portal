<?php
    define ('DB_HOST', 'localhost');
    define ('DB_USER', 'root');
    define ('DB_PASS', '');
    define ('DB_NAME', 'npo_db');

    function db_connect () {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($mysqli->connect_error) {
            echo 'connection failed';
            die("Connection failed: " . $mysqli->connect_error);
        }
        'echo connected';
        $mysqli->set_charset("utf8");
        return $mysqli;
    } // close db_connect

    function db_disconnect ($connection) {
        if (isset($connection)) {
            mysqli_close($connection);
        }
    } // close db_disconnect
?>