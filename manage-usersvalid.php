<?php
//manage-usersvalid.php


include_once 'includes/config.php';


	$input = filter_input_array(INPUT_POST);
	
	$username = mysqli_real_escape_string($conn, $input["username"]);
	$fname = mysqli_real_escape_string($conn, $input["fname"]);
	$lname = mysqli_real_escape_string($conn, $input["lname"]);
	$telnum = mysqli_real_escape_string($conn, $input["telnum"]);
	$email = mysqli_real_escape_string($conn, $input["email"]);
	
	
	if($input["action"] === 'edit')
{
 $query = "
 UPDATE users
 SET username = '".$username."', fname = '".$fname."', lname = '".$lname."', telnum = '".$telnum."', email = '".$email."'
 WHERE idUSERS= '".$input["idUSERS"]."'
 ";

 mysqli_query($conn, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM users
 WHERE idUSERS = '".$input["idUSERS"]."'
 ";
 mysqli_query($conn, $query);
}

echo json_encode($input);







?>