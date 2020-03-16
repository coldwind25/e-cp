<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Modak&display=swap" rel="stylesheet">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-transparent" style="background: linear-gradient(#eba4b6,#ff3669,#ff0041);">
  <!--used for brand image-->
    <div class="navbar-header" style="width:40%">
        <a href="index.php" class="navbar-brand text-white"><img src="image\fl.png" alt=""  style="font-family: 'Modak', cursive; width:30%;height:45px" > </a>
    </div>

    <!--this code is done for making a three lined button to make the page responsive-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="navarColor01"><!--this line is written for toggeling the navbar items in smaller screen-->

        <!--used for search bar-->

        <form action="product.php"  method="get" class="form-inline">
            <input type="search" placeholder="Search Products"  required oninvalid="this.setCustomValidity('You are trying for empty search please enter the valid value')" oninput="this.setCustomValidity('')"  class="form-control" size="50" name="search" style="min-height: 37px;margin-left:-80%" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>">
              <?php
              if(isset($_GET['search'])): ?>
                <a href="product.php" class="btn btn-info" ><b>X</b></a>

              <?php else: ?>
                <input type="submit" value="Go" name="find" class="btn btn-success">
              <?php endif;?>


        </form>



        <!--used for navigation bar items-->


        <ul class="navbar-nav ml-auto">

          <?php


          if(!isset($_SESSION['customer'])):
          ?>


                    <li class="nav-item">
                      <a href="login.php" class="nav-link text-white"   class="item">Login</a>
                    </li>

                    <li class="nav-item">
                      <a  href="register_customer_account.php"class="nav-link mr-2 text-white"  class="item">Register</a>
                    </li>

                    <div class="dropdown nav-link">
                          <div class=" dropdown-toggle text-white"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <a href="#" class="text-white ">Business</a>
                          </div>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a href="#"  class="dropdown-item"  data-toggle="modal" data-target="#signupModal" >Register for vendor </a>
                          <a href="#"   class="dropdown-item"  data-toggle="modal" data-target="#LoginModal">Login for vendor </a>
                          </div>
                    </div>


                  <?php else:
          $log = $_SESSION['customer'];
          $calling = mysqli_query($conn, "select * from customer where c_email='$log'");
          $data = mysqli_fetch_array($calling);
          $cart_query=mysqli_query($conn, "SELECT * FROM cart
            inner join customer
            on cart.c_id=customer.c_id
            inner join product
              on cart.p_id=product.p_id
            inner join vendor
            on cart.v_email=vendor.v_email
            where cart.c_id='".$data['c_id']."' ORDER BY cart.cart_id desc");
            $n=mysqli_num_rows($cart_query);

          $query = mysqli_query($conn, "SELECT * FROM customer where c_email='$log'");
          $row = mysqli_fetch_array($query);

            ?> 
          <?php if($row['c_img'] == ''){
           $img = '';
          } else {
            $img = '<img src="image/'.$row['c_img'].'" width="20px" class="mr-2 rounded-circle">';
          }
            ?>
          


          <div class="dropdown nav-link">
                <div class=" dropdown-toggle text-white"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?=$img;?><?= $row['c_f_name'];?>
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="cus_edit.php">My Profile</a>
                  <a class="dropdown-item" href="MyOrder.php">My Orders</a>
                  <a class="dropdown-item" href="myCart.php">My Cart</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
          </div>
<?php endif; ?>

                  <li class="nav-item ">
                    <a class="nav-link text-white" href="index.php" class="item ">Home</a>
                  </li>

                    <div class="dropdown nav-link">
                        <div class=" dropdown-toggle text-white"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a href="#" class="text-white ">More</a>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      
                        </div>
                  </div>



                  <li class="nav-item">
                      <a href="product.php" class="nav-link text-white"  class="item">products</a>
                  </li>
                  <?PHP
                    if(isset($_SESSION['customer'])):
                  ?>
                  <li class="cart.php">
                      <div class="">

                      </div>
                      <a  href="myCart.php" class="btn btn-link text-white "><i class="fa" style="font-size:24px;">&#xf07a;</i><span style="border-radius:15px; position:relative;top:-16px;left:-10%;background:#222f3e;" class='badge badge-info'><?php echo $n; ?></span></a>
                  </li>
                  <?PHP
                endif;
                  ?>
        </ul>
      </div>
</nav>


                <!--  this section is for creating a signup way Modal -->
                <div id="signupModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">

                <h4 class="modal-title">How do you want to sign up?</h4><hr>
                </div>
                <div class="modal-body">
                <a href="register_vendor_account.php"><div class="btn btn-warning ml-5  mb-2 rounded-pill form-control-lg">As a Vendor</div></a> <br>
                
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>

                </div>
                </div>


                <!--  this section is for creating a login way for vendor and employee Modal -->
                <div id="LoginModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">

                <h4 class="modal-title">How do you want to Login?</h4><hr>
                </div>
                <div class="modal-body">
                <a href="vendor_login.php"><div class="btn btn-warning ml-5  mb-2 rounded-pill form-control-lg">As a Vendor</div></a> <br>
               
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>

                </div>
                </div>




             <!--  this section is for creating a cart Modal -->
              <!--     <div id="cartModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content
                <div class="modal-content">
                <div class="modal-header">

                <h4 class="modal-title">your cart at a glance</h4><hr>
                </div>
                <div class="modal-body" id="cartModalBody">

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>

                </div>
                </div>-->
