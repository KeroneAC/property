<?php


$style='<link href="css/details.css" rel="stylesheet" type="text/css">';
$title="Details";
include 'template.php';
include_once 'includes/config.php';

if( $_GET["pid"]) {


  $pid = $_GET["pid"];

      //select property data
  $sql="SELECT * FROM property where idProperty = $pid";

  $stmt = mysqli_stmt_init($conn);

  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  $thisProperty = mysqli_fetch_assoc($result);

      //select owner data  
  $uid = $thisProperty['userid'];
  $sql1 = "SELECT * FROM users WHERE idUSERS = $uid";  

  $stmt = mysqli_stmt_init($conn);

  mysqli_stmt_prepare($stmt, $sql1);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  $thisUser = mysqli_fetch_assoc($result);

      //select photo for gallery
  $sql2 = "SELECT * FROM gallery WHERE propertyid = $pid";  

  $stmt = mysqli_stmt_init($conn);

  mysqli_stmt_prepare($stmt, $sql2);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);


  





}
?>

<div class="container">



  <!-- Webpage Content Starts here -->
  <div class="row">
    <div class="col-md-7">

      <div class="carousel">
        <buttton class="carousel__button carousel__button--left">
          <img src="Images/left1.svg" alt="">
        </buttton>

        <div class="carousel__track-container">

          <ul class="carousel__track">
            <?php
            $count = 0;
            while ( $thisGallery = mysqli_fetch_assoc($result)){

              echo ' 
              <li class="carousel__slide'; 

              if($count==0){echo ' current-slide';}

              echo '">

              <img class="carousel__image" src="uploads/'.$thisGallery['pictureurl'].'" alt="">

              </li>';
              $count ++;
            }
            ?>


          </ul>

        </div>
        <buttton class="carousel__button carousel__button--right">
          <img src="Images/right1.svg" alt="">
        </buttton>

        <div class="carousel__nav">

          <?php 
          for($x = 0; $x < $count; $x++){
            echo '<button class="carousel__indicator';
 
            if($x == 0){echo ' current-slide';}

            echo '"></button>';
          }
          ?>
        </div>
      </div>

    </div>

    <div class="col-md-5 container">

      <p class="newarrival"> &nbsp;<?php echo 'For '.ucwords($thisProperty['l_type']); ?> &nbsp;</p>
      <h2><?php echo ucwords($thisProperty['city']).', '.ucwords($thisProperty['parish']); ?></h2>
      <p><b>Property Type:</b> <?php echo ucwords($thisProperty['p_type']); ?></p>
      <p><b>Property Size:</b> <?php echo number_format($thisProperty['size']).' Acre(s)'; ?></p>
      <p <?php if($thisProperty['b_type'] == ""){ echo 'style="display: none;"';} ?>><b>Building Type:</b> <?php echo ucwords($thisProperty['b_type']); ?></p>
      <p><b>Bedroom(s):</b> <?php echo ucwords($thisProperty['bedroom']); ?></p>
      <p><b>Bathroom(s):</b> <?php echo ucwords($thisProperty['bathroom']); ?></p>
      <p><b>Address:</b> <?php echo ucwords($thisProperty['address1']).', '.ucwords($thisProperty['address2']); ?></p>
      <p><b>Price:</b> <?php echo '$'.number_format($thisProperty['price']); ?></p>
      <hr>

      <h2>Owner Details</h2>
      <p><b>Name:</b> <?php echo ucwords($thisUser['fname']).' '.ucwords($thisUser['lname']); ?></p>
      <p><b>Tel#:</b> <?php echo $thisUser['telnum']; ?></p>
      <p><b>Email Address:</b> <?php echo $thisUser['email']; ?></p>

      
      <?php

      if (isset($_SESSION['idUSERS'])){

        if($_SESSION['username']=='micasadmin' || $_SESSION['idUSERS'] == $thisUser['idUSERS'])  {

          echo '<hr> 

          <form action="upload.php?pid='.$thisProperty['idProperty'].'" enctype="multipart/form-data" id="uploadform" method="POST">

          <label>Upload Photo for Gallery</label> <br>
          <input type = "file" name = "img" id = "img" accept = "image/*" required /></br>

          <button type="submit" name="uploadSubmit" class="btn btn-lg btn-info">Submit</button> 


          </form>
          ';

        }
      }
      
      ?>

    </div>


  </div>
  <!-- End of Webpage Content-->

</div>
<script src="js/carousel.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>