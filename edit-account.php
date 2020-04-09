<?php



$title="My Account";
$style='<link href="css/editastyle.css" rel="stylesheet" type="text/css">';
include 'template.php';
include_once 'includes/config.php';

if (isset($_SESSION['idUSERS'])){

      $uid = $_SESSION['idUSERS'];

     
      //select user data
      $sql="SELECT * FROM users where idUSERS = $uid";

        $stmt = mysqli_stmt_init($conn);

        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        session_destroy();
        session_start();

        foreach($row as $key => $value)
              {             
                $_SESSION[$key] = $value; //SESSION
              }

        
}

if(isset($_SESSION['idUSERS'])){
  foreach($_SESSION as $key => $value) //create local variables based on $_SESSION keys and values
  {
    $$key = $value;


  }
  

}

?>

<div class="container">
  <h1 class="well">My account info</h1>
  <div class="col-lg-12 well">

    <!-- Webpage Content Starts here -->
    <div class="row">

      <div class="divTable" style="border: 1px solid #000;" >
        <div class="divTableBody">
          <div class="divTableRow row">
            <div class="divTableCell"><b>Username: </b><br><?php echo $username;?></div>
            <div class="divTableCell"><a href="edit.php?name=Username&edit=username&current=<?php echo $username;?>" class="btn btn-info"> Edit </a></div>
          </div>
          <div class="divTableRow row">
            <div class="divTableCell"><b>First Name: </b><br><?php echo $fname;?></div>
            <div class="divTableCell"><a href="edit.php?name=First%20Name&edit=fname&current=<?php echo $fname;?>" class="btn btn-info"> Edit </a></div>
          </div>
          <div class="divTableRow row">
            <div class="divTableCell"><b>Last Name: </b><br><?php echo $lname;?></div>
            <div class="divTableCell"><a href="edit.php?name=Last%20Name&edit=lname&current=<?php echo $lname;?>" class="btn btn-info"> Edit </a></div>
          </div>
          <div class="divTableRow row">
            <div class="divTableCell"><b>Phone Number: </b><br><?php echo $telnum;?></div>
            <div class="divTableCell"><a href="edit.php?name=Number&edit=telnum&current=<?php echo $telnum;?>" class="btn btn-info"> Edit </a></div>
          </div>
          <div class="divTableRow row">
            <div class="divTableCell"><b>Email Address: </b><br><?php echo $email;?></div>
            <div class="divTableCell"><a href="edit.php?name=Email%20Address&edit=email&current=<?php echo $email;?>" class="btn btn-info"> Edit </a></div>
          </div>
          <div class="divTableRow row">
            <div class="divTableCell"><b>Password: </b><br>*********</div>
            <div class="divTableCell"><a href="editpassword.php" class="btn btn-info"> Edit </a></div>
          </div>
        </div>
      </div>

    </div>

    <!-- End of Webpage Content-->

  </div>

  <?php 

    if($_SESSION['idUSERS'] != 5 ){

    echo '<a onclick="myFunction()" class="btn btn-danger"> Delete Account </a>';

  }

  ?>
</div>



<script type='text/javascript'>

function myFunction() {


    var ask = window.confirm("Are you sure you want to permanently delete your account?");
    if (ask) {
        window.alert("Account was successfully deleted.");

        window.location.href = "delete.php";

    }
}
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>