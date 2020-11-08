<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Branch Registration - Padya Bank</title>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<title>Padya Bank</title>

<?php
require('../db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['branchName'])){
        // removes backslashes
	$branchName = stripslashes($_REQUEST['branchName']);
        //escapes special characters in a string
	$branchName = mysqli_real_escape_string($con,$branchName); 
        // removes backslashes
	$branchCity = stripslashes($_REQUEST['branchCity']);
        //escapes special characters in a string
	$branchCity = mysqli_real_escape_string($con,$branchCity); 
        // removes backslashes
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
        $query = "INSERT into `branch` (branchName,branchCity,password) 
        VALUES ('$branchName','$branchCity','".md5($password)."')";
        $result = mysqli_query($con,$query) or die(mysql_error());

        if($result){
                
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<p><input type="text" name="branchCity" placeholder="Branch City" required /></p>
<p><input type="text" name="branchName" placeholder="Branch Name" required /></p>
<p><input type="password" name="password" placeholder="Password" required /></p>
<p><input type="submit" name="submit" value="Register" /></p>
</form>
</div>
<?php } ?>
</body>
</html>