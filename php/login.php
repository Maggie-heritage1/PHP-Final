<?php
    echo "<a class = 'rightLink' href='index.php'>Home</a>";
    echo "<h1>📌 Please log in:</h1>";
?>

<form action="admin.php" method="post">
    
        <label for="username">user name:</label><br>
        <input type="text" id="username" name="username" ><br>

        <label for="password">password:</label><br>
        <input type="password" id="password" name="password" ><br>

        <input type="submit" id= "sub" value="Log in">
    </form> 
    <br>
    
<?php
    include("index.html");
?>