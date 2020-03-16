
<?php
include_once("../assets/config.php");
session_start();

if(isset($_SESSION['admin'])):
  header("location: index.php");
endif;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>FoodStuff | online Dairy products available Here</title>
  <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
  <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

  <body  style="background:#525861;">
    <div class="container" style="margin-left:18%;margin-top:10%" >
      <div class="row">
        <div class="col-lg-8">
          <div class="card shadow " style="border:solid #63676e 1px;background:white;margin-left:18%;">
              <div class="card-body">
                ADMIN LOGIN HERE<hr>
                  <form class="" action="admin_login.php" method="post" autocomplete="off">
                      <div class="form-group">
                        <label for="">User name</label><br>
                        <input type="text" name="A_username" placeholder="username" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="">Password</label><br>
                        <input type="password" name="A_password" placeholder="password" class="form-control">
                      </div>

                      <div class="form-group">
                        <input type="submit" name="ok" value="Log in"  class="btn btn-primary btn-block" class="form-control">
                      </div>
                  </form>
              </div>
          </div>

        </div>

      </div>
    </div>
  </body>
</html>
<?php
  if(isset($_POST['ok'])){
    $username=$_POST['A_username'];
    $password=$_POST['A_password'];
    $query=mysqli_query($conn, "SELECT * FROM admin WHERE A_username='$username' AND A_password='$password' ");
    $count=mysqli_num_rows($query);
    if($count>0){
        $_SESSION['admin']=$username;
        echo"<script>window.open('index.php','_self')</script>";
  	}
  	else{
  		echo "<script>alert('your user name or password is not matched')</script>";
  	}
    }

?>
