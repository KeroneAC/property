
<?php

  session_start(); //continue session 
  
  if((isset($_SESSION['errFlag']))) //if the session error flag exist and is equal to 1
  {
    //var_dump($_SESSION);
    foreach($_SESSION as $key => $value)
    {
      $$key = $value;
    }
    
  }
  else
  {
    // DEFINE DEFAULT INFO on START UP
    $fname ="N/A";
    $lname = "N/A";
    $username = "N/A";
    $password1 = "";
    $telNum ="N/A";
    $email = "N/A";

    $property ="N/A";
    $bedroom = 0;
    $bathroom = 0;
    $size = "N/A";
    $Btype = "N/A";
    $Ltype = "N/A";
    $price = "N/A";

    $address1 ="N/A";
    $address2 ="N/A";
    $city ="N/A";
    $parish ="N/A";
    

    
  }  
  
  ?>

  <!doctype html>
  <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- Custom CSS --> 
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
      .divTable{
        display: table;
        width: 100%;
      }
      .divTableRow {
        display: table-row;
      }
      .divTableHeading {
        background-color: #EEE;
        display: table-header-group;
      }
      .divTableCell, .divTableHead {
        border: 1px solid #999999;
        display: table-cell;
        padding: 3px 10px;
      }
      .divTableHeading {
        background-color: #EEE;
        display: table-header-group;
        font-weight: bold;
      }
      .divTableFoot {
        background-color: #EEE;
        display: table-footer-group;
        font-weight: bold;
      }
      .divTableBody {
        display: table-row-group;
      }



    </style>


    <title>Register Property</title>

  </head>
  <body>
    <div class="container">
      <h1 class="well">Register Property</h1>
      <div class="col-lg-12 well">
        <div class="divTable">
          <div class="divTableBody">
            <div class="divTableRow">
              <div class="col-sm-6 divTableCell">First Name</div>
              <div class="col-sm-6 divTableCell"><?php echo $fname;?> </div>
            </div>
            <div class="divTableRow">
              <div class="col-sm-6 divTableCell">Last Name</div>
              <div class="col-sm-6 divTableCell"><?php echo $lname;?></div>
            </div>
            <div class="divTableRow">
              <div class="col-sm-6 divTableCell">User Name</div>
              <div class="col-sm-6 divTableCell"><?php echo $username;?></div>
            </div>
            <div class="divTableRow">
              <div class="col-sm-6 divTableCell">Phone #</div>
              <div class="col-sm-6 divTableCell"><?php echo $telNum;?></div>
            </div>
            <div class="divTableRow">
              <div class="col-sm-6 divTableCell">Email Address</div>
              <div class="col-sm-6 divTableCell"><?php echo $email;?></div>
            </div>
            <div class="divTableRow">
              <div class="col-sm-6 divTableCell">&nbsp;</div>
              <div class="col-sm-6 divTableCell">&nbsp;</div>
            </div>
            <div class="divTableRow">
              <div class="col-sm-6 divTableCell">Type of Property</div>
              <div class="col-sm-6 divTableCell"><?php echo $property;?></div>
            </div>
            <div class="divTableRow">
              <div class="col-sm-6 divTableCell">Number of Bedrooms</div>
              <div class="col-sm-6 divTableCell"><?php echo $bedroom;?></div>
            </div>
            <div class="divTableRow">
              <div class="col-sm-6 divTableCell">Number of Bathrooms</div>
              <div class="col-sm-6 divTableCell"><?php echo $bathroom;?></div>
            </div>
            <div class="divTableRow">
              <div class="col-sm-6 divTableCell">Size of land</div>
              <div class="col-sm-6 divTableCell"><?php echo $size;?></div>
            </div>
            <div class="divTableRow">
              <div class="col-sm-6 divTableCell">Building Type</div>
              <div class="col-sm-6 divTableCell"><?php echo $Btype;?></div>
            </div>
            <div class="divTableRow">
              <div class="col-sm-6 divTableCell">Listing Type</div>
              <div class="col-sm-6 divTableCell"><?php echo $Ltype;?></div>
            </div>
            <div class="divTableRow">
              <div class="col-sm-6 divTableCell">Price</div>
              <div class="col-sm-6 divTableCell"><?php echo $price;?></div>
            </div>
            <div class="divTableRow">
              <div class="col-sm-6 divTableCell">&nbsp;</div>
              <div class="col-sm-6 divTableCell">&nbsp;</div>
            </div>

            <div class="divTableRow">
              <div class="col-sm-6 divTableCell">Address Line 1</div>
              <div class="col-sm-6 divTableCell"><?php echo $address1;?></div>
            </div>

            <div class="divTableRow">
              <div class="col-sm-6 divTableCell">Address Line 2</div>
              <div class="col-sm-6 divTableCell"><?php echo $address2;?></div>
            </div>

            <div class="divTableRow">
              <div class="col-sm-6 divTableCell">City</div>
              <div class="col-sm-6 divTableCell"><?php echo $city;?></div>
            </div>

            <div class="divTableRow">
              <div class="col-sm-6 divTableCell">Parish</div>
              <div class="col-sm-6 divTableCell"><?php echo $parish;?></div>
            </div>

 



          </div>
        </div>

      </div>               

      <form action="finish.php" method="POST">
        <button type="submit" name="save" class="btn btn-lg btn-info" >Register</button>
      </form>

    </div>

  </div>
</div>
</div>






<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>