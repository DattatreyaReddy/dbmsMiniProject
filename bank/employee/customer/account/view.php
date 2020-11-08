<?php
require('../../../db.php');
include("../../auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Customer Accounts- Padya Bank</title>
<link rel="stylesheet" href="../../../css/style.css" />
</head>
<body>
<div class="form">
<p><a href="../../dashboard.php">Dashboard</a> 
| <a href="../insert.php">Add New Customer</a> 
| <a href="../../../logout.php">Logout</a></p>
<h1>View Customers Accounts</h1>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.no</strong></th>
<th><strong>Account No</strong></th>
<th><strong>Balance</strong></th>
<th><strong>View Loans</strong></th>
<th><strong>Delete Account</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$customerID=$_REQUEST['customerID'];
$sel_query="Select * from `accountDetails` where customerID = '".$customerID."';";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { 
    ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["accountID"]; ?></td>
<td align="center"><?php echo $row["balance"]; ?></td>
<td align="center">
<a href="loan/view.php?accountID=<?php echo $row["accountID"]; ?>&customerID=<?php echo $customerID; ?>">View</a>
</td>
<td align="center">
<a href="delete.php?accountID=<?php echo $row["accountID"]; ?>&customerID=<?php echo $customerID; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
<a href="insert.php?customerID=<?php echo $customerID; ?>">Add New Account</a>
<br><a href="../view.php">Go back</a>

</div>
</body>
</html>