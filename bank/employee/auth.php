<?php
session_start();
if(!isset($_SESSION["employeeName"])){
header("Location: login.php");
exit(); }
?>