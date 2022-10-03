<?php
session_start();
include('PHPscripts/register.php');
include('PHPscripts/login.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1, width=device-width, initial-scale=1">
    <link href="CSS/send-it.css" rel="stylesheet" />
    
</head>
<body>
    <div id="login">
        <div id="logincontent">
            <div id="welcome">
                <img src="https://fontmeme.com/permalink/220721/9b4f20d59fdb0113a8729530820d6c63.png" alt="Send It!" id="site-logo">
                <h2>Messenger</h2>
                <button id="loginbtn" onclick="displayLoginScreen()">Log In</button>
                <br>
                <button id="signupbtn" onclick="displaySignUpScreen()">Sign Up</button>
            </div>
        </div>

        <!--Login footer-->
        <div id="loginfooter">
            <h3> Send-it! Messenger - A basic messenger app! </h3>
        </div>
    </div>

    <!--Login and Sign up will be on a splash screen over everything-->
    <div id="splashscreen">
        <div id="splashbackground" onclick="hideSplashScreen()">
        </div>

        <div id="splashform">
            <!--Log In Form-->
            <div id="loginscreen">
                <img src="https://fontmeme.com/permalink/220721/9b4f20d59fdb0113a8729530820d6c63.png" id="splashimage" />
                <h2>Login to Send It! Messenger</h2>
                <form id="loginform" action="" method="POST">
                    <label for="loginUsername">Username</label><br>
                    <input type="text" name="loginUsername" id="loginUsername" required>
                    <br><br>
                    <label for="loginpassword">Password</label><br>
                    <input type="password" name="loginpassword" id="loginpassword" required>
                    <br>
                    <?php echo $loginError?>
                    <br>
                    <input type="submit" name="login" class="btn btn-primary" value="Login" />
                </form>
                <br><br><br>
                <p>Don't have an account?</p>
                <a href="#" onclick="hideSplashScreen(); displaySignUpScreen()">Sign up!</a>
            </div>

            <!--Sign Up Form-->
            <div id="signupscreen">
                <br>
                <img src="https://fontmeme.com/permalink/220721/9b4f20d59fdb0113a8729530820d6c63.png" id="splashimage" />
                <h2>Sign up for Send It! Messenger</h2>
                <form id="signupform" action="" method="POST">
					<!--Username--->
                    <label for="signupUsername">Username</label><br>
                    <input type="text" name="signupUsername" id="signupUsername" required>
                    <br><br>
                
                    <!--email--->
                    <label for="signupEmail">Email</label><br>
                    <input type="email" name="signupEmail" id="signupEmail" required>
                    <br><br>
                    
					<!--password--->
                    <label for="signupPassword">Password</label><br>
                    <input type="password" name="signupPassword" id="signupPassword" required>
                    <br><br>
					
                    <!--confirm_password--->
                    <label for="confirm_password">Confirm Password</label><br>
                    <input type="password" name="confirm_password" id="confirm_password" required>
                    
                    <br><br><br>
					<!---submit--->
                    <input type="checkbox" name="terms" id="terms" required>
                    <label for="terms">I agree to the Send-It Terms of Service.</label>
					<!---submit--->					
                    <br><br>
                    <input type="submit" name="signup" class="btn btn-primary" value="Sign Up">
                </form>
                <br>
                <p>Already have an account?</p>
                <a href="#" onclick="hideSplashScreen(); displayLoginScreen();">Log In!</a>
            </div>
        </div>
    </div>
    <script src="Scripts\index.js"></script>
</body>
</html>