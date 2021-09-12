<?php
    include("index.html");
    include("db.php");

    echo "<h1>Consumer Food safety</h1><br>";
    
    try {
        
            $connect = new PDO($dsn, $user, $pass);
            $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        //get images and nav links from database
            $queryImg = "SELECT * FROM images ";
            $dataImg = $connect->query($queryImg);  

            $queryNav = "SELECT * FROM nav ";
            $dataNav = $connect->query($queryNav);  

            echo "<div>";
            echo '<h2>Choose one of the options:</h2><br><br>';

        //display images from database
            foreach($dataImg as $row)
            {
                echo "<span><img src= $row[imageName] title = $row[imageDesc]></span>";
            };
            echo "<br><br><br>";

            echo "<nav>";
        //display images from database
            foreach($dataNav as $rowNav)
            {               
                echo "<a href = $rowNav[navLink]>$rowNav[navName]</a>";
            };
            echo "</nav><br>";
            echo "</div>";
        }
        catch (PDOException $error) {
            $error->getMessage();                
        }
        echo "<footer>Reference : Canadian Food Inspection Agency</footer>";
?>
  