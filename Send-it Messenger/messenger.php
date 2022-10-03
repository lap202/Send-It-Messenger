<?php
include_once('PHPscripts/LoggedInToSession.php');
$recipientID=htmlspecialchars(trim($_GET['r']));
$sessionID = $_SESSION['logged_in_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1, width=device-width, initial-scale=1">
    <link href="CSS/send-it.css" rel="stylesheet" />
    <link href="CSS/app.css" rel="stylesheet" />
    
</head>
<body>
    <div id="app">
        <div id="appheader">
        <button id="logoutbtn" onclick="location='appHome?c=%'">Back</button>
            <button id="logoutbtn" onclick="location='PHPscripts/logout.php'">Log Out</button>
        </div>
        <div id="appcontent">
            <div id="welcome">
                <h2>Messenger</h2>
                <div id="messages">
                    <?php
                        $servername='localhost';
                        $username='root';
                        $password='';
                        $dbname = "senditmessenger";
                        $sessionID = $_SESSION['logged_in_id'];

                        //Attempt to connect to the database
                        $db = mysqli_connect($servername,$username,$password,$dbname);
                   
                        // Check connection
                        if (mysqli_connect_errno())
                        {
                            echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
                        }
                        else
                        {
                   
                        //SQL Querry to Database
                        $sql = "SELECT sender, receiver, content, datetime, username
                        FROM message
                        INNER JOIN user ON message.sender=user.ID
                        WHERE sender LIKE '$sessionID' OR receiver LIKE '$sessionID'
                        ORDER BY datetime ASC";
                   
                        if(!$result = $db->query($sql)){
                            echo "<p>There was an error running the query [" . mysqli_error($db) . "]</p>";
                        }  
                        else {
                   
                            while($row = $result->fetch_assoc()){
                             $senderUsername = $row["username"];
                             $content = $row["content"];
                             $datetime = $row["datetime"];
                   
                             
                   
                             echo "<h4>$senderUsername | $datetime</h4>
                                    <p>$content</p>";         
                            }
                            }
                            }
                    ?>
                </div>

                <div id="messenger">
                <form action="sendmessage.php" method="POST">
                    <input type="hidden" id="recipientID" name="recipientID" value="<?php echo $recipientID?>">
                    <input type="hidden" id="senderID" name="senderID" value="<?php echo $sessionID ?>">
                    <input type="text" id="message" name="message">
                    <button type="submit" name="senditBtn" id="senditBtn">Send it!</button>
                </form>
                </div>
            </div>
        </div>

        <!--footer-->
        <div id="appfooter">
            <h3> Send-it! Messenger - A basic messenger app! </h3>
        </div>
    </div>
    </div>
    <script src="Scripts\index.js"></script>
    <script src="Scripts\scroll.js"></script>
</body>
</html>