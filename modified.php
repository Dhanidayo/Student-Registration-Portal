<?php
include "connection.php";

//SQL query to select data from database
$sql = "SELECT * FROM tbl_reg_form";

if(isset($_GET["namesearch"])){
    $sql .= " WHERE `firstname`='".$_GET['namesearch']."' OR `lastname`='".$_GET['namesearch']."';";  
}
elseif(isset($_GET["gendersearch"])){
    $sql .= " WHERE `gender`='".$_GET['gendersearch']."';";   
}
elseif(isset($_GET["scoresearch"])){
    $sql .= " WHERE `score`=".$_GET['scoresearch'].";";   
}
elseif(isset($_GET["statussearch"])){
    //to show if the admission status is either admitted or unadmitted
    $sql .= " WHERE `status`='".$_GET['statussearch']."';";  
    
    // Conditional statement to ascertain whether a status is admitted or unadmitted
    $status = $_GET["statussearch"];
    if($status == "admitted"){
        $sql .= " WHERE `score`>=250;";
    }
    elseif($status == "unadmitted"){
        $sql .= " WHERE `score`<250;";
    }
    else{
        $sql = $sql;
    }
    
}
$result = mysqli_query($conn,$sql);

?>
<html>
    <body>
        <div>
            <form action="modified.php" method="GET">
                <input type="text" name="namesearch" id="namesearch"  placeholder="Search record by name only" value="">
                <button type="submit">Search</button>
                </form>
                <form action="modified.php" method="GET">
                <select name="gendersearch" id="gender" placeholder="Select gender" value="">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <button type="submit">Search</button>
                </form>
                <form action="modified.php" method="GET">
                <input type="number" name="scoresearch" id="jambscore" placeholder="Enter Jamb Score" value="">
                <button type="submit">Search</button>
                </form>
                <form action="modified.php" method="GET">
                <select name="statussearch" id="statussearch" placeholder="Select Admission Status" value="">
                    <option value="admitted">Admitted</option>
                    <option value="unadmitted">Unadmitted</option>
                </select>
                <button type="submit">Search</button>
            </form>
        </div>
        <table width = "100%" border = "1" cellspacing = "1">
            <tr>
                <th>s/n</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Jamb Score</th>
                <th>Admission Status</th>
                <th>Action</th>
            </tr>
            <!-- CODE TO FETCH DATA FROM ROWS -->
            <?php //LOOP THROUGH TILL THE END OF THE DATA
                while($rows = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH ROW OF EVERY COLUMN -->
                <td><?php echo $rows["id"];?></td>
                <td><?php echo $rows['firstname'] ." ". $rows["lastname"];?></td>
                <td><?php echo $rows['gender'];?></td>
                <td><?php echo $rows['score'];?></td>
                <td><button><a href="student.php?id=<?php echo $rows['id'];?>">Action</a></button></td>
            </tr>
            <?php
            };
            ?>
        </table>
    </body>
</html>
