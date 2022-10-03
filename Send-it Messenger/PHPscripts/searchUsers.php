<div id="searchbar">
<p style="color: white; font-family: cursive;">Search for users to chat with:</p>
<form action="" method="POST">
<input type="text" id="userSearch" name="userSearch">
<button type="submit" id="searchForUserbtn" name="searchForUserbtn">-></button>
</form>
</div>

<!--Request cards generated for each request. Automatically sorts by Date.-->
<?php
    include_once('config.php');

    $searchCriteria=$_GET['c'];

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
     where username LIKE '$searchCriteria'";

     if(!$result = $conn->query($sql)){
         echo "<p>There was an error running the query [" . mysqli_error($conn) . "]</p>";
     }  
     else {

         while($row = $result->fetch_assoc()){
          $username = $row["username"];
          $userid = $row["ID"];

          echo "
          <div id=\"userCardContainer\">
          <div class=\"userCard\">
              <div class=\"column1\">
                  <img src=\"Images\user_placeholder.png\" class=\"userImage\">
                  <h3 id=\"cardTitle\">$username</h3>
              </div>
      
              <div class=\"column2\">
                  <form action=\"messenger.php\" method=\"POST\">
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

<div id="userCardContainer">
    <div class="userCard">
        <div class="column1">
            <img src="Images\user_placeholder.png" class="userImage">
            <h3 id="cardTitle">$USERNAME</h3>
        </div>

        <div class="column2">
            <form action="messenger.php" method="POST">
                <input type="hidden" id="recipientID" name="recipientID" value="$userID">
                <button type="submit" class="messagebtn" id="messagebtn" name="messagebtn">Message</button>
            </form>
        </div>
    </div>
</div>