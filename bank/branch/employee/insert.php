<?php
require('../../db.php');
include("../auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){

    $employeeName =$_REQUEST['employeeName'];
    $employeeContact = $_REQUEST['employeeContact'];
    $password = $_REQUEST['password'];
    $branchID = $_SESSION["branchID"];
    $ins_query="insert into `employee`
    (`employeeName`,`employeeContact`,`branchID`,`password`) values
    ('$employeeName','$employeeContact','$branchID','".md5($password)."')";
    $rows = mysqli_query($con,$ins_query);

    if (!$rows){

    echo "<div class='form'>
    <h3>Employee Name & password already exists.</h3></div>";
    $status = "Please Try again";
    }else{
        $status = "New Employee Data Recorded Successfully.";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add New Employee Record - Padya Bank</title>
<link rel="stylesheet" href="../../css/style.css" />
</head>
<body>
<div class="form">
<p><a href="../dashboard.php">Dashboard</a> 
| <a href="view.php">View Employee list</a> 
| <a href="../../logout.php">Logout</a></p>
<div>
<h1>Add New Employee Details</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="employeeName" placeholder="Employee Name" required /></p>
<p><input type="text" name="employeeContact" placeholder="Employee contact number" pattern = [0-9]{10} required /></p>
<p><input type="password" name="password" placeholder="Password" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
<br><a href="../dashboard.php">Go back</a>
</div>
</body>
</html>