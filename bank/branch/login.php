<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Manager Login - Padya Bank</title>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<?php
require('../db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['branchName'])){
        // removes backslashes
 $branchName = stripslashes($_REQUEST['branchName']);
        //escapes special characters in a string
 $branchName = mysqli_real_escape_string($con,$branchName);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 //Checking is user existing in the database or not
        $query = "SELECT branchID FROM `branch` WHERE branchName='$branchName'
and password='".md5($password)."'";
 $result = mysqli_query($con,$query);
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['branchName'] = $branchName;
     $_SESSION['branchID'] = mysqli_fetch_assoc($result)['branchID'];
            // Redirect user to dashboard.php
     header("Location: dashboard.php");
         }else{
 echo "<div class='form'>
<h3>Branch Name/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
 }
    }else{
?>
<div class="form">
<h1>Branch Manager Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="branchName" placeholder="Branch Name" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='reg.php'>Register Here</a></p>
<br><a href="../">Go back</a>
</div>
<?php } ?>
</body>
</html>