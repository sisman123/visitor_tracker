<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="glav.css">
            <script src="javascript.js"></script>
            <meta charset="utf-8">
        <title>Welcome!</title>
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
                <input name="Room" id="Room" placeholder="Room"><br>
                <input name="Name" id="Name" placeholder="Name"><br>
                <input name="Surname" id="Surname" placeholder="Surname"><br>
                <input name="Exhibition" id="Exhibition" placeholder="Exhibition"><br>
                <input type="date" name="DateStart" id="DateStart" placeholder="DateStart"><br>
                <input type="time" name="TimeStart" id="TimeStart" placeholder="TimeStart"><br>
                <input type="date" name="DateEnd" id="DateEnd" placeholder="DateEnd"><br>
                <input type="time" name="TimeEnd" id="TimeEnd" placeholder="TimeEnd"><br>
                <input name="Description" id="Description" placeholder="Description"><br>
                <input type="submit" value = "Add changes"><br>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $id = $_POST['ID'] ;
        $room = $_POST['Room'] ;
        $name = $_POST['Name'] ;
        $surname = $_POST['Surname'];
        $exhibition = $_POST['Exhibition'];
        $ds = $_POST['DateStart'];
        $ts = $_POST['TimeStart'];
        $de = $_POST['DateEnd'];
        $te = $_POST['TimeEnd'];
        $description = $_POST['Description'];
    
        if ($id != NULL){
            $a = 0;
            if($room != NULL){
                $a++;
                $sql = "UPDATE projects SET Room = '$room' WHERE ID = '$id' ";
                $result = mysqli_query($conn, $sql);
                if($result == false){
                    echo mysqli_error($conn);
                }else{
                    echo "Room set <br>";
                }
            }
            
            if($name != NULL){
                $a++;
                $sql = "UPDATE projects SET Name = '$name' WHERE ID = '$id' ";
                $result = mysqli_query($conn, $sql);
                if($result == false){
                    echo mysqli_error($conn);
                }else{
                    echo "Name set <br>";
                }
            }
            
            if($surname != NULL){
                $a++;
                $sql = "UPDATE projects SET Surname = '$surname' WHERE ID = '$id' ";
                $result = mysqli_query($conn, $sql);
                if($result == false){
                    echo mysqli_error($conn);
                }else{
                    echo "Surname set<br>";
                }
            }
            
            if($exhibition != NULL){
                $a++;
                $sql = "UPDATE projects SET Exhibition = '$exhibition' WHERE ID = '$id' ";
                $result = mysqli_query($conn, $sql);
                if($result == false){
                    echo mysqli_error($conn);
                }else{
                    echo "Exhibition set<br>";
                }
            }
            
            
                
                if($ds != NULL){
                $a++;
                $sql = "UPDATE projects SET DateStart = '$ds' WHERE ID = '$id' ";
                $result = mysqli_query($conn, $sql);
                if($result == false){
                    echo mysqli_error($conn);
                }else{
                    echo "Starting date set <br>";
                }
            }
                if($de != NULL){
                $a++;
                $sql = "UPDATE projects SET DateEnd = '$de' WHERE ID = '$id' ";
                $result = mysqli_query($conn, $sql);
                if($result == false){
                    echo mysqli_error($conn);
                }else{
                    echo "End date set <br>";
                }
            }
                if($ts != NULL){
                $a++;
                $sql = "UPDATE projects SET TimeStart = '$ts' WHERE ID = '$id' ";
                $result = mysqli_query($conn, $sql);
                if($result == false){
                    echo mysqli_error($conn);
                }else{
                    echo "Starting time set <br>";
                }
            }
                if($te != NULL){
                $a++;
                $sql = "UPDATE projects SET TimeEnd = '$te' WHERE ID = '$id' ";
                $result = mysqli_query($conn, $sql);
                if($result == false){
                    echo mysqli_error($conn);
                }else{
                    echo "Ending time set <br>";
                }
            }
                if($description != NULL){
                $a++;
                $sql = "UPDATE projects SET Description = '$description' WHERE ID = '$id' ";
                $result = mysqli_query($conn, $sql);
                if($result == false){
                    echo mysqli_error($conn);
                }else{
                    echo "Description set <br>";
                }
            }
            
            if($a == 0){
                $sql = "DELETE FROM projects WHERE ID = '$id'";
                $result = mysqli_query($conn, $sql);
                if($result == false){
                    echo mysqli_error($conn);
                }else{
                    echo "Event is deleted <br>";
            }
            
            }
    
           
        } else {
            $sql = "INSERT INTO projects (Room, Name, Surname, Exhibition, DateStart, TimeStart, DateEnd, TimeEnd, Description) VALUES ('$room', '$name', '$surname', '$exhibition', '$ds', '$ts', '$de', '$te', '$description')";
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