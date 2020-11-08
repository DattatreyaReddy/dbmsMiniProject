<?php
require('../../db.php');
include("../auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Customer - Padya Bank</title>
<link rel="stylesheet" href="../../css/style.css" />
</head>
<body>
<div class="form">
<p><a href="../dashboard.php">Dashboard</a> 
| <a href="insert.php">Add New Customer</a> 
| <a href="../../logout.php">Logout</a></p>
<h1>View Customer Records</h1>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.no</strong></th>
<th><strong>ID</strong></th>
<th><strong>Name</strong></th>
<th><strong>Contact No</strong></th>
<th><strong>Address</strong></th>
<th><strong>View Accounts</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from `customer`;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { 
    ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["customerID"]; ?></td>
<td align="center"><?php echo $row["customerName"]; ?></td>
<td align="center"><?php echo $row["customerContact"]; ?></td>
<td align="center"><?php echo $row["customerAddress"]; ?></td>
<td align="center">
<a href="account/view.php?customerID=<?php echo $row["customerID"]; ?>">View</a>
</td>
<td align="center">
<a href="edit.php?customerID=<?php echo $row["customerID"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete.php?customerID=<?php echo $row["customerID"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
<br><a href="../dashboard.php">Go back</a>
</div>
</body>
</html>