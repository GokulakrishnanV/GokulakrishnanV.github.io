<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Save Data
        </title>
    </head>
    <body>
        <center>
            <h1>
                Storing form data in database
            </h1>
            <form action="insert.php" method="POST">
                <p>
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="userName">
                </p>
                <p>
                <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </p>
                    <input type="submit" value="Submit">
            </form>
        </center>
    </body>
</html>