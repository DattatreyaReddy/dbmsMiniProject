<?php
require('../../../db.php');
$accountID=$_REQUEST['accountID'];
$customerID=$_REQUEST['customerID'];
$query = "DELETE FROM accountDetails WHERE accountID=$accountID"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: view.php?customerID=$customerID"); 
?>