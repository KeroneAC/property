<?php 
include_once 'includes/config.php';
session_start(); //start session


if(isset($_POST['uploadSubmit'])){

	$file = $_FILES['img'];

	$fileName = $_FILES['img']['name'];
	$fileTmpName = $_FILES['img']['tmp_name'];
	$fileSize = $_FILES['img']['size'];
	$fileError = $_FILES['img']['error'];
	$fileType = $_FILES['img']['type'];

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

	if( $_GET["pid"]) {


		$pid = $_GET["pid"];

      //INSERT IMAGE INTO GALLERY
		$sql="INSERT INTO gallery (propertyid, pictureurl) VALUES ('$pid','$fileNameNew')";

		$stmt = mysqli_stmt_init($conn);

		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_execute($stmt);

		header("Location: details.php?pid=$pid");

	}
}
	?>