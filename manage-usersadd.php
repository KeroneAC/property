<?php

$title="Managment";
  $style='<link href="css/editpstyle.css" rel="stylesheet" type="text/css">';
  include 'template.php';
  include_once 'includes/config.php';

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
		$fname ="";
		$lname = "";
		$username = "";
		$telNum ="";
		$email = "";
		$password1 = "";
		$password2 = "";
		
	
		$fnameErr ="*";
		$lnameErr = "*";
		$usernameErr = "*";
		$telNumErr ="*";
		$emailErr = "*";
		$passwordErr = "*";
		
		
		
	}

  
?>

<div class="container">
      
	   <div class="col-md-12 well">
	   
			 <div class="row justify-content-center">
			 <h3 class ="text-center text-info">Add New User</h3>
			<form action = "manage-usersaddvalid.php" enctype="multipart/form-data" id="add-user" method ="POST">
		 <div class="form-group">
		 <label>Username</label><label class="error"> <?php echo $usernameErr; ?></label>
		 <input type ="text" name="username" class="form-control" value="<?php echo $username; ?>"  placeholder="Enter username...">
		 </div>
		 <div class = "form-group">
		 <label>First Name</label><label class="error"> <?php echo $fnameErr; ?></label>
		 <input type="text" name="fname" class = "form-control" value="<?php echo $fname; ?>" placeholder="Enter first name...">
		 </div>
		 <div class = "form-group">
		 <label>Last Name</label><label class="error"> <?php echo $lnameErr; ?></label>
		 <input type="text" name="lname" class = "form-control"value ="<?php echo $lname; ?>" placeholder="Enter last name...">
		 </div>
		 <div class = "form-group">
		 <label>Password</label> <label class="error"> <?php echo $passwordErr; ?></label>
		 <input type="text" name="password1" class = "form-control" value ="<?php echo $password1; ?>" placeholder="Enter password...">
		 </div>
		 <div class="form-group">
		 <label>Confirm Password</label>
		 <input type="password" name="password2" placeholder="Confirm Here.." class="form-control">
		 </div>	
		 <div class = "form-group">
		 <label>Phone Number</label> <label class="error"> <?php echo $telNumErr; ?></label>
		 <input type="text" name="telNum" class = "form-control" value="<?php echo $telNum; ?>" placeholder="Enter telephone #...">
		 </div>
		 <div class = "form-group">
		 <label>Email</label> <label class="error"> <?php echo $emailErr; ?></label>
		 <input type="email" name="email" class = "form-control" value="<?php echo $email; ?>" placeholder="Enter email...">
		 </div>
		 <div class = "form-group">
		 <button type ="submit" name ="btnSave" class="btn btn-primary btn-block"> Add User</button>
		 </div>
		 </div>
		 </form>
	</div>
</div>
		



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>