<?php
require('../../db.php');
$customerID=$_REQUEST['customerID'];
$query = "DELETE FROM customer WHERE customerID=$customerID"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: view.php"); 
?>