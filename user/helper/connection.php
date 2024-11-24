<?php
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "dbsistempakar1";

$connection = mysqli_connect($dbhost, $dbusername, $dbpassword,  $dbname);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}