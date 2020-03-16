
<?php include"../assets/config.php"?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MilkMart | online Dairy products available Here</title>
    <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
    <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
  </head>

  <body style="background:#8f8c8c;">
    <?php
        $edit= $_GET['edit'];
        $query = mysqli_query($conn, "SELECT * FROM vendor where v_id='$edit'");
        $row=mysqli_fetch_array($query);?>

  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-10 m-auto">
        <div class="card shadow mb-5">
          <form  action="v_edit.php?edit=<?=$_GET['edit']?>" method="post" enctype="multipart/form-data" style="background:#dbd7d7" >
            <h2 class="mb-5 mt-3 text-uppercase text-center" style="font-family: 'Kaushan Script',cursive;color:#ff0867">
              UPDATE VENDOR
            </h2>
            <div class="row">
                <div class="form-group col-6">

                      <input type="text" class="form-control rounded-pill form-control-lg" name="v_f_name" value="<?=$row['v_f_name']?>">
                </div>

                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="v_L_name" value="<?=$row['v_L_name']?>">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">

                  <select class="form-control rounded-pill form-control-lg" name="v_gen">
                      <option value="<?=$row['v_gen']?>" selected disabled hidden><?=$row['v_gen']?></option>
                      <option>male</option>
                      <option>female</option>
                      <option>other</option>
                  </select>
                </div>

                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="v_age" value="<?=$row['v_age']?>">
                </div>
            </div>

              <div class="row">
                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="v_email" value="<?=$row['v_email']?>">
                </div>

                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="v_phn" value="<?=$row['v_phn']?>">
               </div>
            </div>

            <div class="row">

                <div class="form-group col-6">

                      <input type="text" class="form-control rounded-pill form-control-lg" name="v_add" value="<?=$row['v_add']?>">
                </div>

                <div class="form-group col-6">

                      <input type="text" class="form-control rounded-pill form-control-lg" name="v_pin" value="<?=$row['v_pin']?>">
                </div>
            </div>

            <div class="row">


                <div class="form-group col-6">

                    <select class="form-control rounded-pill form-control-lg" name="v_city">
                        <option value=""><?=$row['v_city']?></option>
                        <option>Purnea</option>
                        <option>Saharsa</option>
                        <option>Katihar</option>
                        <option>Kishanganj</option>
                        <option>Bhagalpur</option>
                    </select>
                </div>

                <div class="form-group col-6">

                    <select class="form-control rounded-pill form-control-lg" name="v_state">
                        <option value=""><?=$row['v_state']?></option>
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
            $v_id=$_GET['edit'];
            $v_f_name=$_POST['v_f_name'];
            $v_phn=$_POST['v_phn'];
            $v_email=$_POST['v_email'];
            $v_add=$_POST['v_add'];
            $v_pin=$_POST['v_pin'];
            $v_L_name=$_POST['v_L_name'];
            $v_age=$_POST['v_age'];
            $v_gen=$_POST['v_gen'];
            $v_city=$_POST['v_city'];
            $v_state=$_POST['v_state'];



            $update="UPDATE vendor
            set
            v_f_name='$v_f_name',v_L_name='$v_L_name',v_phn='$v_phn',v_email='$v_email',v_add='$v_add',v_pin='$v_pin',v_age='$v_age',v_gen='$v_gen',v_city='$v_city',v_state='$v_state' where v_id='$v_id'";
            mysqli_query($conn, $update);
            echo "<script>alert('data updated')</script>";
            redirect('vendors');

              }
                  ?>


  </body>
</html>
