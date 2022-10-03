<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1, width=device-width, initial-scale=1">
    <meta http-equiv = "refresh" content = "5; url = ./appHome?c=%" />
    <link href="CSS/send-it.css" rel="stylesheet" />
    <link href="CSS/registration-successful.css" rel="stylesheet" />
</head>
<body>
    <div id="login">
        <div id="logincontent">
            <div id="welcome">
                <img src="https://fontmeme.com/permalink/220721/9b4f20d59fdb0113a8729530820d6c63.png" alt="Send It!" id="site-logo">
                <h2>Messenger</h2>
                <button id="loginbtn" onclick="">Log In</button>
                <br>
                <button id="signupbtn" onclick="">Sign Up</button>
            </div>
        </div>

        <!--Login footer-->
        <div id="loginfooter">
            <h3> Send-it! Messenger - A basic messenger app! </h3>
        </div>
    </div>

    <!--Login and Sign up will be on a splash screen over everything-->
    <div id="splashscreen">
        <div id="splashbackground" onclick="">
        </div>

        <div id="splashform">
            <!--registration success-->
            <div id="successscreen">
                <br>
                <img src="https://fontmeme.com/permalink/220721/9b4f20d59fdb0113a8729530820d6c63.png" id="splashimage" />
                <h2>registration successful! You will be redirected automatically...</h2>
                <br>
                <a href="appHome.php">Redirect</a>
            </div>
        </div>
    </div>
    <script src="Scripts\index.js"></script>
</body>
</html>