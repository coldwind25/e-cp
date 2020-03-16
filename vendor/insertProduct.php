<?php include_once"../assets/config.php";
session_start();

if(!isset($_SESSION['vendor'])):
  header("location: ../vendor_login.php");
endif;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Products</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
</head>
    <body >
        <?php include"header.php"?>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                          <!--this form is created for vendor to add the product detail in database-->
                            <form action="insertProduct.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">P_name</label>
                                    <input type="text" name="p_name" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">P_price</label>
                                    <input type="text" name="p_price" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Each_product_quantity</label>
                                    <input type="text" name="each_qty" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">P_mfg</label>
                                    <input type="date" name="p_mfg" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">P_cat_title</label>
                                    <!--this is a dynamic select tag where the option for category is depend on the categories available ib database-->
                                    <select name="p_cat_title" class="form-control">
                                         <?php
                                         /*this $cat variable will store all the  product categories available in DB*/
                                            $cat = mysqli_query($conn, "SELECT * FROM category");

                                            /*this while loop will fetch all the selected row in option tag one-by-one*/
                                            while ($c = mysqli_fetch_array($cat)):
                                          ?>
                                          <option><?= $c['cat_title'];?></option>

                                          <?php endwhile;?>
                                    </select>
                                </div>

                                <div class="form-group">
                                      <label for="">Brand</label>
                                      <input type="text" name="p_brand" class="form-control">
                                </div>


                                <div class="form-group">
                                      <label for="">P_img</label>
                                      <input type="file" name="p_img" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">P_desc</label>
                                    <textarea name="p_desc" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">P_qty</label>
                                    <input type="text" name="p_qty" class="form-control">
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="send" class="btn btn-danger btn-block">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include"../assets/footer.php"?>
    </body>
</html>

<?php
if(isset($_POST['send'])){    /*when vendor will press submit button by filling the form records then the all data  will be stored in DB */


    $_SESSION['vendor']=$log;
    $p_name = $_POST['p_name'];   /*stores product name*/
    $p_price =$_POST['p_price'];
    $each_qty=$_POST['each_qty'];
    $p_cat_title = $_POST['p_cat_title'];
    $p_mfg = $_POST['p_mfg'];
    $p_desc = $_POST['p_desc'];
    $qty = $_POST['p_qty'];
    $p_brand = $_POST['p_brand'];

    $p_img = $_FILES['p_img']['name'];  // this is for storing the image in a variable
    $p_img_tmp =  $_FILES['p_img']['tmp_name'];  //this is for temporarily store the the image.it helps  untill image is getting uploaded

    move_uploaded_file($p_img_tmp,"../image/$p_img"); //when image is uploaded then it will be stored in image folder we have used


    //the below section is for sql query to insert the all variable values in the corrospondence field of product table
    $query = mysqli_query($conn, "INSERT INTO product (p_name,p_brand,p_price,each_qty,p_mfg,p_img,cat_title,p_desc,Qty,v_email)
     value ('$p_name','$p_brand','$p_price','$each_qty','$p_mfg','$p_img','$p_cat_title','$p_desc','$qty','$log')");
echo"<script>window.open('index.php','_self')</script>";
}


?>
