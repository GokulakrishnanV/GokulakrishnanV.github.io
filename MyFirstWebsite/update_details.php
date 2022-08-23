<!DOCTYPE html>
<html>
    <head>
        <title>
            Update data
        </title>
    </head>
    <body>
        <center>
            <h4>
                Update user details
            </h4>
            <form action=update.php method="POST">
            <p>
                    <label for="username">New Username:</label>
                    <input type="text" name="new_username" id="newUserName">
                </p>
                <p>
                <label for="password">New Password:</label>
                    <input type="password" name="new_password" id="newPassword">
                </p>
                <p>
                <label for="id">Id:</label>
                    <input type="numeric" name="id" id="Id">
                </p>
                    <input type="submit" value="Update">
            </form>
        </center>
    </body>
</html>