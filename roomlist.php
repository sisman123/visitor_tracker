
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="glav.css">
    <script src="javascript.js"></script>
    <meta charset="utf-8">
    <title>SpaceList</title>
    </head>
<body>
    <div class="custom-padding">
  <nav>

    <ul class="menu-area">
        <li><a href="project.php">Create an exhibition</a></li>
        <li><a href="project2.php">Events</a></li>
        <li><a href="addroom.php">Add room</a></li>
        <li><a href="roomlist.php">Room list</a></li>
    </ul>
  </nav>
</div>
<h1>Welcome to the room list</h1>
    <?php
    $db_host = "localhost";
    $db_name = "bd1";
    $db_user = "root";
    $db_pass = "dias12345";
    
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
    if(mysqli_connect_error()){
        echo mysqli_connect_error();
        exit;
    }
    
    
    $sql = "SELECT * FROM spaces";
    
    $results = mysqli_query($conn, $sql);
    
    if ($results == false){
        echo mysql_error($conn);
        exit;
    } else {
        while($row = $results->fetch_assoc()) {
            print  "ID: ". $row["ID"]."<br> Room: ".$row["Name"]."<br>";
            
            print"<br>";
        }
       
    }
    ?>
    
    
</body>
</html>