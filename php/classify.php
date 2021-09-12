<?php

    include("index.html");
    include("db.php");

    echo "<a class = 'rightLink' href='index.php'>Home</a><button id='stopBtn'>stop</button><button id='readBtn'>read</button>";
    
    echo "<h1>📌📌 Recall Classification:</h1>";

    try {
        
        $connect = new PDO($dsn, $user, $pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $queryClass = "SELECT * FROM class ";
        $dataClass = $connect->query($queryClass);  

        echo "<div id='text-to-read'>";
        
        foreach($dataClass as $rowClass)
        {
            echo "<p class = 'classQue' >". $rowClass["classType"]." : </p><p>".$rowClass["classDetail"]."</p>";
        };
        echo "<br></div>";
        
    }
    catch (PDOException $error) {
        $error->getMessage();                
    }
?>