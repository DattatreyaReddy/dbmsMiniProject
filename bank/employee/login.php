<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Employee Login - Padya Bank</title>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<?php
require('../db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['employeeName'])){
        // removes backslashes
 $employeeName = stripslashes($_REQUEST['employeeName']);
        //escapes special characters in a string
 $employeeName = mysqli_real_escape_string($con,$employeeName);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 //Checking is user existing in the database or not
        $query = "SELECT employeeID FROM `employee` WHERE employeeName='$employeeName'
and password='".md5($password)."'";
 $result = mysqli_query($con,$query);
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['employeeName'] = $employeeName;
     $_SESSION['employeeID'] = mysqli_fetch_assoc($result)['employeeID'];
            // Redirect user to dashboard.php
     header("Location: dashboard.php");
         }else{
 echo "<div class='form'>
<h3>Employee Name/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
 }
    }else{
?>
<div class="form">
<h1>Employee Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="employeeName" placeholder="Employee Name" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<br><a href="../">Go back</a>
</div>
<?php } ?>
</body>
</html>