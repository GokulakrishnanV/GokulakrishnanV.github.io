<!DOCTYPE html>
<html>
    <head>
        <title>
            Delete Data page
        </title>
    </head>
    <body>
        <center>
            <?php
            $connect = mysqli_connect("localhost", "root", "", "first_db");

            //Check connection
            if($connect == false){
                die("Error: Could'nt connect to database.".mysqli_connect_error());
            }

            //Taking the values from the form data
            $delete_username = $_REQUEST['delete_username'];

            //Performing insert query execution
            //Table name is users
            $sql = "DELETE FROM users WHERE username='$delete_username'";
            if(mysqli_query($connect, $sql)){
                echo "<h3>data deleted successfully.". "Please browse phpmyadmin". "to view the updated data</h3>";
                echo nl2br("\n$delete_username");
            }else{
                echo "ERROR: Sorry $sql". mysqli_error($connect);
            }

            //Closing connection to the database
            mysqli_close($connect);
            ?>
            <br><input type="button" value="View all saved data" onclick="Javascript:window.location.href = 'saved_details.php';">
        </center>
    </body>
</html>