<?php
session_start();
if(!isset($_SESSION["customerName"])){
header("Location: login.php");
exit(); }
?>