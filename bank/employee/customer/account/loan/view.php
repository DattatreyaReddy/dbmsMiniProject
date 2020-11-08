<?php
require('../../../../db.php');
include("../../../auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Customer Loan- Padya Bank</title>
<link rel="stylesheet" href="../../../../css/style.css" />
</head>
<body>
<div class="form">
<p><a href="../../../dashboard.php">Dashboard</a> 
| <a href="../../insert.php">Add New Customer</a>
| <a href="../../../../logout.php">Logout</a></p>
<h1>View Customers Loans</h1>
<?php echo '<h2> Account No - '.$_REQUEST['accountID'].'</h2>' ?>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.no</strong></th>
<th><strong>Loan ID</strong></th>
<th><strong>Amount Sanctioned</strong></th>
<th><strong>Sanctioned Date</strong></th>
<th><strong>Amount to Pay</strong></th>
<th><strong>View Payments</strong></th>
<th><strong>Delete Loan</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$accountID=$_REQUEST['accountID'];
$customerID=$_REQUEST['customerID'];
$sel_query="Select * from `loan` where accountID = '".$accountID."';";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { 
    ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["loanID"]; ?></td>
<td align="center"><?php echo $row["amountSanctioned"]; ?></td>
<td align="center"><?php echo $row["sanctionDate"]; ?></td>
<td align="center"><?php echo $row["amount"]; ?></td>
<td align="center">
<a href="paymentView.php?loanID=<?php echo $row["loanID"]; ?>&accountID=<?php echo $row["accountID"]; ?>&customerID=<?php echo $customerID; ?>">View</a>
</td>
<td align="center">
<a href="delete.php?customerID=<?php echo $customerID ?>&loanID=<?php echo $row["loanID"]; ?>&accountID=<?php echo $row["accountID"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
<a href="insert.php?accountID=<?php echo $accountID ?>&customerID=<?php echo $customerID ?>">Sanction New loan</a>
<br><a href="../view.php?customerID=<?php echo $customerID ?>">Go Back</a>

</div>
</body>
</html>