<?php
include_once"../assets/config.php";
session_start();
if(isset($_GET['del'])){

    $del = $_GET['del'];
    $disable=mysqli_query($conn, "UPDATE employee
      set
      emp_status='Disabled' where emp_id='$del'");
      header("location: employee.php");
}
