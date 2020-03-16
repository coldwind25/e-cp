<?php
include_once"../assets/config.php";
session_start();
if(isset($_GET['del'])){

    $del = $_GET['del'];
    //$delete = mysqli_query("DELETE FROM vendor where v_id='$del'");

  $disable=mysqli_query($conn, "UPDATE vendor
    set
  v_status='Disabled' where v_id='$del'");
    header("location: vendors.php");
}
