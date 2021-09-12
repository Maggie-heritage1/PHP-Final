<?php
        include("index.html");
        include("db.php");

        $recallID = $_POST["recallID"];

        date_default_timezone_set("America/Montreal");
        $date = date('Y-m-d H:i:s');

        if($recallID !="")
        {
                try {
                        $connect = new PDO($dsn, $user, $pass);                
                        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  
                        $queryStr =  'DELETE FROM  `recall` where recallID = ?';
                        $data = $connect->prepare($queryStr);
                        $data ->execute([$recallID]);   
                        include("action.php");
                } 
                catch (PDOException $error)
                {
                $error->getMessage();                
                };   
        }
        else
        { 
                echo '<h1>📌 Error:</h1><div><h2>🏢 Please enter recallID to delete it !!!</h2><br><br></div>';
        }
?>