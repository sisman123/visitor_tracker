<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="glav.css">
            <script src="javascript.js"></script>
            <meta charset="utf-8">
        <title>Create space</title>
        </head>
        <body>
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
    

?>
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
            <p>To add new item leave the ID field empty. To edit an item, enter it's ID and attributes that you want to change. To delete an item enter its ID.</p>
            <form method="post">
                <input name="ID" id="ID" placeholder="ID"> <br>
                <input name="Name" id="Name" placeholder="Name"><br>
                <input type="submit" value="Add">

    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $id = $_POST['ID'] ;
        $name = $_POST['Name'] ;
    if ($id != NULL){
            $a = 0;
            if($name != NULL){
                $a++;
                $sql = "UPDATE spaces SET Name = '$name' WHERE ID = '$id' ";
                $result = mysqli_query($conn, $sql);
                if($result == false){
                    echo mysqli_error($conn);
                }else{
                    echo "Name set <br>";
                }
            }
            
            
            if($a == 0){
                $sql = "DELETE FROM spaces WHERE ID = '$id'";
                $result = mysqli_query($conn, $sql);
                if($result == false){
                    echo mysqli_error($conn);
                }else{
                    echo "Event is deleted <br>";
            }
            
            }
    
           
        } else {
            $sql = "INSERT INTO spaces (Name) VALUES ('$name')";
            $result = mysqli_query($conn, $sql);
            if($result == false){
                echo mysqli_error($conn);
            }else{
                echo "<br> Changes were saved";
            }
        }
    
    }
    ?>
        </body>
</html>