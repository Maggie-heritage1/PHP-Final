
<?php
    include("db.php");
    include("index.html");
    echo "<a class = 'rightLink' href='index.php'> Home </a>";
    echo "<h1>📌📌 Food Recall List<h1>";

    try {
        
        $connect = new PDO($dsn, $user, $pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //$query = "SELECT `recallID'* FROM recall ";

        $query = "SELECT `recallID` as 'NO.',`recalls` as 'Recalls',`brand` as 'Brand',`food`as 'Food',`recallReason` as 'Recall Reason',`classID` as 'Class',`distribution` as 'Distribution',`postedDate` as 'Posted Date' FROM `recall`";



        
        $data = $connect->query($query);    
        echo '<table >
                <tr>  
                    <th>NO.</th>           
                    <th>Recalls</th>
                    <th>Brand</th>  
                    <th>Food</th>  
                    <th>Recall Reason</th>
                    <th>Class</th>
                    <th>Distribution</th>
                    <th>Posted Date</th>
                </tr>';

        foreach($data as $row)
        {
            echo '<tr>
                <td>'.$row["NO."].'</td> 
                <td>'.$row["Recalls"].'</td>
                <td>'.$row["Brand"].'</td>
                <td>'.$row["Food"].'</td>
                <td>'.$row["Recall Reason"].'</td>               
                <td>'.$row["Class"].'</td>
                <td>'.$row["Distribution"].'</td>
                <td>'.$row["Posted Date"].'</td>
            </tr>';
        } 
         echo '</table>';  
    }
    catch (PDOException $error) {
        $error->getMessage();                
    }
?>