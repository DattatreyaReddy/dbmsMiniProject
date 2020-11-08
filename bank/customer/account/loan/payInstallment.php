<?php
require('../../../db.php');
include("../../auth.php");
$accountID=$_REQUEST['accountID'];
$loanID=$_REQUEST['loanID'];
$query = "SELECT * from `loan` where loanID='".$loanID."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$ramount = $row['amount']
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Pay Installment - Padya Bank</title>
<link rel="stylesheet" href="../../../css/style.css" />
</head>
<body>
<div class="form">
<p><a href="../../dashboard.php">Dashboard</a>
| <a href="../../../logout.php">Logout</a></p>
<?php echo "<h1>Pay Installment for Loan number - ".$loanID."</h1>";
?>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$accountID=$_REQUEST['accountID'];
$loanID=$_REQUEST['loanID'];
$amount =$_REQUEST['amount'];

$update="update `loan` set amount=amount - '".$amount."' where loanID='".$loanID."'";
$res = mysqli_query($con, $update) or die(mysqli_error());
$trn_date = date("Y-m-d H:i:s");
$query="insert into `payment` (`paymentDate`,`paymentAmount`,`remarks`,`loanID`) values ('$trn_date','$amount','Paid installment','$loanID');";
$res = mysqli_query($con, $query);
if (!$res){
    $status = "Failed to Pay Your Installment. Please try again";
}else{

    $status = "Installment paid Successfully.";
}
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<h2>Your Loan Amount - <?php echo $row['amount'];?></h2>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="accountID" type="hidden" value="<?php echo $row['accountID'];?>" />
<input name="loanID" type="hidden" value="<?php echo $row['loanID'];?>" />
<p><input type="number" name="amount" min="1" max="<?php echo $ramount ?>" placeholder="Amount in Rs/-" required /></p>
<p><input name="submit" type="submit" value="Deposit" /></p>
</form>
<?php } ?>
<a href = 'view.php?accountID=<?php echo $row["accountID"]; ?>'>Go Back</a>
</div>
</div>
</body>
</html>