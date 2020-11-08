<?php
session_start();
if(!isset($_SESSION["branchName"])){
header("Location: login.php");
exit(); }
?>