

<?php include"../assets/config.php"?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FoodStuff | online Dairy products available Here</title>
    <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
    <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
  </head>

  <body style="background:#8f8c8c;">
    <?php
        $edit= $_GET['edit'];
       
        $query = mysqli_query($conn, "SELECT * FROM product where p_id='$edit'");
        $row=mysqli_fetch_array($query);
        // echo "<pre>", var_dump($row), "</pre>";
    ?>

  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-10 m-auto">
        <div class="card shadow mb-5">
          <form  action="p_edit.php?edit=<?=$_GET['edit']?>" method="post" enctype="multipart/form-data" style="background:#dbd7d7" >
            <h2 class="mb-5 mt-3 text-uppercase text-center" style="font-family: 'Kaushan Script',cursive;color:#ff0867">
              UPDATE PRODUCT
            </h2>
            <div class="row">
                <div class="form-group col-6">
                <label for="">P_name</label>
                      <input type="text" class="form-control rounded-pill form-control-lg" name="p_name" value="<?=$row['p_name']?>">
                </div>

                <div class="form-group col-6">
                <label for="">P_price</label>
                    <input type="text" class="form-control rounded-pill form-control-lg" name="p_price" value="<?=$row['p_price']?>">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                <label for="">dd/mm/yy </label>
                  <input type="text" class="form-control rounded-pill form-control-lg" name="p_mfg" value="<?=$row['p_mfg']?>">
                </div>
                
                <div class="form-group col-6">
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
                     </div>

              <div class="row">
                <div class="form-group col-6">
                <label for="">P_qty</label>
                    <input type="text" class="form-control rounded-pill form-control-lg" name="p_qty" value="<?=$row['Qty']?>">
                </div>

                <div class="form-group col-6">
                <label for="">p_brand</label>
                    <input type="text" class="form-control rounded-pill form-control-lg" name="p_brand" value="<?=$row['p_brand']?>">
               </div>
            </div>
            <div class="form-group">
            <div class="row">

            </div>
              <label for="">P_img</label>
              <img src="../image\<?php echo $row['p_img'];?>" alt="" height="170px">
              <input type="file" name="p_img" class="form-control">
            </div>

             <div class="form-group">
                 <input type="submit" class="btn btn-success btn-block form-control rounded-pill form-control-lg" name="update" value="UPDATE" class="mt-5">
             </div>

          </form>

        </div>
      </div>
    </div>
  </div>



  <?php
    if(isset($_POST['update'])){

       echo "<pre>", var_dump($_POST), "</pre>";
      //  echo "<pre>", var_dump($_FILES['p_img']['name']), "</pre>";
      //  die();

      // echo "<pre>", var_dump($row), "</pre>";

      $p_id=$_GET['edit'];
      $p_name=$_POST['p_name'];
      $p_price=$_POST['p_price'];
      $p_mfg=$_POST['p_mfg'];
      $cat_title=$_POST['p_cat_title'];
      $p_qty=$_POST['p_qty'];
      $p_brand=$_POST['p_brand'];

      $p_img = $row['p_img'];

      if ($_FILES['p_img']['name'] != "") {
        $p_img = $_FILES['p_img']['name'];  // this is for storing the image in a variable
        $p_img_tmp =  $_FILES['p_img']['tmp_name'];  //this is for temporarily store the the image.it helps  untill image is getting uploaded
        move_uploaded_file($p_img_tmp,"../image/$p_img"); //when image is uploaded then it will be stored in image folder we have used
      }
      // echo "p_img = ".$p_img."<br />";

      $update="UPDATE product
      set
      p_name='$p_name', 
      p_price='$p_price', 
      p_mfg='$p_mfg', 
      cat_title='$cat_title', 
      Qty='$p_qty', 
      p_brand='$p_brand', 
      p_img='$p_img'
      where p_id='$p_id'";
      // die($update);
      
      mysqli_query($conn, $update);
      redirect('v_products');
            }
             ?>




  </body>
</html>
