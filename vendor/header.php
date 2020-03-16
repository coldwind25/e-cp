<nav class="navbar navbar-expand-lg sticky-top"  style="background:linear-gradient(#f18c8e,#f1d1b5,#f0b7a4)">
  <div class="navbar-header">
      <a href="index.php" class="navbar-brand text-dark"><img src="..\image\v_f.png" alt="" height=50px width=30%></a>
  </div>

  <!--this code is done for making a three lined button to make the page responsive-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>


    <div class="collapse navbar-collapse" id="navbarColor01"><!--this line is written for toggeling the navbar items in smaller screen-->


  <ul class="navbar nav ml-auto">

    <?php
        if(isset($_SESSION['vendor'])):
          $log = $_SESSION['vendor'];
          $query = mysqli_query($conn, "SELECT * FROM vendor where v_email='$log'");
          $row = mysqli_fetch_array($query);

        ?>

        <li class=nav-item"">  <div class="dropdown nav-link ">
                <div class=" dropdown-toggle text-dark"  id="dropdownMenuButton text-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="../image/<?= $row['v_img']; ?>" width="20px" class="mr-2 rounded-circle"><?= $row['v_f_name'];?>
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                 
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
          </div></li>

          <li class="nav-item">
            <a href="index.php" class="text-dark mr-3">Home</a>
          </li>
          <li class="nav-item">
            <a href="Dashboard.php" class="text-dark mr-2">Action</a>
          </li>
          <li class="nav-item">
            <a href="insertProduct.php" class="text-dark mr-2">Insert</a>
          </li>

        <?php endif; ?>






  </ul>
</nav>
