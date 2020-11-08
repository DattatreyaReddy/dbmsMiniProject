<?php
require('../db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Manager Dashboard - Padya Bank</title>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<div class="form">
<h1>Welcome to Padya Bank.</h1>
<?php echo '<h2>'.$_SESSION['branchName'].' - Branch</h2>'?>
<p><a href="../index.php">Home</a><p>
<p><a href="employee/insert.php">Add Employee</a></p>
<p><a href="employee/view.php">View Employees</a><p>
<p><a href="loanList.php">View Loans</a><p>
<p><a href="../logout.php">Logout</a></p>
</div>
</body>
</html>