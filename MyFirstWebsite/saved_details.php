<!DOCTYPE html>
<html>
    <head>
        <title>
            Saved Data
        </title>
    </head>
    <body>
        <h4>
            Saved Data:
        </h4>
        <?php
        $sql = "SELECT * FROM `users`;";
        $connection = mysqli_connect("localhost", "root", "", "first_db");
        $query = mysqli_query($connection, $sql);
       // print_r($query) ;
        if($query->num_rows>0){
            while($row = $query->fetch_assoc()){
               echo nl2br("Id: $row[id]\n Username: $row[username]\n Password: $row[passwords]\n\n");
            }
        }
        ?>
        <br><input type="button" value="Update data" onclick="Javascript:window.location.href = 'update_details.php';">
        <br><input type="button" value="Delete data" onclick="Javascript:window.location.href = 'delete_details.php';">
    </body>
</html>