<?php
require('../db.php');
include("auth.php");
$employeeID=$_SESSION['employeeID'];
$employeeName =  $_SESSION['employeeName']; 
$query = "SELECT * from employee where employeeID='".$employeeID."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Reset Password - Padya Bank</title>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="../logout.php">Logout</a></p>
<h1>Reset Password</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$employeeID=$_REQUEST['employeeID'];
$employeeName =$_REQUEST['employeeName'];
$oldPassword =$_REQUEST['oldPassword'];
$newPassword =$_REQUEST['newPassword'];
$pass_query = "SELECT password FROM `employee` WHERE employeeID='$employeeID'";
 $pass_result = mysqli_query($con,$pass_query);

if (md5($oldPassword) == mysqli_fetch_assoc($pass_result)['password']){
$update="update employee set password='".md5($newPassword)."' where employeeID='".$employeeID."' and password = '".md5($oldPassword)."'";
$res = mysqli_query($con, $update) or die(mysqli_error());
}else{
    $res = 0;
}
if (!$res){
    echo "<div class='form'>
    <h3>Incorrect password.</h3>";
    $status = "Password Not Updated.";
}else{
$status = "Password Updated Successfully.";
}
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="employeeID" type="hidden" value="<?php echo $employeeID;?>" />
<input name="employeeName" type="hidden" value="<?php echo $employeeName;?>" />
<p><input type="password" name="oldPassword" placeholder="Old Password" required /></p>
<p><input type="password" name="newPassword" placeholder="New Password" required /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
<a href = 'dashboard.php'>Go Back</a>
</div>
</div>
</body>
</html>