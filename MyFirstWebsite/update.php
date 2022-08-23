<!DOCTYPE html>
<html>
    <head>
        <title>
            Update Data page
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
            $new_username = $_REQUEST['new_username'];
            $new_password = $_REQUEST['new_password'];
            $id = $_REQUEST['id'];

            //Performing insert query execution
            //Table name is users
            $sql = "UPDATE users SET username='$new_username',passwords='$new_password' WHERE id=$id" ;
            if(mysqli_query($connect, $sql)){
                echo "<h3>data updated successfully.". "Please browse phpmyadmin". "to view the updated data</h3>";
                echo nl2br("\n$new_username\n$new_password");
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