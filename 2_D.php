<!DOCTYPE html>
<html>
<head>
    <title>String Reverse</title>
</head>
<body>
    <h1>String Reverse</h1>
    <form method="post">
        <label for="inputString">Enter a string:</label>
        <input type="text" id="inputString" name="inputString" required>
        <input type="submit" value="Reverse">
    </form>

    <?php
    function reverseString($str) {
        $reversed = ''; 
        $length = strlen($str); 

        for ($i = $length - 1; $i >= 0; $i--) {
            $reversed .= $str[$i]; 
        }

        return $reversed; 
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputString = $_POST["inputString"];
        $reversedString = reverseString($inputString);
        echo "<p>Original String: $inputString</p>";
        echo "<p>Reversed String: $reversedString</p>";
    }
    ?>
</body>
</html>
