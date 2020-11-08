<?php
require('../../../../db.php');
include("../../../auth.php");
$status = "";

$accountID =$_REQUEST['accountID'];
$customerID =$_REQUEST['customerID'];
if(isset($_POST['new']) && $_POST['new']==1){

    $amount = $_REQUEST['amount'];
	$trn_date = date("Y-m-d H:i:s");
    $ins_query="insert into `loan` (`accountID`,`amount`,`sanctionDate`,`amountSanctioned`) values ('$accountID','$amount','$trn_date','$amount')";
    $result = mysqli_query($con,$ins_query);
    $status = "<div class='form'>
    <h3>Loan Sanctioned</h3></div>";
    if (!$result){
        $status = "<h2>Loan Not Sanctioned</h2>";
    }
}?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Sanction New Loan - Padya Bank</title>
<link rel="stylesheet" href="../../../../css/style.css" />
</head>
<body>
<div class="form">
<p><a href="../../../dashboard.php">Dashboard</a> 
| <a href="../../insert.php">Add New Customer</a>
| <a href="../../../../logout.php">Logout</a></p>
<div>
<h1>Sanction New Loan</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="accountID" type="hidden" value="<?php echo $_REQUEST['accountID'];?>" />
<input name="CustomerID" type="hidden" value="<?php echo $_REQUEST['CustomerID'];?>" />
<p><input type="text" name="amount" placeholder="Loan Amount" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<br/>Click here to <a href="view.php?accountID=<?php echo $accountID;?>&customerID=<?php echo $customerID ?>">Go back</a>
<p style="color:#FF0000;"><?php echo $status;?></p>
</div>
<?php $status ?>
</div>
</body>
</html>