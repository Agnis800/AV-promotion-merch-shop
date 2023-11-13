<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "music_promotion";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>