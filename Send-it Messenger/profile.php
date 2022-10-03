<?php
include_once('PHPscripts/LoggedInToSession.php');
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
        <button id="logoutbtn" onclick="location='profile.php'">My Profile</button>
            <button id="logoutbtn" onclick="location='PHPscripts/logout.php'">Log Out</button>
        </div>
        <div id="appcontent">
            <div id="welcome">
                <h2>Messenger</h2>
                <div id="search">
                <div id="searchbar">
<p style="color: white; font-family: cursive;">Search for users to chat with:</p>
<form action="PHPscripts/search.php" method="POST">
<input type="text" id="userSearch" name="userSearch">
<button type="submit" id="searchForUserbtn" name="searchForUserbtn">-></button>
</form>
</div>

<!--Request cards generated for each request. Automatically sorts by Date.-->
<?php
    $searchCriteria=htmlspecialchars(trim($_GET['c']));
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "senditmessenger";

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
     $sql = "SELECT ID, username
     FROM user
     where username LIKE '%$searchCriteria%'";

     if(!$result = $db->query($sql)){
         echo "<p>There was an error running the query [" . mysqli_error($db) . "]</p>";
     }  
     else {

         while($row = $result->fetch_assoc()){
          $username = $row["username"];
          $userid = $row["ID"];

          echo "<div id=\"userCardContainer\">
          <div class=\"userCard\">
              <div class=\"column1\">
                  <img src=\"Images\user_placeholder.png\" class=\"userImage\">
                  <h3 id=\"cardTitle\">$username</h3>
              </div>
      
              <div class=\"column2\">
                  <form action=\"messenger?r=$userid\" method=\"POST\">
                      <input type=\"hidden\" id=\"recipientID\" name=\"recipientID\" value=\"$userid\">
                      <button type=\"submit\" class=\"messagebtn\" id=\"messagebtn\" name=\"messagebtn\">Message</button>
                  </form>
              </div>
          </div>
      </div>";         
         }
         }
         }
    ?>
                </div>
                <div id="message">
                    <?php
                    include_once('PHPscripts/loadMessages.php');
                    ?>
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
</body>
</html>