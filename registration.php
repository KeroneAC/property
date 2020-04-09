<?php
	
	$title="Registration";
	$style='';
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
			<h1 class="well">Registration Form</h1>
			<div class="col-lg-12 well">
				<div class="row">
					<form  action = "regisvalid.php" id="regisform" method = "POST">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-6 form-group">
									<label>First Name</label> <label class="error"> <?php echo $fnameErr; ?></label>
									<input type="text" name="fname" placeholder="Enter First Name Here.." value="<?php echo $fname; ?>" class="form-control">
								</div>
								<div class="col-sm-6 form-group">
									<label>Last Name</label> <label class="error"> <?php echo $lnameErr; ?></label>
									<input type="text"  name="lname" placeholder="Enter Last Name Here.." value="<?php echo $lname; ?>" class="form-control">
								</div>
							</div>					

							<div class="row">
								<div class="col-sm-6 form-group">
									<label>Username</label> <label class="error"> <?php echo $usernameErr; ?></label>
									<input type="text" name="username" placeholder="Enter unique username Here.." value="<?php echo $username; ?>" class="form-control">
								</div>


								<div class="col-sm-6 form-group">
									<label>Phone Number</label> <label class="error"> <?php echo $telNumErr; ?></label>
									<input type="text" name="telNum" placeholder="Enter Phone Number Here.." value="<?php echo $telNum; ?>" class="form-control">
								</div>
							</div>

							<div class="form-group">
								<label>Email Address</label> <label class="error"> <?php echo $emailErr; ?></label>
								<input type="text" name="email" placeholder="Enter Email Address Here.." value="<?php echo $email; ?>"class="form-control">
							</div>	

							<div class="row">
								<div class="col-sm-6 form-group">
									<label>Password</label> <label class="error"> <?php echo $passwordErr; ?></label>
									<input type="password" name="password1" placeholder="Enter Password Here.." class="form-control">
								</div>		
								<div class="col-sm-6 form-group">
									<label>Confirm Password</label>
									<input type="password" name="password2" placeholder="Confirm Here.." class="form-control">
								</div>	
							</div> 

							<button type="submit" class="btn btn-lg btn-info" name="btnSubmit" value="submit">Submit</button>		
						</div>
					</form> 
				</div>
			</div>
		</div>

			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>