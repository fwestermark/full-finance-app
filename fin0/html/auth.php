<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'sql0';
$DATABASE_USER = 'sqladmin';
$DATABASE_PASS = 'secretpassword';
$DATABASE_NAME = 'finance_db';

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
// If there is an error with the connection, stop the script and display the error.
exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
        // Could not get the data that should have been sent.
        exit('Please fill both the username and password fields!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, password FROM users WHERE username = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if ($_POST['password'] === $password) {
                // Verification success! User has loggedin!
                // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;

                echo '
                <head>
                <link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
                <style>
                body {
                  font-family: "Barlow"; font-size: 36px;
                  color: white;
                  background-color: #435165;
                }
                .content {
                  position: absolute;
                  left: 50%;
                  top: 50%;
                  -webkit-transform: translate(-50%, -50%);
                  transform: translate(-50%, -50%);
                }
                </style>
                <div class="content">Welcome ' . $_SESSION["name"] . '! </div></head>';

                // echo 'Welcome ' . $_SESSION['name'] . '!';
        } else {
                // Incorrect password
                echo '
                <head>
                <link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
                <style>
                  body {
                  font-family: "Barlow"; font-size: 36px;
                  color: white;
                  background-color: #435165;
                }
                .content {
                  position: absolute;
                  left: 50%;
                  top: 50%;
                  -webkit-transform: translate(-50%, -50%);
                  transform: translate(-50%, -50%);
                }
                </style>
                <div class="content">Incorrect password!';
        }
} else {
        // Incorrect username
                echo '
                <head>
                <link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
                <style>
                body {
                  font-family: "Barlow"; font-size: 36px;
                  color: white;
                  background-color: #435165;
                }
                .content {
                  position: absolute;
                  left: 50%;
                  top: 50%;
                  -webkit-transform: translate(-50%, -50%);
                  transform: translate(-50%, -50%);
                }
                </style>
                <div class="content">Incorrect username and/or password!';

}

        $stmt->close();
}

?>
