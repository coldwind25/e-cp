
<?php include_once"../assets/config.php";
session_start();?>
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
  <?php include"include/header.php"?>


  <div class="container-fluid mt-3">
    <div class="row">
      <div class="col-lg-3">
        <?php include"include/side.php"?>
      </div>

      <div class="col-lg-9">
        <div class="row">
                <div class="col-9">
                    <blockquote class="blockquote"><h2 class="font-weight-bold h5 my-4">Manage Customers </h2></blockquote>
</div>
          <div class="col-3">
            <form action="customers.php"  method="get" class="form-inline mt-3">
                <input type="search" placeholder="Search customers" class="form-control" name="c_search">
                <input type="submit" value="Go" name="find" class="btn btn-success">
            </form>
</div>
          </div>
        <table class="table table-bordered">
          <tr>
            <th>Serial no.</th>
            <th>Name</th>
            <th>Action</th>

          </tr>

          <?php

              if(isset($_GET['find'])):
                $search=$_GET['c_search'];
                $calling = mysqli_query($conn, "SELECT * from customer where c_f_name like '%$search%' or c_l_name like '%$search%'");
                $count=mysqli_num_rows($calling);
                        if($count==0):
                          echo"<h1>No Customer of this name</h1>";
                        endif;
            else:
              $calling=mysqli_query($conn, "SELECT * from customer");
            endif;

              $count=mysqli_num_rows($calling);
            if($count>0):
              $c=0;
              while($row=mysqli_fetch_array($calling)):
                $c++;
              ?>
              <tr>

                <td><?=$c?></td>
                <td><?=$row['c_f_name'];?>&nbsp;<?=$row['c_L_name'];?></td>
                <td>

                  <a type="button"  href="#viewCust<?= $row['c_id'];?>" class="btn btn-success" data-toggle="modal"><i class="fas fa-eye" name="view"></i></a>

                
                  </a>


                  <!--  View Modal -->
                  <div class="modal fade" id="viewCust<?= $row['c_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <strong >CUSTOMERS</strong>
                        </div>
                        <div class="modal-body">
                          <table class="table table-bordered mt-5">
                                <tr>
                                  <th> Id</th>
                                  <td><?= $row['c_id']?></td>

                                </tr>
                                <tr>
                                  <th> name</th>
                                  <td><?= $row['c_f_name'];?> <?= $row['c_L_name'];?></td>

                                </tr>
                                <tr>
                                  <th> age</th>
                                  <td><?= $row['c_age'];?></td>

                                </tr>
                                <tr>
                                  <th> email</th>
                                  <td><?= $row['c_email'];?></td>

                                </tr>

                              <u><h5 class="text-center mt-3 mb-4 text-uppercase"><?=$row['c_f_name']?><span class="text-lowercase">'s complete details here</span></h></u>


                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                        </div>
                      </div>
                    </div>
                  </div>


                </td>
              </tr>
    <?php endwhile;
endif;?>
        </table>
      </div>
    </div>
  </div>
  </body>
</html>
