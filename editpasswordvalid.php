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
		if(!password_verify($oldpword, $_SESSION['pword'])){

			$_SESSION['error']="Old password is incorrect";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		}

		if(strlen($newpword) < 6){

			$_SESSION['error']="Passwords must be at least 6 characters";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		}  else if($newpword != $confirmpword){

			$_SESSION['error']="Passwords do not match";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		}








		//check for errors
		if($errFlag == 1 ){

			header("Location: editpassword.php");

		} else{

			$hashedpwd = password_hash($newpword, PASSWORD_DEFAULT);

			$uid = $_SESSION['idUSERS'];

			$_SESSION['pword'] = $hashedpwd;

			$sql = "UPDATE users SET pword = '$hashedpwd' WHERE idUSERS = $uid";
		
			mysqli_query($conn, $sql);


			header("Location: edit-account.php");
		}

}

?>