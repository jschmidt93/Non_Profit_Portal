<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "npo_db";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){

    die("Failed Connection");
}