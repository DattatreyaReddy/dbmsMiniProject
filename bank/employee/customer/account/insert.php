<?php
require('../../../db.php');
$customerID=$_REQUEST['customerID'];
$query = "INSERT INTO `accountDetails` (`customerID`) values ('$customerID')"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: view.php?customerID=$customerID"); 
?>