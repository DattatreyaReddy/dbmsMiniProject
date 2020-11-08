<?php
require('../../db.php');
include("../auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){

    $customerName =$_REQUEST['customerName'];
    $customerContact = $_REQUEST['customerContact'];
    $customerAddress = $_REQUEST['customerAddress'];
    $employeeID = $_SESSION['employeeID'];
    $password = $_REQUEST['password'];
    $ins_query="insert into `customer`
    (`customerName`,`customerContact`,`customerAddress`,`employeeID`,`password`) values
    ('$customerName','$customerContact','$customerAddress','$employeeID','".md5($password)."')";
    $rows = mysqli_query($con,$ins_query);

    if (!$rows){
    $status = "Customer Name & password already exists.Please Try again";
    }else{
        $status = "New Employee Data Recorded Successfully.";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add New Customer Record - Padya Bank</title>
<link rel="stylesheet" href="../../css/style.css" />
</head>
<body>
<div class="form">
<p><a href="../dashboard.php">Dashboard</a> 
| <a href="view.php">View Customer list</a> 
| <a href="../../logout.php">Logout</a></p>
<div>
<h1>Add New Customer Details</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="customerName" placeholder="Customer Name" required /></p>
<p><input type="password" name="password" placeholder="Password" required /></p>
<p><input type="text" name="customerContact" placeholder="Customer contact number" pattern = [0-9]{10} required /></p>
<p><input type="text" name="customerAddress" placeholder="Customer Address" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status;?></p>
</div>
<br><a href="../dashboard.php">Go back</a>
</div>
</body>
</html>