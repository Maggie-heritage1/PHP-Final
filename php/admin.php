<?php
    include("index.html");
    include("db.php");

    date_default_timezone_set("America/Montreal");
    $date = date('Y-m-d');

    $username = $_POST["username"] ;
    $password =  $_POST["password"] ;

    if (($username != "") && ($password != ""))
    {
        try {
                $connect = new PDO($dsn, $user, $pass);
                $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $queryStr = "SELECT * FROM `admin` where adminName = ? ";
                $data = $connect->prepare($queryStr);
                $data ->execute([$username]);
                $rowNumber = $data->rowCount();
                $row = $data->fetch();
                
                //verify admin (user)
                if (($rowNumber == 1) && ($row['adminName'] == $username) && ($row['adminPassword'] == $password))
                { 
                        date_default_timezone_set("America/Montreal");
                        $date = date('Y-m-d H:i:s');
                         
                        echo "<a class = 'rightLink'  href='index.php'>Log out</a>"; 
                        echo "<h1>Welcom 💻 $username".", </h1>";
                        
                        echo "<p class = 'recordManage'>Add a new recall to database:</p>";
                // Insert a new recall to recall table.
                        echo '<form action="addRecall.php" method="post">
                                <span>
                                    <label for="recalls">recalls:</label>
                                    <input type="text" id="recalls" name="recalls" >
                            
                                    <label for="brand">brand:</label>
                                    <input type="text" id="brand" name="brand" >
                            
                                    <label for="food">food:</label>
                                    <input type="text" id="food" name="food" ><br>
                            </span>
                            <span>
                                    <label for="recallReason">recallReason:</label>
                                    <input type="text" id="recallReason" name="recallReason" >
                            
                                    <label for="classID">classID:</label>
                                    <input type="text" id="classID" name="classID" >
                            
                                    <label for="distribution">distribution:</label>
                                    <input type="text" id="distribution" name="distribution" ><br>
                            </span>
                            <span>
                                    <label for="postedDate">postedDate:</label>
                                    <input type="text" id="postedDate" name="postedDate" >
                            
                                    <input type="submit" id= "sub" value="Insert">
                            </span>
                                </form> 
                                <br>';
                //delete a recall by recallID
                        echo "<p class = 'recordManage' style='color:royalblue'>Delete a recall from database:</p>";
                        echo '<form action="deleteRecall.php" method="post">
                                <span>
                                    <label for="recallID">recallID:</label>
                                    <input type="text" id="recallID" name="recallID" >
                            
                                    <input type="submit" id= "sub" value="Delete">
                            </span>
                                </form> 
                                <br>';
                }
                else
                {
                    echo  "<a class = 'rightLink' href='login.php'>Login</a>";
                        echo"<h1>📌 Wrong Info:</h1>"
                        . "<div><h2>🚫 Your name or reference number does not match our record. Please try again !!</h2><br><br>
                        </div>";      
                } 
        } 
        catch (PDOException $error)
                {
                    $error->getMessage();                
                };
     }
     elseif (($username == "") && ($password == "")||(($username == "")||($password == "")))
         {

            echo  "<a class = 'rightLink'  href='login.php'>Login</a>";
                
            echo "<h1>📌 Missing Info :</h1><div><h2>📰 Please enter user name and password to continue !!</h2><br><br>
                </div>";
        }
?>

