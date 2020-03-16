<?php

//if (!empty($_POST["action"])) {
require_once 'db_config.php';

//เปลี่ยนสถานะออเดอร์
$o_id = 2;
$os_status = "successed";
$user = 2;
$sql = "INSERT INTO orders_status (os_o_id, os_status, os_user) "
        . "VALUES ( '" . $o_id . "', '" . $os_status . "', '" . $user . "')";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn) . "<br />" . $sql . "<br />");
?>