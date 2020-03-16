<?php

$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "nas_food";
$charset = "UTF8";
$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);
mysqli_set_charset($conn, $charset);
