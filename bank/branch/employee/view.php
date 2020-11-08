<?php
require('../../db.php');
include("../auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Employees - Padya Bank</title>
<link rel="stylesheet" href="../../css/style.css" />
</head>
<body>
<div class="form">
<p><a href="../dashboard.php">Dashboard</a> 
| <a href="insert.php">Add New Employee</a> 
| <a href="../../logout.php">Logout</a></p>
<h1>View Employee Records</h1>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.no</strong></th>
<th><strong>ID</strong></th>
<th><strong>Name</strong></th>
<th><strong>Contact No</strong></th>
<th><strong>Branch</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from `employee`;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { 
    $branchID = $row["branchID"];
    $query="SELECT branchName FROM `branch` WHERE branchID='$branchID';";
    $result2 = mysqli_query($con,$query);
    $branchName = mysqli_fetch_assoc($result2);
    ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["employeeID"]; ?></td>
<td align="center"><?php echo $row["employeeName"]; ?></td>
<td align="center"><?php echo $row["employeeContact"]; ?></td>
<td align="center"><?php echo $branchName["branchName"]; ?></td>

<td align="center">
<a href="edit.php?employeeID=<?php echo $row["employeeID"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete.php?employeeID=<?php echo $row["employeeID"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
<br><a href="../dashboard.php">Go back</a>
</div>
</body>
</html>