<?php
include_once('PHPscripts/config.php');

$recipientID = htmlspecialchars(trim($_POST["recipientID"]));
$senderID = htmlspecialchars(trim($_POST["senderID"]));
$message = htmlspecialchars(trim($_POST["message"]));


$sql = "INSERT INTO `message`(`sender`, `receiver`, `content`) VALUES ('$senderID','$recipientID','$message')";


		if(mysqli_query($conn,$sql)){
			//Get info from the new account for logging in
			//Attempt to connect to the database
			$db = mysqli_connect($servername,$username,$password,$dbname);

			// Check connection
			if (mysqli_connect_errno())
			{
				echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
			}
			else
			{
	            //Once registration is complete, goto the confirmation page.
			    header("Location: messenger?r=$recipientID");
			exit;
			}
				
			


		} else {
			echo "Error: " . $sql . ":-" . mysqli_error($conn);
		}
?>