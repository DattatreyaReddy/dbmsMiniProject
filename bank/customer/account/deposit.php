<?php
require('../../db.php');
include("../auth.php");
$accountID=$_REQUEST['accountID'];
$query = "SELECT * from accountDetails where accountID='".$accountID."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Deposit Money - Padya Bank</title>
<link rel="stylesheet" href="../../css/style.css" />
</head>
<body>
<div class="form">
<p><a href="../dashboard.php">Dashboard</a>
| <a href="../../logout.php">Logout</a></p>
<?php echo "<h1>Deposit Money in Account Number - ".$accountID."</h1>";
?>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$accountID=$_REQUEST['accountID'];
$amount =$_REQUEST['amount'];

$update="update `accountDetails` set balance=balance + '".$amount."' where accountID='".$accountID."'";
$res = mysqli_query($con, $update) or die(mysqli_error());
if (!$res){
    $status = "Failed to Deposit Your Money. Please try again";
}else{
    $status = "Money Deposited Successfully.";
}
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<h2>Your Account Balance - <?php echo $row['balance'];?></h2>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="accountID" type="hidden" value="<?php echo $row['accountID'];?>" />
<p><input type="number" name="amount" min="1" placeholder="Amount in Rs/-" required /></p>
<p><input name="submit" type="submit" value="Deposit" /></p>
</form>
<?php } ?>
<a href = 'view.php'>Go Back</a>
</div>
</div>
</body>
</html>