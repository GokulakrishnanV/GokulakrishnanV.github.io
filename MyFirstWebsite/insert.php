<!DOCTYPE html>
<html>
    <head>
        <title>
            Insert Data page
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
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];

            //Performing insert query execution
            //Table name is users
            $sql = "INSERT INTO users (username,passwords) VALUES ('$username','$password')";
            if(mysqli_query($connect, $sql)){
                echo "<h3>data stored successfully.". "Please browse phpmyadmin". "to view the updated data</h3>";
                echo nl2br("\n$username\n$password");
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