<?php
require('../../db.php');
include("../auth.php");
$employeeID=$_REQUEST['employeeID'];
$query = "SELECT * from employee where employeeID='".$employeeID."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="../../css/style.css" />
</head>
<body>
<div class="form">
<p><a href="../dashboard.php">Dashboard</a> 
| <a href="insert.php">Add New Employee Record</a> 
| <a href="../../logout.php">Logout</a></p>
<h1>Update Employee Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$employeeID=$_REQUEST['employeeID'];
$employeeName =$_REQUEST['employeeName'];
$employeeContact =$_REQUEST['employeeContact'];

$update="update employee set employeeName='".$employeeName."',
employeeContact='".$employeeContact."' where employeeID='".$employeeID."'";
$res = mysqli_query($con, $update) or die(mysqli_error());
if (!$res){
    echo "<div class='form'>
    <h3>Employee Name & password already exists.</h3>";
    $status = "Record NOT Updated.";
}else{
$status = "Record Updated Successfully.";
}
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="employeeID" type="hidden" value="<?php echo $row['employeeID'];?>" />
<p><input type="text" name="employeeName" placeholder="Enter Employee Name" 
required value="<?php echo $row['employeeName'];?>" /></p>
<p><input type="text" name="employeeContact" placeholder="Enter Employee Contact" 
required pattern = [0-9]{10} value="<?php echo $row['employeeContact'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
<a href = 'view.php'>Go Back</a>
</div>
</div>
</body>
</html>