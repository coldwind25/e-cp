

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
        $query = mysqli_query($conn, "SELECT * FROM employee where emp_id='$edit'");
        $row=mysqli_fetch_array($query);?>

  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-10 m-auto">
        <div class="card shadow mb-5">
          <form  action="emp_edit.php?edit=<?=$_GET['edit']?>" method="post" enctype="multipart/form-data" style="background:#dbd7d7" >
            <h2 class="mb-5 mt-3 text-uppercase text-center" style="font-family: 'Kaushan Script',cursive;color:#ff0867">
              UPDATE VENDOR
            </h2>
            <div class="row">
                <div class="form-group col-6">

                      <input type="text" class="form-control rounded-pill form-control-lg" name="emp_f_name" value="<?=$row['emp_f_name']?>">
                </div>

                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="emp_L_name" value="<?=$row['emp_L_name']?>">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">

                  <select class="form-control rounded-pill form-control-lg" name="emp_gen">
                      <option value="<?=$row['emp_gen']?>" selected disabled hidden><?=$row['emp_gen']?></option>
                      <option>male</option>
                      <option>female</option>
                      <option>other</option>
                  </select>
                </div>

                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="emp_age" value="<?=$row['emp_age']?>">
                </div>
            </div>

              <div class="row">
                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="emp_email" value="<?=$row['emp_email']?>">
                </div>

                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="emp_phn" value="<?=$row['emp_phn']?>">
               </div>
            </div>

            <div class="row">

                <div class="form-group col-6">

                      <input type="text" class="form-control rounded-pill form-control-lg" name="emp_add" value="<?=$row['emp_add']?>">
                </div>

                <div class="form-group col-6">

                      <input type="text" class="form-control rounded-pill form-control-lg" name="emp_pin" value="<?=$row['emp_pin']?>">
                </div>
            </div>

            <div class="row">


                <div class="form-group col-6">

                    <select class="form-control rounded-pill form-control-lg" name="emp_city">
                        <option value=""><?=$row['emp_city']?></option>
                        <option>Purnea</option>
                        <option>Saharsa</option>
                        <option>Katihar</option>
                        <option>Kishanganj</option>
                        <option>Bhagalpur</option>
                    </select>
                </div>

                <div class="form-group col-6">

                    <select class="form-control rounded-pill form-control-lg" name="emp_state">
                        <option value=""><?=$row['emp_state']?></option>
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
            $emp_id=$_GET['edit'];
            $emp_f_name=$_POST['emp_f_name'];
            $emp_phn=$_POST['emp_phn'];
            $emp_email=$_POST['emp_email'];
            $emp_add=$_POST['emp_add'];
            $emp_pin=$_POST['emp_pin'];
            $emp_L_name=$_POST['emp_L_name'];
            $emp_age=$_POST['emp_age'];
            $emp_gen=$_POST['emp_gen'];
            $emp_city=$_POST['emp_city'];
            $emp_state=$_POST['emp_state'];



            $update="UPDATE employee
            set
           emp_f_name='$emp_f_name',emp_L_name='$emp_L_name',emp_phn='$emp_phn',emp_email='$emp_email',emp_add='$emp_add',emp_pin='$emp_pin',emp_age='$emp_age',emp_gen='$emp_gen',emp_city='$emp_city',emp_state='$emp_state' where emp_id='$emp_id'";
            mysqli_query($conn, $update);
            echo "<script>alert('data updated')</script>";
            redirect('employee');

              }
                  ?>


  </body>
</html>
