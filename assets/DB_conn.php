<?php
$serverName = "localhost";
$dbUsername = "root";
$dbPass = "";
$dbName = "archeryevent";

$conn = new mysqli($serverName, $dbUsername, $dbPass, $dbName) or die("Connection failed : " . $conn->connect_error);
?>