<?php

//echo "<pre>", var_dump($_REQUEST), "</pre>";

if (!empty($_POST["email"]) and ! empty($_POST["value"]) and ! empty($_POST["type"])) {
    require_once '../assets/config.php';

    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $value = mysqli_real_escape_string($conn, $_POST["value"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);

    $value = str_replace("/", "-", $value);
//    echo "<pre>", var_dump($value), "</pre>";

    $sql = "SELECT SUM(product.p_price) AS sale_total "
            . "FROM orders "
            . "JOIN product ON orders.p_id = product.p_id "
            . "WHERE orders.v_email = '" . $email . "' ";

    switch ($type) {
        case "year":
//            echo "case year";
            $sql .= "AND YEAR(orders.order_time) = '" . $value . "'";
            break;
        case "month":
//            echo "case month";
            $value = explode("-", $value);
            $month = $value[0];
            $year = $value[1];
            $sql .= "AND MONTH(orders.order_time) = '" . $month . "' AND YEAR(orders.order_time) = '" . $year . "'";
            break;
        case "day":
//            echo "case day";
            $value = date("Y-m-d", strtotime($value));
            $sql .= "AND DATE(orders.order_time) = DATE('" . $value . "')";
            break;
    }

//    echo "<pre>", var_dump($sql), "</pre>";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
    echo json_encode($result);
}
?>