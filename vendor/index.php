<?php include_once "../assets/config.php";
session_start();
if(!isset($_SESSION['vendor'])):
  header("location: ../vendor_login.php");
endif;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>FoodStuff | online Dairy products available Here</title>
  <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
  <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/body.css">
  <link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../css/product.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
  <body class="bg-light">

    <!--this line includes header file-->
    <?php include"header.php"?>

        <div class="container-fluid">
          <div class="row">
              <div class="col-4 col-lg-2 col-md-2  mt-4">

                <!-- this div is used for create a list group-->
                <div class="list-group shadow" style="padding:0px">
                      <a class="list-group-item list-group-item-action active text-white">category</a>

                      <a  href="index.php" class="list-group-item list-group-item-action">All Products</a>

                      <!--this php code will dynamically add the category from the DB-->
                      <?php
                          $cat = mysqli_query($conn, "SELECT * FROM category");//stores all categories in $cat variable
                          while ($c = mysqli_fetch_array($cat)): //fetch each row in $c variable
                      ?>

                      <!--this will show a dynamic list group in category section...this category is extracted from category table's cat_title-->
                      <a href="index.php?cat=<?= $c['cat_title'];?>" class="list-group-item list-group-item-action"><?= $c['cat_title'];?></a>

                      <?php endwhile;?>
                </div>
            </div>


            <!--this section is for product container-->
            <div class="col-8 col-lg-10 col-md-10">
              <div class="row">
                <div class="col-12" style="text-align:center;">
                  <b> <h3 class="btn btn-warning"  id="inf">My Product</h3><hr></b>
                </div>

                <!--the below section is used for adding the prodects dynamically from DB-->
                <?php

                /*if the user will search by name of product then this if will be executed and filterred data will be shown*/
                    $_SESSION['vendor']=$log;
                  if(isset($_GET['v_find'])){

                      $search = $_GET['v_search'];
                      $calling = mysqli_query($conn, "SELECT * FROM product WHERE p_name LIKE '%$search%' AND v_email='$log'");
                    }

                /*if the user will search category wise then this elseif will be executed and filterred data will be shown*/
                  elseif(isset($_GET['cat'])){
                      $cat = $_GET['cat'];
                      $calling = mysqli_query($conn, "SELECT * FROM product WHERE cat_title='$cat' AND v_email='$log'");
                    }

              /* if the user will directly go to the products page then this else will be executed without filteration*/
                  else{
                      $calling = mysqli_query($conn, "SELECT * FROM product WHERE v_email='$log'");  /*collects all data from product table*/
                    }
                      $count = mysqli_num_rows($calling);  /*$count will store the no. of row in product*/
                      if ($count > 0):
                      while($row = mysqli_fetch_array($calling)):  /*while loop starts and fetch one-by-one row in $row variable*/
                ?>

                <div class="col-9 col-lg-3 col-md-4 col-sm-6 ">
                    <div class="card shadow m-4">

                        <!--this will dynamically add product details in product page-->
                        <a href="item.php?p_id=<?= $row['p_id'];?>"><img src="..\image\<?= $row['p_img'];?>" alt="" height="170px" class="w-100"></a><hr>

                        <div class="card-body">
                          <span class="desc_p" id="titlep<?= $row['p_id'];?>"><?= $row['p_name'];?></span><br>

                          <span class="price"> $<?= $row['p_price'];?>/-</span>
                        </div>
                    </div>
                </div>

                <?php endwhile;

              else:  /*if no product is available related to search the this else will be executed*/
                ?>
                  <div class='card'>
                      <div class='card-body'>
                        <h1> You have not inserted the product of this category</h1>
                      </div>
                  </div>
                <?php endif;?>
          </div>
        </div>
      </div>
    </div>

   <?php include"../assets/footer.php"?>

    </body>
</html>
