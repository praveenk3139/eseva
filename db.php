<?php

$host = "yamanote.proxy.rlwy.net";
$user = "root";
$password = "OBWFSdSFNpVLOPuwsmeOygdbEGuOMRNY";
$database = "railway";
$port = 17401;

$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

