<?php 

include_once 'includes/config.php';
	session_start(); //start session

	if(isset($_POST['loginSubmit'])){

		
		foreach($_POST as $key => $value)	//create local  AND SESSION variables based on $_POST keys and values
		{
			$$key = $value;
			$_SESSION[$key] = $value; //SESSION
		}

		if(empty($loginUsername) || empty($loginPassword)){ //if fields are empty
			header("Location: login.php?error=emptyfields");
			exit();
		}
		else {
			$sql = "SELECT * FROM users WHERE username=? OR email=?;"; //statement 
			$stmt = mysqli_stmt_init($conn);

			if(!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: login.php?error=sqlerror");
				exit();
			}
			else {

				mysqli_stmt_bind_param($stmt, "ss", $loginUsername, $loginUsername);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);

				if($row = mysqli_fetch_assoc($result)){

					 

					if(password_verify($loginPassword, $row['pword'])){

						session_destroy();
						session_start();
						
						foreach($row as $key => $value)
							{							
								$_SESSION[$key] = $value; //SESSION
							}

							header("Location: index.php?login=success");

						
					} 
					else{
							
							
						header("Location: login.php?error=wrongpwd");

					} 
					 

}
else {

	header("Location: login.php?error=nouser");
	exit();
}
}
}
}

?>