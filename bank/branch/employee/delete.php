<?php
require('../../db.php');
$employeeID=$_REQUEST['employeeID'];
$query = "DELETE FROM employee WHERE employeeID=$employeeID"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: view.php"); 
?>