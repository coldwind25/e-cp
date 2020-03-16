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

  <body>
    <?php include"include/header.php" ?>
    <div class="container-fluid mt-3">
      <div class="row ">
        <div class="col-lg-3">
          <?php include"include/side.php"?>
        </div>

        <div class="col-lg-9">
          <div class="row">
                  <div class="col-9">
                      <blockquote class="blockquote"><h2 class="font-weight-bold h5 my-4">Manage Vendors </h2></blockquote>
</div>
            <div class="col-3">
              <form action="vendors.php"  method="get" class="form-inline mt-3">
                  <input type="search" placeholder="Search Vendors" class="form-control" name="v_search">
                  <input type="submit" value="Go" name="find" class="btn btn-success">
              </form>
</div>
            </div>
          <table class="table table-bordered">
            <tr>
              <th>Serial no.</th>
              <th>Name</th>
              <th>Action</th>
              <th>Status</th>

            </tr>

            <?php
            if(isset($_GET['find'])):
              $search=$_GET['v_search'];
              $calling = mysqli_query($conn, "SELECT * from vendor where v_f_name like '%$search%' or v_l_name like '%$search%'");
              $count=mysqli_num_rows($calling);
                    if($count==0):
                      echo"<h1>No Vendor of this name</h1>";
                    endif;
          else:
            $calling=mysqli_query($conn, "SELECT * from vendor");
          endif;

              $count=mysqli_num_rows($calling);
              if($count>0):
                $c=0;
                while($row=mysqli_fetch_array($calling)):
                  $c++;
                ?>
                <tr>
                  <td><?=$c?></td>
                  <td><?=$row['v_f_name'];?> <?=$row['v_L_name'];?></td>
                  <td>

                    <a type="button"  href="#viewVendor<?= $row['v_id'];?>" class="btn btn-success" data-toggle="modal"><i class="fas fa-eye" name="view"></i></a>


                   

                    

                    <!--  delete Modal -->
                    <div class="modal fade" id="deleteVendor<?= $row['v_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                              Are you really want to <strong style="color:red">DISABLE</strong> <strong><?= $row['v_f_name'];?></strong>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <a href="v_delete.php?del=<?= $row['v_id']?>" class="btn btn-primary">Yes</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--  View Modal -->
                    <div class="modal fade" id="viewVendor<?= $row['v_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                              <strong >VENDOR</strong>
                          </div>
                          <div class="modal-body">
                            <table class="table table-bordered mt-5">
                                  <tr>
                                    <th>vendor Id</th>
                                    <td><?= $row['v_id']?></td>

                                  </tr>
                                  <tr>
                                    <th>vendor name</th>
                                    <td><?= $row['v_f_name'];?> <?= $row['v_L_name'];?></td>

                                  </tr>
                                  <tr>
                                    <th>vendor age</th>
                                    <td><?= $row['v_age'];?></td>

                                  </tr>
                                  <tr>
                                    <th>vendor email</th>
                                    <td><?= $row['v_email'];?></td>

                                  </tr>
                                  <tr>
                                    <th>vendor image</th>
                                      <td><?= $row['v_img'];?></td>

                                  </tr>
                                <u><h5 class="text-center mt-3 mb-4 text-uppercase"><?= $row['v_f_name']?><span class="text-lowercase">'s complete details here</span></h5></u>


                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>

                  <td style="color:#21c416"><?= $row['v_status']?></td>
                </tr>
  <?php endwhile;
  endif;?>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
