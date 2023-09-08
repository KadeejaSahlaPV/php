//index.html
<!DOCTYPE html>
<html>
<head>
    <title>Personal Details Form</title>
</head>
<body>
    <h1>Personal Details</h1>
    <form action="display.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>


//display.php
<!DOCTYPE html>
<html>
<head>
    <title>Display Bio Data</title>
</head>
<body>
    <h1>Bio Data</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $age = $_POST["age"];
        $address = $_POST["address"];
        
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Age:</strong> $age</p>";
        echo "<p><strong>Address:</strong> $address</p>";
    } else {
        echo "<p>No data submitted.</p>";
    }
    ?>
    <p><a href="index.html">Go Back</a></p>
</body>
</html>
