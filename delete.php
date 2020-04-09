<?php 
//continue session
session_start();
include_once 'includes/config.php';

 $query = "
 DELETE FROM users 
 WHERE idUSERS = '".$_SESSION["idUSERS"]."'
 ";
 
 mysqli_query($conn, $query);

 header("Location: logout.php");

?>