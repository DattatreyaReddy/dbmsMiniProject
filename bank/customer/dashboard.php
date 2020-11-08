<?php
require('../db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Customer Dashboard - Padya Bank</title>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<div class="form">
<h1>Welcome to Padya Bank.</h1>
<?php echo '<h2> Customer - '.$_SESSION['customerName'].'</h2>'?>
<p><a href="../index.php">Home</a><p>
<p><a href="account/view.php">View Accounts</a><p>
<p><a href="reset.php">Reset Password</a><p>
<p><a href="../logout.php">Logout</a></p>
</div>
</body>
</html>