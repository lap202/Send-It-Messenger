<?php
include_once('config.php');
   
   $loginError = '';
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = htmlspecialchars(trim($_POST['loginUsername']));
    $userPassword = htmlspecialchars(trim($_POST['loginpassword']));

    $error_count = 0;

    if(empty($username)) {
        $loginError .='<br><p class="error">Please Enter your username.</p>';
        $error_count++;
    }
    if(empty($userPassword)) {
        $loginError .='<br><p class="error">Please Enter your password.</p>';
        $error_count++;
    }
    

    if ($error_count == 0) {
      // Check connection
     if (mysqli_connect_errno())
     {
         echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
     }
     else
     {

     //SQL Querry to Database
     $sql = "SELECT *
     FROM user
     WHERE username LIKE '$username'";

     if(!$result = $conn->query($sql)){
         echo "<p>There was an error running the query [" . mysqli_error($conn) . "]</p>";
     }  
     else {

         while($row = $result->fetch_assoc()){
            $returnPassword = $row["password"];

            if ($userPassword == $returnPassword)
            {
                session_start();
                $_SESSION['logged_in_id'] = $row["ID"];;
                $_SESSION['logged_in_email'] = $row["email"];
                $_SESSION['logged_in_username'] = $row["username"];


                header("Location: appHome?c=%");
			    exit;
            }
            else
            {
                $loginError = '<p class="error">The Username or Password you entered is incorrect.</p>';
            }


            
            
         }
         }
         }
    }
}
    ?>