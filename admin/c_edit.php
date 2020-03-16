
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
    <?php include"include/header.php"?>
    <?php
        $edit= $_GET['edit'];
        $query = mysqli_query($conn, "SELECT * FROM customer where c_id='$edit'");
        $row=mysqli_fetch_array($query);?>

  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-10 m-auto">
        <div class="card shadow mb-5">
          <form  action="c_edit.php?edit=<?=$_GET['edit']?>" method="post" enctype="multipart/form-data" style="background:#dbd7d7" >
            <h2 class="mb-5 mt-3 text-uppercase text-center" style="font-family: 'Kaushan Script',cursive;color:#ff0867">
              UPDATE CUSTOMER
            </h2>
            <div class="row">
                <div class="form-group col-6">

                      <input type="text" class="form-control rounded-pill form-control-lg" name="c_f_name" value="<?=$row['c_f_name']?>">
                </div>

                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="c_L_name" value="<?=$row['c_L_name']?>">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">

                  <select class="form-control rounded-pill form-control-lg" name="c_gen">
                      <option value="<?=$row['c_gen']?>" selected disabled hidden><?=$row['c_gen']?></option>
                      <option>male</option>
                      <option>female</option>
                      <option>other</option>
                  </select>
                </div>

                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="c_age" value="<?=$row['c_age']?>">
                </div>
            </div>

              <div class="row">
                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="c_email" value="<?=$row['c_email']?>">
                </div>

                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="c_phn" value="<?=$row['c_phn']?>">
               </div>
            </div>

            <div class="row">

                <div class="form-group col-6">

                      <input type="text" class="form-control rounded-pill form-control-lg" name="c_add" value="<?=$row['c_add']?>">
                </div>

                <div class="form-group col-6">

                      <input type="text" class="form-control rounded-pill form-control-lg" name="c_pin" value="<?=$row['c_pin']?>">
                </div>
            </div>

            <div class="row">


                <div class="form-group col-6">

                    <select class="form-control rounded-pill form-control-lg" name="c_city">
                        <option value=""><?=$row['c_city']?></option>
                        <option>Purnea</option>
                        <option>Saharsa</option>
                        <option>Katihar</option>
                        <option>Kishanganj</option>
                        <option>Bhagalpur</option>
                    </select>
                </div>

                <div class="form-group col-6">

                    <select class="form-control rounded-pill form-control-lg" name="c_state">
                        <option value=""><?=$row['c_state']?></option>
                        <option>Bihar</option>
                        <option>panjab</option>
                        <option>Delhi</option>
                        <option>Jharkhand</option>
                        <option>Uttar Pradesh</option>
                    </select>
                </div>
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
            $c_id=$_GET['edit'];
            $c_f_name=$_POST['c_f_name'];
            $c_phn=$_POST['c_phn'];
            $c_email=$_POST['c_email'];
            $c_add=$_POST['c_add'];
            $c_pin=$_POST['c_pin'];
            $c_L_name=$_POST['c_L_name'];
            $c_age=$_POST['c_age'];
            $c_gen=$_POST['c_gen'];
            $c_city=$_POST['c_city'];
            $c_state=$_POST['c_state'];



            $update="UPDATE customer
            set
            c_f_name='$c_f_name',c_L_name='$c_L_name',c_phn='$c_phn',c_email='$c_email',c_add='$c_add',c_pin='$c_pin',c_age='$c_age',c_gen='$c_gen',c_city='$c_city',c_state='$c_state' where c_id='$c_id'";
            mysqli_query($conn, $update);
            echo "<script>alert('data updated')</script>";
            redirect('customers');

              }
                  ?>


  </body>
</html>
