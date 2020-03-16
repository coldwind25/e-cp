
<?php include_once "../assets/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>FoodStuff | online Dairy products available Here</title>
    <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
  <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/body.css">
  <link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../css/product.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body style="background:#f5f7fa">
      <?php include"header.php"?>

 <div class="container-fluid">
      <div class="row mt-5">
    <div class="col-lg-2 ">
  <div class="list-group shadow" style="padding:0px">
            <a class="list-group-item list-group-item-action active">category</a>

            <?php
                $cat = mysqli_query($conn, "SELECT * FROM category");
                while ($c = mysqli_fetch_array($cat)):
      ?>
          <a href="index.php?cat=<?= $c['cat_title'];?>" class="list-group-item list-group-item-action"><?= $c['cat_title'];?></a>

          <?php endwhile;?>

          </div>
      </div>



    <div class="col-lg-10 col-12 ">
          <div class="row">

           <?php
              if(isset($_GET['p_id'])):
              $p_id = $_GET['p_id'];
              $calling = mysqli_query($conn, "select * from product where p_id='$p_id'");
              $row = mysqli_fetch_array($calling);
              ?>


            <!--below section is for item image-->
            <div class="col-lg-4">
              <img src="..\image\<?= $row['p_img'];?>" alt="" class="w-100 shadow"><br>
            </div>


              <!--below section is for item information table-->
            <div class="col-lg-8">
              <table class="table table-bordered shadow">
                <tr>
                  <th>Name</th>
                  <td><?= $row['p_name'];?></td>
                </tr>

                <tr>
                  <th>Price</th>
                  <td>$<?= $row['p_price'];?>/-</td>
                </tr>

                <tr>
                  <th>Qty</th>
                  <td><?= $row['each_qty'];?></td>
                </tr>

                <tr>
                  <th>Brand</th>
                  <td><?= $row['p_brand'];?></td>
                </tr>

                <tr>
                  <th>Category</th>
                  <td><?= $row['cat_title'];?></td>
                </tr>
              </table>
            </div>

            <?php endif;?>
          </div>

        </div>


          <!--below section is for item description in a card-->
       </div>
    <div class="row">
            <div class="col-12">
                <div class="card mt-5 border border-dark">
                   <div class="card-header bg-dark text-white">Description</div>
                    <div class="card-body lead">
                      <?= $row['p_desc'];?>
                    </div>
                </div>
            </div>
         </div>


 </div>
   <?php include"../assets/footer.php"?>
 </body>
</html>
