<?php

//if (!empty($_POST["action"])) {
require_once 'db_config.php';

//$product = mysqli_real_escape_string($_POST["p_id"]);
//$qty = mysqli_real_escape_string($_POST["p_qty"]);
//$user = mysqli_real_escape_string($_POST["u_id"]);

$user = "2";

//เพิ่มออร์เดอร์
$sql = "INSERT INTO orders (o_user, o_status) "
        . "VALUES ('" . $user . "', '1')";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn) . "<br />" . $sql . "<br />");
$orders_last_id = $conn->insert_id;

//เพิ่มรายละเอียดออเดอร์
$product = "โมจิ";
$qty = 10;
$sql = "INSERT INTO orders_detail (od_product, od_qty, od_orders_id) "
        . "VALUES ('" . $product . "', '" . $qty . "', '" . $orders_last_id . "')";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn) . "<br />" . $sql . "<br />");

$product = "ซาลาเปา";
$qty = 40;
$sql = "INSERT INTO orders_detail (od_product, od_qty, od_orders_id) "
        . "VALUES ('" . $product . "', '" . $qty . "', '" . $orders_last_id . "')";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn) . "<br />" . $sql . "<br />");

//เพิ่มสถานะออเดอร์
$sql = "INSERT INTO orders_status (os_o_id, os_status, os_user) "
        . "VALUES ( '" . $orders_last_id . "', 'wating', '" . $user . "')";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn) . "<br />" . $sql . "<br />");
//}
?>