<?php
require('../../../db.php');
include("../../auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Customer Loan- Padya Bank</title>
<link rel="stylesheet" href="../../../css/style.css" />
</head>
<body>
<div class="form">
<p><a href="../../dashboard.php">Dashboard</a> 
| <a href="../../../logout.php">Logout</a></p>
<h1>View Your Loans</h1>
<?php echo '<h2> Account No - '.$_REQUEST['accountID'].'</h2>' ?>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.no</strong></th>
<th><strong>Loan ID</strong></th>
<th><strong>Amount Sanctioned</strong></th>
<th><strong>Sanctioned Date</strong></th>
<th><strong>Amount to Pay</strong></th>
<th><strong>Payments History</strong></th>
<th><strong>Pay Installment </strong></th>

</tr>
</thead>
<tbody>
<?php
$count=1;
$accountID=$_REQUEST['accountID'];
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
<a href="paymentView.php?loanID=<?php echo $row["loanID"]; ?>&accountID=<?php echo $row["accountID"]; ?>">View</a>
</td>
<td align="center">
<a href="payInstallment.php?loanID=<?php echo $row["loanID"]; ?>&accountID=<?php echo $row["accountID"]; ?>">Pay</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
<br><a href="../view.php">Go Back</a>
</div>
</body>
</html>