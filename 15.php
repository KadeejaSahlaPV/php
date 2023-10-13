<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the PostgreSQL database
    $host = "localhost";
    $port = "5432";
    $dbname = "your_db_name";
    $user = "your_db_user";
    $password = "your_db_password";

    $connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

    if (!$connection) {
        die("Connection failed: " . pg_last_error());
    }

    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check the user's credentials
    $query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = pg_query($connection, $query);

    if (pg_num_rows($result) == 1) {
        $user = pg_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            // Successful login, set session and redirect
            session_start();
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
        } else {
            // Invalid password
            echo "Invalid password";
        }
    } else {
        // User not found
        echo "User not found";
    }

    pg_close($connection);
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Login">
</form>

</body>
</html>
