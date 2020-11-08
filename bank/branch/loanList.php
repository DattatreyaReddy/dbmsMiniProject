<?php
require('../db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Customer - Padya Bank</title>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a>
| <a href="../logout.php">Logout</a></p>
<h1>View Loan Records</h1>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.no</strong></th>
<th><strong>Customer ID</strong></th>
<th><strong>Name</strong></th>
<th><strong>Account Number</strong></th>
<th><strong>Loan ID</strong></th>
<th><strong>Loan Sanctioned Date</strong></th>
<th><strong>Loan Sanctioned amount</strong></th>
<th><strong>Loan Balance Amount</strong></th>

</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="select * from customer join accountDetails join loan on 
                customer.customerID = accountDetails.customerID and 
                loan.accountID = accountDetails.accountID;";
$result = mysqli_query($con,$sel_query);
$tot_query = "select sum(amount) as totalAmount from loan;";
$result1 = mysqli_query($con,$tot_query);
$row2 = mysqli_fetch_assoc($result1);
while($row = mysqli_fetch_assoc($result)) { 
    ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["customerID"]; ?></td>
<td align="center"><?php echo $row["customerName"]; ?></td>
<td align="center"><?php echo $row["accountID"]; ?></td>
<td align="center"><?php echo $row["loanID"]; ?></td>
<td align="center"><?php echo $row["sanctionDate"]; ?></td>
<td align="center"><?php echo $row["amountSanctioned"]; ?></td>
<td align="center"><?php echo $row["amount"]; ?></td>
<td align="center">
</tr>
<?php $count++; } ?>
</tbody>
</table>
<h2>Total Balance loan amount of Customers - Rs.<?php echo $row2['totalAmount'];?></h2>
<br><a href="dashboard.php">Go back</a>
</div>
</body>
</html>