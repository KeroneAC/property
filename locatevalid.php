<?php 
include_once 'includes/config.php';
session_start(); //start session


if(isset($_POST['locatSubmit'])){

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

			header("Location: location.php");
		} else
		{
			

			//insert data into property table
			$sql = "INSERT INTO property (address1, address2, bathroom, bedroom, b_type, city, img, l_type, parish, price, p_type, size, userid)
			VALUES ('$address1', '$address2', $bathroom, $bedroom, '$Btype', '$city', '$fileNameNew', '$Ltype', '$parish','$price', '$property', $size, '$idUSERS' )";

			mysqli_query($conn, $sql);
			//restrieve most recent property

			//select property data
			$sql="SELECT max(idProperty) AS pid FROM property";

			$stmt = mysqli_stmt_init($conn);

			mysqli_stmt_prepare($stmt, $sql);
			mysqli_stmt_execute($stmt);

			$result = mysqli_stmt_get_result($stmt);

			$row= mysqli_fetch_assoc($result);

			$id = $row['pid'];


			//insert data into gallery table
			$sql = "INSERT INTO gallery (propertyid, pictureurl)
			VALUES ('$id','$fileNameNew')";

			mysqli_query($conn, $sql);
			
			
			header("Location: index.php");
			
		}


	}
	?>