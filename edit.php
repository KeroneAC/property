<?php 


  $title="Edit";
  $style='<link href="css/loginstyle.css" rel="stylesheet" type="text/css">';
  include 'template.php';

  if((isset($_SESSION['errFlag'])) && ($_SESSION['errFlag'])==1) //if the session error flag exist and is equal to 1
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
		$newval ="";
		$error = "";
		
	}



  ?>

  
   <div class="wrapper">
    <form  action = "editvalid.php" id="loginform" method ="POST" class="form-signin" >       
      <h2 class="form-signin-heading">Change <?php echo $_GET['name']; ?></h2>
      <input type="text" class="form-control" name="newval" placeholder="<?php echo $_GET['current']; ?>" required="" autofocus="" /> <br>

      <!--hidden fields to hold column name, previous value and name of attribute -->
      <input type="hidden" name="column" value="<?php echo $_GET['edit']; ?>">
      <input type="hidden" name="preval" value="<?php echo $_GET['current']; ?>"> 
      <input type="hidden" name="attribute" value="<?php echo $_GET['name']; ?>">     
      
      <button class="btn btn-lg btn-primary btn-block" name="editSubmit" type="submit">Submit</button> <br>    
      <label class="error"> <?php echo $error; ?><label> 
    </form>
  </div>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>