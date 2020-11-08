<?php
require('../../db.php');
include("../auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Your Accounts- Padya Bank</title>
<link rel="stylesheet" href="../../css/style.css" />
</head>
<body>
<div class="form">
<p><a href="../dashboard.php">Dashboard</a>
| <a href="../../logout.php">Logout</a></p>
<h1>Your Accounts</h1>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.no</strong></th>
<th><strong>Account No</strong></th>
<th><strong>Balance</strong></th>
<th><strong>Deposit</strong></th>
<th><strong>Withdraw</strong></th>

<th><strong>View Loans</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$customerID=$_SESSION['customerID'] ;
$sel_query="Select * from `accountDetails` where customerID = '".$customerID."';";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { 
    ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["accountID"]; ?></td>
<td align="center"><?php echo $row["balance"]; ?></td>
<td align="center">
<a href="deposit.php?accountID=<?php echo $row["accountID"]; ?>">Deposit</a>
</td><td align="center">
<a href="withdraw.php?accountID=<?php echo $row["accountID"]; ?>">Withdraw</a>
</td>
<td align="center">
<a href="loan/view.php?accountID=<?php echo $row["accountID"]; ?>">View</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
<br><a href="../dashboard.php">Go back</a>
</div>
</body>
</html>