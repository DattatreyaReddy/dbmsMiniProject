<?php
require('../db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Employee Dashboard - Padya Bank</title>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<div class="form">
<h1>Welcome to Padya Bank.</h1>
<?php echo '<h2> Employee - '.$_SESSION['employeeName'].'</h2>'?>
<p><a href="../index.php">Home</a><p>
<p><a href="customer/view.php">View Customer</a><p>
<p><a href="customer/insert.php">Add NEW Customer</a><p>
<p><a href="reset.php">Reset Password</a><p>
<p><a href="../logout.php">Logout</a></p>
</div>
</body>
</html>