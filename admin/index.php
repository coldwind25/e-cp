
<?php include"../assets/config.php";
session_start();
if(!isset($_SESSION['admin'])):
  header("location: admin_login.php");
endif;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FoodStuff | online Dairy products available Here</title>
    <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
    <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
  </head>

  <body>
  <?php include "include/header.php"; ?>
  <div class="container-fluid mt-4">
    <div class="row">
      <div class="col-lg-3">
      <?php include "include/side.php";?>
      </div>

      <div class="col-lg-9">
        <div class="row text-white">
          <div class="col-lg-4 mb-3">
            <div class="card bg-danger">
              <div class="card-body">
                <h4>200+</h4>
                <h6>Total Employee</h6>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-3">
            <div class="card bg-warning">
              <div class="card-body">
                <h4>1000+</h4>
                <h6>Products</h6>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-3">
            <div class="card bg-info">
              <div class="card-body">
                <h4>500+</h4>
                <h6>Vendors</h6>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-3">
            <div class="card bg-success">
              <div class="card-body">
                <h4>2000+</h4>
                <h6>Users</h6>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-3">
            <div class="card bg-primary">
              <div class="card-body">
                <h4>10+</h4>
                <h6>Areas</h6>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>

  </body>
</html>
