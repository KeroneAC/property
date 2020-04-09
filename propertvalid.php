<?php 


	session_start(); //start session

	if(isset($_POST['descSubmit'])){

		
		foreach($_POST as $key => $value)	//create local  AND SESSION variables based on $_POST keys and values
		{
			$$key = $value;
			$_SESSION[$key] = $value; //SESSION
		}

		$_SESSION['bedroomErr']="*";
		$_SESSION['bathroomErr'] ="*";
		$_SESSION['sizeErr'] ="*";
		$_SESSION['priceErr'] ="*";
	
		

		//set error flag
		$errFlag = 0;
		$_SESSION['errFlag']=0;

		//validation

		if($bedroom == ""){
			
			$_SESSION['bedroomErr']="Please enter a value";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		} 

		if($bathroom == ""){
			
			$_SESSION['bathroomErr']="Please enter a value ";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		} 

		if($price == ""){
			
			$_SESSION['priceErr']="Please enter a value";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		} 

		if($size == ""){
			
			$_SESSION['sizeErr']="Please enter a value";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		} 




		//check if there was an error
		if($errFlag == 1)
		{
			
			header("Location: description.php");
		} else
		{
			
			header("Location: location.php");
			
		}


	}
	

	?>