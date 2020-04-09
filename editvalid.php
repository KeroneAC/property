<?php 

include_once 'includes/config.php';
	session_start(); //start session


	if(isset($_POST['editSubmit'])){

		
		foreach($_POST as $key => $value)	//create local  AND SESSION variables based on $_POST keys and values
		{
			$$key = $value;
			$_SESSION[$key] = $value; //SESSION
		}

		//reset error variable
		$_SESSION['error']="";

		//set error flag
		$errFlag = 0;
		$_SESSION['errFlag']=0;



		//validation
		if($column == 'username'){//username validation

			if (!ctype_alnum($newval)) {
   			// Username is invalid
			$_SESSION['error']="Only alphanumeric characters allowed";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		} else

		if(strlen($newval) < 7 or strlen($newval) > 25){

			// Username is invalid
			$_SESSION['error']="Must be between 7 to 25 characters";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		} else 
		if( check_userdb($newval, $conn) == 1){

			// Username is taken
			$_SESSION['error']="Username already taken";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		}


		}else if($column == 'fname' || $column == 'lname'){//name validation

			if(!preg_match("/^([a-zA-Z' ]+)$/",$newval)){

				$_SESSION['error']="Please enter valid name";

				$errFlag = 1;
				$_SESSION['errFlag']=1;

			}else{
				$newval = ucfirst($newval);
			}


		}else if($column == 'telnum'){

			if(!is_numeric($newval)){


			$_SESSION['error']="Please enter a valid number";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

			}


		}else if($column == 'email'){

			if (!filter_var($newval, FILTER_VALIDATE_EMAIL)) {

			$_SESSION['error']="Please enter a valid email address";

			$errFlag = 1;
			$_SESSION['errFlag']=1;
		}

		} else {

			$errFlag ==1;
			$_SESSION['error']="unknown error";

		}




		//check for errors
		if($errFlag == 1 ){

			header("Location: edit.php?name=$attribute&edit=$column&current=$preval");

		} else{

			$uid = $_SESSION['idUSERS'];

			$_SESSION[$column] = $newval;

			$sql = "UPDATE users SET $column = '$newval' WHERE idUSERS = $uid";
		
			mysqli_query($conn, $sql);


			header("Location: edit-account.php");
		}
		
	}

				function check_userdb($x, $con){

				$sql = 'SELECT username FROM users where username=?';
				$stmt = mysqli_stmt_init($con);

				if(!mysqli_stmt_prepare($stmt, $sql)){

					header("Location: ../edit.php?name=$attribute&edit=$column&current=$preval&error=sqlerror");
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


	?>