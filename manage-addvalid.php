<?php

include_once 'includes/config.php';



if(isset($_POST['btnAdd'])){

	$file = $_FILES['img'];

	$fileName = $_FILES['img']['name'];
	$fileTmpName = $_FILES['img']['tmp_name'];
	$fileSize = $_FILES['img']['size'];
	$fileError = $_FILES['img']['error'];
	$fileType = $_FILES['img']['type'];


		foreach($_POST as $key => $value)	//create local  AND SESSION variables based on $_POST keys and values
		{
			$$key = $value;
			$_SESSION[$key] = $value; //SESSION
		}

		foreach($_SESSION as $key => $value)
			{
				$$key = $value;
			}

		$_SESSION['address1Err']="*";
		$_SESSION['address2Err'] ="*";
		$_SESSION['cityErr'] ="*";
		$_SESSION['imgErr'] ="*";
		
		$_SESSION['bedroomErr']="*";
		$_SESSION['bathroomErr'] ="*";
		$_SESSION['sizeErr'] ="*";
		$_SESSION['priceErr'] ="*";
		
		
		var_dump($_SESSION); 

		//set error flag
		$errFlag = 0;
		$_SESSION['errFlag']=0;

		//validation
		if($address1 == ""){
			
			$_SESSION['address1Err']="Address is required";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		} 

		if($city == ""){
			
			$_SESSION['cityErr']="Please enter a city";

			$errFlag = 1;
			$_SESSION['errFlag']=1;

		} 

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

		$fileExt = explode('.',$fileName);
		$fileActualExt = strtolower(end($fileExt));

		if($fileError === 0){
			//create unique file name
			$fileNameNew = uniqid('', true).".".$fileActualExt;

			//store image
			$fileDestination = 'uploads/'.$fileNameNew;
			
			move_uploaded_file($fileTmpName, $fileDestination);

		}
		else{
			$_SESSION['imgErr']="Error uploading file";

			$errFlag = 1;
			$_SESSION['errFlag']=1;
		}

//check if there was an error
		if($errFlag == 1)
		{

			header("Location: manage-addproperties.php");
		} else
		{
			

			//insert data into db
			$sql = "INSERT INTO property (address1, address2, bathroom, bedroom, b_type, city, img, l_type, parish, price, p_type, size, userid)
			VALUES ('$address1', '$address2', $bathroom, $bedroom, '$Btype', '$city', '$fileNameNew', '$Ltype', '$parish','$price', '$property', '$size', '$userid')";

			mysqli_query($conn, $sql);
			
			
		}

}



?>