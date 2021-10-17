<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "martinsbeats";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection to database failed: ".mysqli_connect_error());
}