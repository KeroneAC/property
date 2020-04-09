
<?php 
Session_start();//continue session



?>
<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
  <meta charset="UTF-8">

  <!-- If IE use the latest rendering engine -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Set the page to the width of the device and set the zoon level -->
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  

  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <?php echo $style; ?>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="js/jquery.tabledit.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

  <title><?php echo $title; ?> </title> 
  <style>

    label.error{
      color: red;
    }

  </style>




</head>

<body onload="<?php if ($title == 'Description' || $title == 'Admin add properties') {echo "populate('property','Btype')";} ?>" >

  <div id="banner">  
    <img id="Image1" src="Images/banner.jpg" style="height:200px; width:100%;">
  </div>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Home</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li <?php if ($title == 'My Account')  {echo 'class="active"'; }?>><a href="<?php if(isset($_SESSION['idUSERS'])) { echo 'edit-account.php'; } else {echo 'login.php';}?>">My Account <span class="sr-only">(current)</span></a></li>

          <?php 

          if (isset($_SESSION['idUSERS'])){


            echo '  <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Properties<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="description.php">Add New</a></li>
            <li><a href="edit-properties.php">Edit Properties</a></li>
            </ul>
            </li>';
          } 

          ?>
          <?php

          if (isset($_SESSION['idUSERS'])){

            if($_SESSION['username']=='micasadmin') {

              echo '<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Management<span class="caret"></span></a>
              <ul class="dropdown-menu">
         <li><a href="manage-usersadd.php">Add Users</a></li>
              <li><a href="manage-users.php">Edit Users</a></li>
        <li><a href="manage-addproperties.php">Add Properties</a></li>
              <li><a href="manage-properties.php">Edit/Delete Properties</a></li>
              </ul>
              </li>';
            }
          }
          ?>

          
          
        </ul>

        <!-- Right aligned items of nav bar-->
        <ul class="nav navbar-nav navbar-right">
          <?php 

          if (isset($_SESSION['idUSERS'])){

            echo '<li><a href="logout.php"> Logout </a></li>';
            
            echo '<li><a href="edit-account.php">'.$_SESSION['fname'].'</a></li>';
          }else{

            echo "<li ";
            if ($title == 'Login')  {echo 'class="active"'; }
            echo '><a href="login.php">Login</a></li>';

            echo "<li ";
            if ($title == 'Registration')  {echo 'class="active"'; }
            echo '><a href="registration.php">Register</a></li>';


          }
          ?>
          

          

        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>



