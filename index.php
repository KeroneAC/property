<?php

$title="Home";
$style='<link href="css/indexstyle.css" rel="stylesheet" type="text/css">';
include 'template.php';
include_once 'includes/config.php';

if(isset($_POST['btnSearch'])){


    foreach($_POST as $key => $value) //create local  AND SESSION variables based on $_POST keys and values
    {
      $$key = $value;
      
    } 
  }else {

    $sparish="";
    $srange="";
    $sproperty="";
    
  }

  ?>

  <div class="container">


    <div class="col-lg-12 well">

      <!-- Webpage Content Starts here -->
      <div class="row">
        <form action="index.php" method="POST">
          <div class="col-sm-3 form-group">
            <label>Price Range</label> 
            <select class="form-control" name="srange" id="range">

              <option value="">All</option>
              <option <?php if ($srange == "0-50000") { echo "selected";} ?>  value="0-50000">0-50K</option>
              <option <?php if ($srange == "50000-100000") { echo "selected";} ?> value="50000-100000">50K-100K</option>
              <option <?php if ($srange == "100000-250000") { echo "selected";} ?>value="100000-250000">100K-250K</option>
              <option <?php if ($srange == "250000-500000") { echo "selected";} ?> value="250000-500000">250K-500K</option>
              <option <?php if ($srange == "500000-1000000") { echo "selected";} ?> value="500000-1000000">500K-1M</option>
              <option <?php if ($srange == "1000000-5000000") { echo "selected";} ?> value="1000000-5000000">1M-5M</option>
              <option <?php if ($srange == "5000000-10000000") { echo "selected";} ?> value="5000000-10000000">5M-10M</option>
              <option <?php if ($srange == "10000000-20000000") { echo "selected";} ?> value="10000000-20000000">10M-20M</option>
              <option <?php if ($srange == "20000000-35000000") { echo "selected";} ?> value="20000000-35000000">20M-35M</option>
              <option <?php if ($srange == "35000000-1000000") { echo "selected";} ?> value="35000000-50000000">35M-50M</option>
              <option <?php if ($srange == "50000000-100000000") { echo "selected";} ?> value="50000000-100000000">50M-100M</option>
              <option <?php if ($srange == "100000000-9999999999999999999999999") { echo "selected";} ?> value="100000000-9999999999999999999999999">100M+</option><!--I know this is lazy-->

            </select>
          </div>

          <div class="col-sm-3 form-group">
            <label>Property Type</label> 
            <select class="form-control" name="sproperty" id="Ltype">
              <option value="">All</option>
              <option <?php if ($sproperty == "vacant lot") { echo "selected";} ?>  value="vacant lot">Vacant</option>
              <option <?php if ($sproperty == "residential") { echo "selected";} ?> value="residential">Residential</option>
              <option <?php if ($sproperty == "commercial") { echo "selected";} ?> value="commercial">Commercial</option>

            </select>
          </div>

          <div class="col-sm-3 form-group">
           <label>Parish</label>
           <select name="sparish" class="form-control" id="ParishSelect">
            <option value="">All</option>
            <option <?php if ($sparish == "clarendon") { echo "selected";} ?> value="clarendon">Clarendon</option>
            <option <?php if ($sparish == "hanover") { echo "selected";} ?> value="hanover">Hanover</option>
            <option <?php if ($sparish == "kingston") { echo "selected";} ?> value="kingston">Kingston</option>
            <option <?php if ($sparish == "manchester") { echo "selected";} ?> value="manchester">Manchester</option>
            <option <?php if ($sparish == "portland") { echo "selected";} ?> value="portland">Portland</option>
            <option <?php if ($sparish == "st andrew") { echo "selected";} ?> value="st andrew">St Andrew</option>
            <option <?php if ($sparish == "st. ann") { echo "selected";} ?> value="st ann">St Ann</option>
            <option <?php if ($sparish == "st catherin") { echo "selected";} ?> value="st catherine">St Catherine</option>
            <option <?php if ($sparish == "st elizabeth") { echo "selected";} ?> value="st elizabeth">St Elizabeth</option>
            <option <?php if ($sparish == "st mary") { echo "selected";} ?> value="st mary">St Mary</option>
            <option <?php if ($sparish == "st thomas") { echo "selected";} ?> value="st thomas">St Thomas</option>
            <option <?php if ($sparish == "st james") { echo "selected";} ?> value="st james">St James</option>
            <option <?php if ($sparish == "trelawny") { echo "selected";} ?> value="trelawny">Trelawny</option>
            <option <?php if ($sparish == "westmoreland") { echo "selected";} ?> value="westmoreland">Westmoreland</option>
          </select>
        </div>

        <div class="col-sm-3 form-group">

          <button style="padding: 17px 32px; background-color: #e7e7e7; color: black; border-color: black;" type="submit" class="btn btn-lg btn-info" name="btnSearch" value="submit">Search</button>

        </div>


      </div>
    </form>
  </div>
  <!-- End of Webpage Content-->
</div>
<div CLASS="container" id="p-flex">

  <?php 
      //define how many results per page
  $results_per_page = 10;


      //add filters and find number of results found
  if($sparish=="" AND $srange =="" AND $sproperty==""){

        $sql = "SELECT  idProperty, city, parish, price, img FROM property"; //statement 

      } else if($sparish=="" AND $srange =="" AND $sproperty!==""){

        $sql = "SELECT  idProperty, city, parish, price, img FROM property WHERE p_type = '$sproperty'"; //statement 

      } else if($sparish=="" AND $srange !=="" AND $sproperty==""){

        $rpair=explode("-", $srange);
        $sql = "SELECT  idProperty, city, parish, price, img FROM property WHERE price > $rpair[0] AND price <= $rpair[1]"; //statement 

      } else if($sparish=="" AND $srange !=="" AND $sproperty!==""){

        $rpair=explode("-", $srange);
        $sql = "SELECT  idProperty, city, parish, price, img FROM property WHERE p_type = '$sproperty' AND price > $rpair[0] AND price <= $rpair[1]"; //statement 

      } else if($sparish!=="" AND $srange =="" AND $sproperty==""){

        $sql = "SELECT  idProperty, city, parish, price, img FROM property WHERE parish = '$sparish'"; //statement 

      } else if($sparish!=="" AND $srange =="" AND $sproperty!==""){

        $sql = "SELECT  idProperty, city, parish, price, img FROM property WHERE parish = '$sparish' AND p_type= '$sproperty'"; //statement 

      } else if($sparish!=="" AND $srange !=="" AND $sproperty==""){

        $rpair=explode("-", $srange);
        $sql = "SELECT  idProperty, city, parish, price, img FROM property WHERE parish = '$sparish' AND price > $rpair[0] AND price <= $rpair[1]"; //statement 

      } else if($sparish!=="" AND $srange !=="" AND $sproperty!==""){

        $rpair=explode("-", $srange);
        $sql = "SELECT  idProperty, city, parish, price, img FROM property WHERE parish = '$sparish' AND price > $rpair[0] AND price <= $rpair[1] AND p_type = '$sproperty'"; //statement 

      } 


      $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt, $sql);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);
      $number_of_results = mysqli_num_rows($result);

   //determine number of total pages    
      $number_of_pages = ceil($number_of_results/$results_per_page);

//determine which page number visitor is currently on
      if(!isset($_GET['page'])){
        $page = 1;
      } else {
        $page = $_GET['page'];
      }


//determine the sql LIMIT starting number for the results 
      $this_page_first_result = ($page-1)*$results_per_page;

//retrieve selected results from database and display on page 
      $sql1 = $sql." ORDER BY idProperty DESC LIMIT ".$this_page_first_result .",".$results_per_page.";"; 
      $stmt = mysqli_stmt_init($conn);

      mysqli_stmt_prepare($stmt, $sql1);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);

      while ( $row = mysqli_fetch_assoc($result)){

        echo '<div class="p-flex"><div class="p-flex-in">';
        echo '<a href="details.php?pid='.$row['idProperty'].'"><img class="p-img" src="uploads/'.$row['img'].'"/></a>';
        echo '<div class="p-name">'.ucwords($row['city']).', '.ucwords($row['parish']).'</div>';
        echo '<div class="p-price">$'.number_format($row['price']).'</div>';
        echo '</div></div>';

      }

      echo "</div>";
      
      //display pagination
      echo '<div class="container">';
      echo '<ul class="pagination">';
      for ($page=1; $page<=$number_of_pages; $page++) {

        echo '<li class="page_item"><a class="page_link" href="index.php?page=' . $page . '">' . $page . '</a></li>';
      }
      echo '</ul>';

      if($number_of_results == 0 ){
        echo "<center>No results found</center>";
      }

      ?>


 
      
    </div>


    <?php// var_dump($_SESSION); ?>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  </html>