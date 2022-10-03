<?php 
include_once('config.php');

//Variables
$error_count = 0;


$error_password = "";
$error_email = "";


if(isset($_POST['signup'])){
	$username = htmlspecialchars(trim($_POST['signupUsername']));
	$userpassword = htmlspecialchars(trim($_POST['signupPassword']));
	$confirmPassword = htmlspecialchars(trim($_POST['confirm_password']));
	$useremail = htmlspecialchars(trim($_POST['signupEmail']));


	//Error checking the registration form


	//Query the database
	if ($error_count == 0)
	{
		$sql = "INSERT INTO `USER`(`username`, `password`, `email`) VALUES ('$username','$userpassword','$useremail')";


		if(mysqli_query($conn,$sql)){

			// Check connection
			if (mysqli_connect_errno())
			{
				echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
			}
			else
			{
			//SQL Querry to Database
			$sql2 = "SELECT ID, email, username
			FROM USER
			where email = '$useremail'";

				if(mysqli_query($conn,$sql))
				{

					// Check connection
					if (mysqli_connect_errno())
					{
						echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
					}
					else
					{
						if(!$result = $conn->query($sql2)){
							echo "<p>There was an error running the query [" . mysqli_error($conn) . "]</p>";
						}  
						else {
							//Set up session to login user after they register.
							session_start();
				   
							$row = $result->fetch_assoc();
				   
							 $_SESSION['logged_in_id'] = $row["ID"];
							 $_SESSION['logged_in_email'] = $row["email"];
							 $_SESSION['logged_in_username'] = $row["username"];
			
							 //Once registration is complete, goto the confirmation page.
							echo "Registration Sucessful!";
							header("Location: registration-successful.php");
							exit;
						}
					}
				}			
			}
		}
		else 
		{
			echo "Error: " . $sql . ":-" . mysqli_error($conn);
		}
	}
	mysqli_close($conn);
}


?>


