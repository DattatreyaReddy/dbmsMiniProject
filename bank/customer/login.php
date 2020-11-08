<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Customer Login - Padya Bank</title>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<?php
require('../db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['customerName'])){
        // removes backslashes
 $customerName = stripslashes($_REQUEST['customerName']);
        //escapes special characters in a string
 $customerName = mysqli_real_escape_string($con,$customerName);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 //Checking is user existing in the database or not
        $query = "SELECT customerID FROM `customer` WHERE customerName='$customerName'
and password='".md5($password)."'";
 $result = mysqli_query($con,$query);
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['customerName'] = $customerName;
     $_SESSION['customerID'] = mysqli_fetch_assoc($result)['customerID'];
            // Redirect user to dashboard.php
     header("Location: dashboard.php");
         }else{
 echo "<div class='form'>
<h3>customer Name/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
 }
    }else{
?>
<div class="form">
<h1>Customer Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="customerName" placeholder="Customer Name" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<br><a href="../">Go back</a>
</div>
<?php } ?>
</body>
</html>