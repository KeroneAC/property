<?php

include_once 'includes/config.php';

if(isset($_POST['btnSave'])){


		foreach($_POST as $key => $value)	//create local  AND SESSION variables based on $_POST keys and values
		{
			$$key = $value;
			$_SESSION[$key] = $value; //SESSION
		}

		$_SESSION['fnameErr']="*";
		$_SESSION['lnameErr'] = "*";
		$_SESSION['telNumErr'] ="*";
		$_SESSION['emailErr'] = "*";
		$_SESSION['passwordErr'] = "*";
		$_SESSION['usernameErr'] = "*";
		
		var_dump($_SESSION);

		//set error flag
		$errFlag = 0;
		$_SESSION['errFlag']=0;

		//validation

	if($fname == null){
			
			$_SESSION['fnameErr']="Name is required";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		} else{

			$fname = test_input($fname);
		}

		if($lname == null){

			$_SESSION['lnameErr']="Name is required";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		}
		else{

			$lname = test_input($lname);
		}

		if($telNum == null){

			$_SESSION['telNumErr']="Phone Number is required";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		}

		if($username == null){

			$_SESSION['usernameErr']="Username is required";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		}else 

		if (!ctype_alnum($username)) {
   			// Username is valid
			$_SESSION['usernameErr']="Only alphanumeric characters allowed";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		} else

		if(strlen($username) < 7 or strlen($username) > 25){

			// Username is valid
			$_SESSION['usernameErr']="Must be between 7 to 25 characters";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		} else 
		if( check_userdb($username, $conn) == 1){

			// Username is taken
			$_SESSION['usernameErr']="Username already taken";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		}


		if($email == null){

			$_SESSION['emailErr']="Email address is required";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			$_SESSION['emailErr']="Please enter a valid email address";

			$errFlag = 1;
			$_SESSION['errFlag']=1;
		} 

		if($password1 == null){

			$_SESSION['passwordErr']="Password is required";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		} else if(strlen($password1) < 6){

			$_SESSION['passwordErr']="Passwords must be at least 6 characters";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		}  else if($password1 != $password2){

			$_SESSION['passwordErr']="Passwords do not match";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		}


		//check if there was an error
		if($errFlag == 1)
		{
			//session_destroy();
			header("Location: manage-users.php");

		} else
		{
			$hashedpwd = password_hash($password1, PASSWORD_DEFAULT);

			//insert data into database
			$sql = "INSERT INTO users (username, fname, lname, pword, telnum, email)
			Values ('$username','$fname', '$lname','$hashedpwd','$telNum', '$email' )";

			mysqli_query($conn, $sql);

			//session_destroy();
			//session_start();


			}
		}
		
			
		function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
////////////////////////////////////////////////////////////////////
function check_userdb($x, $con){

				$sql = 'SELECT username FROM users where username=?';
				$stmt = mysqli_stmt_init($con);

				if(!mysqli_stmt_prepare($stmt, $sql)){

					header("Location: ../manage-users.php?error=sqlerror");
					exit();
				}
				else {

					mysqli_stmt_bind_param($stmt,"s", $x);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);

					$resultcheck = mysqli_stmt_num_rows($stmt);

					return $resultcheck;

				}
			}

/////////////////////////////////////////////////////////////////////////////////////////
?>