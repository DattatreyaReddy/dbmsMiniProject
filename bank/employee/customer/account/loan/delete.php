<?php
require('../../../../db.php');
$loanID=$_REQUEST['loanID'];
$accountID=$_REQUEST['accountID'];
$query = "DELETE FROM loan WHERE loanID=$loanID"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: view.php?accountID=$accountID&customerID=$customerID"); 
?>