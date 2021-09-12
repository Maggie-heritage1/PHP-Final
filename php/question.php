<?php
    echo "<a class ='rightLink' href='index.php'>Home</a>";
    echo "<h1>📌 📌 Questions</h1>";
    include("index.html");
    include("db.php");

    try {
            $connect = new PDO($dsn, $user, $pass);
            $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $query = "SELECT * FROM questions ";
            $data = $connect->query($query);    
        

            foreach($data as $row)
                {
                    echo '<div><p class = "classQue" >'.$row["questionID"]." .  ".$row["questionTitle"]."</p><p>".$row["questionAnswer"]."</p></div>";
                } ;
        }
    catch (PDOException $error) {
        $error->getMessage();                
    };
?>