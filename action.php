<?php  
//action.php

include_once 'includes/config.php';

$input = filter_input_array(INPUT_POST);


$p_type = mysqli_real_escape_string($conn, $input["p_type"]);
$bedroom = mysqli_real_escape_string($conn, $input["bedroom"]);
$bathroom = mysqli_real_escape_string($conn, $input["bathroom"]);
$size = mysqli_real_escape_string($conn, $input["size"]);
$b_type = mysqli_real_escape_string($conn, $input["b_type"]);
$l_type = mysqli_real_escape_string($conn, $input["l_type"]);
$price = mysqli_real_escape_string($conn, $input["price"]);
$address1 = mysqli_real_escape_string($conn, $input["address1"]);
$address2 = mysqli_real_escape_string($conn, $input["address2"]);
$city = mysqli_real_escape_string($conn, $input["city"]);
$parish = mysqli_real_escape_string($conn, $input["parish"]);


if($input["action"] === 'edit')
{
 $query = "
 UPDATE property 
 SET p_type = '".$p_type."', bedroom = '".$bedroom."', bathroom = '".$bathroom."', size = '".$size."', b_type = '".$b_type."', l_type = '".$l_type."', address1 = '".$address1."', address2 = '".$address2."', city = '".$city."', parish = '".$parish."', price = '".$price."'
 WHERE idProperty = '".$input["idProperty"]."'
 ";

 mysqli_query($conn, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM property 
 WHERE idProperty = '".$input["idProperty"]."'
 ";
 mysqli_query($conn, $query);
}

echo json_encode($input);

?>