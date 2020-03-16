<?PHP
include_once "../assets/config.php";
session_start();
if(!isset($_SESSION['vendor'])):
  header("location: ../vendor_login.php");
endif;
header('Content-Type: application/json');
$type = $_GET['type'];
$email = $_GET['email'];
$date = $_GET['value'];
$searchType = '%Y';

$myArray = array();
if($type === 'year'){
    $searchType = '%Y';
}
if($type === 'month'){
    $searchType = '%m/%Y';
}
if($type === 'day'){
    $searchType = '%d/%m/%Y';

}
$sql = "SELECT COALESCE(SUM(new2.count_price),0) total FROM (SELECT * from ( SELECT p.Qty price,o.qty qty ,p.Qty*o.qty count_price,DATE_FORMAT(o.order_time,'$searchType') time FROM orders o INNER JOIN product p ON o.p_id=p.p_id WHERE p.v_email = '$email' AND o.order_status = 'success' GROUP BY o.o_id) AS new WHERE new.time = '$date')as new2";
// echo json_encode($sql); 

if ($result = $conn->query($sql)) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
}

$result->close();
$conn->close();
echo json_encode($myArray[0]);