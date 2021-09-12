<?php
        include("index.html");
        include("db.php");

        $recalls = $_POST["recalls"];
        $brand = $_POST["brand"];
        $food = $_POST["food"];
        $recallReason = $_POST["recallReason"];
        $classID =  $_POST["classID"];
        $distribution = $_POST["distribution"];
        $postedDate = $_POST["postedDate"];

        date_default_timezone_set("America/Montreal");
        $date = date('Y-m-d H:i:s');

        if(($recalls !="") && ($brand != "") && ($food != "") && ($recallReason != "") && ($classID != "") && ($distribution !="") && ($postedDate !=""))
        {     
                try
                {
                        $connect = new PDO($dsn, $user, $pass);                
                        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);    
                                
                        $queryStr = "INSERT INTO `recall`(`recallID`, `recalls`, `brand`, `food`, `recallReason`,`classID`,`distribution`,`postedDate`) VALUES (?,?,?,?,?,?,?,?)";
                        $data = $connect->prepare($queryStr);
                        $data ->execute([null,$recalls,$brand,$food,$recallReason, $classID,$distribution,$postedDate]);   
                                        
                        include("action.php");
                } 
                catch (PDOException $error)
                {
                        $error->getMessage();                
                };   
        }
        else
        {
        echo '<h1>📌 Error:</h1><div><h2>🏢 All the fields should be filled !!!</h2><br><br></div>';             
        }
?>