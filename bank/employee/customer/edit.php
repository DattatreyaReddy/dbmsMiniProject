<?php
require('../../db.php');
include("../auth.php");
$customerID=$_REQUEST['customerID'];
$query = "SELECT * from customer where customerID='".$customerID."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Customer Details - Padya Bank</title>
<link rel="stylesheet" href="../../css/style.css" />
</head>
<body>
<div class="form">
<p><a href="../dashboard.php">Dashboard</a> 
| <a href="insert.php">Add New Customer Record</a> 
| <a href="../../logout.php">Logout</a></p>
<h1>Update Customer Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$customerID=$_REQUEST['customerID'];
$customerName =$_REQUEST['customerName'];
$customerContact =$_REQUEST['customerContact'];
$customerAddress =$_REQUEST['customerAddress'];

$update="update customer set customerName='".$customerName."',
customerContact='".$customerContact."', customerAddress='".$customerAddress."' where customerID='".$customerID."'";
$res = mysqli_query($con, $update) or die(mysqli_error());
if (!$res){
    $status = "Customer Name & password already exists.Record NOT Updated.";
}else{
    $status = "Record Updated Successfully.";
}
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="customerID" type="hidden" value="<?php echo $row['customerID'];?>" />
<p><input type="text" name="customerName" placeholder="Enter Customer Name" 
required value="<?php echo $row['customerName'];?>" /></p>
<p><input type="text" name="customerContact" placeholder="Enter Customer Contact" 
required pattern = [0-9]{10} value="<?php echo $row['customerContact'];?>" /></p>
<p><input type="text" name="customerAddress" placeholder="Enter Customer Address" 
required value="<?php echo $row['customerAddress'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
<a href = 'view.php'>Go Back</a>
</div>
</div>
</body>
</html>