<?php 
session_start();
//redirect to index if user not logged in.
if (!isset($_SESSION['logged_in_id']))
{
header("location: ./index.php");
exit;
}
else
{
//Set variables for use throughout our app
$sessionId = $_SESSION['logged_in_id'];
$sessionEmail = $_SESSION['logged_in_email'];
$sessionUsername = $_SESSION['logged_in_username'];
}
?>