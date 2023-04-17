<?php
$servername = "localhost";
$dbusernamer = "root";
$dbpass = "";
$dbase = "archeryevent";

$conn = new mysqli($servername, $dbusernamer, $dbpass, $dbase) or die("Connection failed : " . $conn->connect_error);
?>